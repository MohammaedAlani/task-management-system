<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'is_complete',
        'project_id',
        'create_by_user_id',
        'due_date',
    ];

    protected $with = ['users'];

    protected $appends = [
        'after_due_date'
    ];

    protected $casts = [
        'is_complete' => 'boolean',
        'due_date' => 'datetime',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'create_by_user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_users');
    }

    public function history()
    {
        return $this->hasMany(TaskHistory::class);
    }

    public function getAfterDueDateAttribute(): bool
    {
        return $this->due_date->isPast();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('id', 'desc');
    }
}
