<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'status_id',
        'created_by',
        'assign_to',
        'description',
        'end_day',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
