<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Assignment;
use Smalot\PdfParser\Parser as PdfParser;
use Exception;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    private $apiToken   = '22SzRlvsj9JtyNFeifEC2MbPwu0yXoMVbf0T8ngW46ca04e6';
    private $apiEndpoint = 'https://api.gowinston.ai/v2/plagiarism';
    
    public function index(Request $request)
    {
        $user = auth()->user();
        $counts = $this->getAssignmentCounts($user->id);
        $assignments = Assignment::where('user_id', $user->id)->latest()->paginate(10);

        $result = null;
        $assignment = null;
        $extractedText = null;

        return view('assignments.index', compact('user', 'assignments', 'assignment', 'result', 'extractedText', 'counts'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $counts = $this->getAssignmentCounts($user->id);
        $assignments = Assignment::where('user_id', $user->id)->latest()->paginate(10);

        $result = null;
        $assignment = null;
        $extractedText = null;

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

            $filePath = $processingResult['filePath'] ?? null;
            $originalFilename = $processingResult['originalFilename'] ?? null;
            $extractedText = $processingResult['extractedText'] ?? null;

            $response = $this->makeApiRequest($data);
            $apiResponse = $this->handleApiResponse($response, $request, $filePath, $originalFilename, $extractedText);
            Log::info('API Response', ['response' => $response->json()]);

            if ($apiResponse['success']) {
                $assignment = $apiResponse['assignment'];
                $result = $apiResponse['result'];
                $extractedText = $apiResponse['extracted_text'];
            } else {
                return back()->with('error', $apiResponse['message']);
            }

        } catch (Exception $e) {
            Log::error('Plagiarism check failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to connect to plagiarism service: ' . $e->getMessage());
        }

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
                // For DOC/DOCX files, we'll need to handle them differently
                // For now, just return an error
                return ['error' => 'Document parsing not fully supported for this file type. Please use PDF or TXT files.'];
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
            'plagiarism_result'  => json_encode($result),
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
        $submitted = Submission::where('user_id', $userId)->count();

        return [
            'total'     => $query->count(),
            'completed' => $query->count(),
            'submitted' => $submitted,
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
        $submission = Submission::with(['user', 'assignment'])
            ->findOrFail($id);
        
        return view('assignments.show', compact('submission'));
    }
}