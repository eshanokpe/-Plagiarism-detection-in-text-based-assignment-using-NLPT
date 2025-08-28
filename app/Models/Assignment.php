<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_path',
        'original_filename',
        'title',
        'extracted_text',
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
