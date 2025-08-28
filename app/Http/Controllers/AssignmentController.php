<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Assignment;
use Smalot\PdfParser\Parser as PdfParser;
use Exception;
use App\Models\Submission;

class AssignmentController extends Controller
{
    private $apiToken   = 'jRXK339l7U2ieDaUW1EMvQSsBfCPIcI0xQJqyFXtd4f287bc';
    private $apiEndpoint = 'https://api.gowinston.ai/v2/plagiarism';
    
    public function index(Request $request)
    {
        $user = auth()->user();
        $counts = $this->getAssignmentCounts($user->id);
        $assignments = Assignment::where('user_id', $user->id)->latest()->paginate(10);

        $result = null;
        $assignment = null;
        $extractedText = null;

        if ($request->isMethod('post')) {
            // Handle upload/paste submission
            $validationResult = $this->validateRequest($request);
            if ($validationResult !== true) {
                return $validationResult;
            }

            try {
                $data = $this->prepareApiData();
                $processingResult = $this->processInput($request, $data);

                if (isset($processingResult['error'])) {
                    return back()->with('error', $processingResult['error']);
                }

                extract($processingResult);

                $response = $this->makeApiRequest($data);
                $apiResponse = $this->handleApiResponse($response, $request, $filePath, $originalFilename, $extractedText);

                if ($apiResponse['success']) {
                    $assignment = $apiResponse['assignment'];
                    $result     = $apiResponse['result'];
                    $extractedText     = $apiResponse['extracted_text'];
                } else {
                    return back()->with('error', $apiResponse['message']);
                }

            } catch (Exception $e) {
                return back()->with('error', 'Failed to connect to plagiarism service: ' . $e->getMessage());
            }
        }

        return view('assignments.index', compact('user', 'assignments', 'assignment', 'result','extractedText', 'counts'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $assignments = Assignment::where('user_id', $user->id)->latest()->paginate(10);

        $result = null;
        $assignment = null;
        $extractedText = null;

        if ($request->isMethod('post')) {
            // Handle upload/paste submission
            $validationResult = $this->validateRequest($request);
            if ($validationResult !== true) {
                return $validationResult;
            }

            try {
                $data = $this->prepareApiData();
                $processingResult = $this->processInput($request, $data);

                if (isset($processingResult['error'])) {
                    return back()->with('error', $processingResult['error']);
                }

                extract($processingResult);

                $response = $this->makeApiRequest($data);
                $apiResponse = $this->handleApiResponse($response, $request, $filePath, $originalFilename, $extractedText);
                Log::info('message', ['response' => $response]);

                if ($apiResponse['success']) {
                    $assignment = $apiResponse['assignment'];
                    $result     = $apiResponse['result'];
                    $extractedText     = $apiResponse['extracted_text'];
                } else {
                    return back()->with('error', $apiResponse['message']);
                }

            } catch (Exception $e) {
                return back()->with('error', 'Failed to connect to plagiarism service: ' . $e->getMessage());
            }
        }
        // return redirect()->back()->with('success', 'Assignment submitted successfully!');
        
        // We need to recalculate counts after a potential new assignment has been created.
        $counts = $this->getAssignmentCounts($user->id);
        return view('assignments.index', compact('user', 'assignments', 'assignment', 'result', 'extractedText', 'counts'));
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'file'        => 'nullable|mimes:pdf,doc,docx,txt|max:2048',
            'title'       => 'required|string|max:255',
            'pasted_text' => 'nullable|string|min:100',
        ]);

        if (!$request->hasFile('file') && empty(trim($request->pasted_text))) {
            return back()->with('error', 'You must upload a file or paste text.');
        }

        return true;
    }

    private function prepareApiData()
    {
        return [
            'language' => 'en',
            'country'  => 'us'
        ];
    }

    private function processInput(Request $request, &$data)
    {
        $filePath = null;
        $originalFilename = null;
        $extractedText = '';

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFilename = $file->getClientOriginalName();
            $filePath = $file->store('assignments', 'public');
            $extension = strtolower($file->getClientOriginalExtension());

            if ($extension === 'pdf') {
                $parser = new PdfParser();
                $pdf = $parser->parseFile($file->getPathname());
                $extractedText = $pdf->getText();
            } elseif ($extension === 'txt') {
                $extractedText = file_get_contents($file->getPathname());
            } else {
                $extractedText = "Document parsing not fully supported for this file type.";
            }

            $data['text'] = $extractedText;
        } else {
            $extractedText = $request->pasted_text;
            $data['text']  = $extractedText;
            $originalFilename = 'text_input_' . time() . '.txt';
        }

        if (trim($data['text']) === '') {
            return ['error' => 'No text found in the uploaded file or pasted content.'];
        }

        return [
            'filePath'        => $filePath,
            'originalFilename'=> $originalFilename,
            'extractedText'   => $extractedText
        ];
    }

    private function makeApiRequest($data)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiToken,
            'Content-Type'  => 'application/json',
        ])->timeout(60)->post($this->apiEndpoint, $data);
    }

    private function handleApiResponse($response, $request, $filePath, $originalFilename, $extractedText)
    {
        if ($response->failed()) {
            $errorData = $response->json();
            return [
                'success' => false,
                'message' => $errorData['error'] ?? 'Plagiarism check failed.'
            ];
        }

        $result = $response->json();

        $assignment = Assignment::create([
            'user_id'            => auth()->id(), 
            'file_path'          => $filePath,
            'title'              => $request->title,
            'original_filename'  => $originalFilename,
            'extracted_text'     => $extractedText,
            'plagiarism_result'  => $result,
            'plagiarism_score'   => $result['result']['score'] ?? 0,
        ]);

        return [
            'success'    => true,
            'assignment' => $assignment,
            'result'     => $result,
            'extracted_text'     => $extractedText
        ];
    }

    private function getAssignmentCounts($userId)
    {
        $query = Assignment::where('user_id', $userId);
        $submitted = Submission::count();

        // Based on the current implementation, all assignments stored in the database
        // are from successful API checks, so they are all considered 'completed'.
        return [
            'total'     => $query->count(),
            'completed' => $query->count(),
            'submitted'   => $submitted,
            'failed'    => 0,
        ];
    }

    public function view()
    {
        // Load assignments with their submissions and user who uploaded them
        $assignments = Assignment::with(['submissions', 'user'])->latest()->paginate(10);

        return view('assignments.view', compact('assignments'));
    }

    /**
     * Display the specified assignment with details and submissions.
     */
    public function show($id)
    {
        $assignment = Assignment::with(['submissions', 'user'])->findOrFail($id);

        return view('assignments.show', compact('assignment'));
    }
}
