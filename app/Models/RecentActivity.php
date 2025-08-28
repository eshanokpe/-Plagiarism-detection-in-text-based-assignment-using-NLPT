<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentActivity extends Model
{ 
    protected $fillable = [
        'user_type',
        'user_id',
        'action',
        'description',
    ];

    public function user()
    {
        return match($this->user_type) {
            'user' => $this->belongsTo(\App\Models\User::class, 'user_id'),
            'lecturer' => $this->belongsTo(\App\Models\Lecturer::class, 'user_id'),
            'admin' => $this->belongsTo(\App\Models\Admin::class, 'user_id'),
            default => null,
        };
    }
}
