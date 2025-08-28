<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'plagiarism_score' => 'required|numeric',
            'total_words' => 'required|integer',
            'plagiarized_words' => 'required|integer',
            'text_analysis' => 'required|string',
            'sources' => 'nullable|array',
            'sources.*.title' => 'required_with:sources|string',
            'sources.*.url' => 'nullable|url',
            'uploaded_file' => 'nullable|string',
            'assignment_text' => 'nullable|string',
            'title' => 'nullable|string',
        ]);

        // The text_analysis from the form contains escaped HTML for highlighting.
        // To remove the HTML as requested, we first need to decode the HTML entities,
        // and then use strip_tags to remove the HTML elements.
        $plainTextAnalysis = strip_tags(html_entity_decode($request->text_analysis));

        $submission = Submission::create([
            'user_id' => Auth::id(), 
            // 'assignment_id' => $request->assignment_id,
            'pasted_text' => $request->assignment_text,
            // The form sends the filename/path as a string, not a file upload.
            'uploaded_file' => $request->uploaded_file,
            'plagiarism_score' => $request->plagiarism_score,
            'total_words' => $request->total_words,
            'plagiarized_words' => $request->plagiarized_words,
            'text_analysis' => $plainTextAnalysis,
            // The form sends the sources in an array named 'sources'.
            'sources_found' => $request->sources,
            'title' => $request->title,
        ]);

        return redirect()->route('dashboard')->with('success', 'Assignment submitted successfully!');
    }
}
