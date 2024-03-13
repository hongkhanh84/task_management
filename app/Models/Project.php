<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_day',
        'end_day',
        'description',
        'created_by',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_users');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
