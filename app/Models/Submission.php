<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'user_id',
        'pasted_text',
        'title',
        'uploaded_file', 
        'plagiarism_score',
        'total_words',
        'plagiarized_words',
        'text_analysis',
        'sources_found','status'
    ];

    protected $casts = [
        'sources_found' => 'array',
    ];

    // Each submission belongs to one assignment
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    // (Optional) If submissions are tied to users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
