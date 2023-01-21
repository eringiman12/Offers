<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content_msts extends Model
{
    protected $fillable = [
        'oubo_id',
        'question_content',
        'Content',
        'html_id'
    ];
}
