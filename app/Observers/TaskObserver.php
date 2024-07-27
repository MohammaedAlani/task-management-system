<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\TaskHistory;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        TaskHistory::create([
            'task_id' => $task->id,
            'user_id' => $task->create_by_user_id,
            'action' => 'created',
            'description' => [
                'name' => $task->name,
                'description' => $task->description,
                'is_complete' => $task->is_complete,
                'project_id' => $task->project_id,
                'create_by_user_id' => $task->create_by_user_id,
                'due_date' => $task->due_date,
            ],
        ]);
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        TaskHistory::create([
            'task_id' => $task->id,
            'user_id' => auth()->id(),
            'action' => 'updated',
            'description' => [
                'name' => $task->getOriginal('name'),
                'description' => $task->getOriginal('description'),
                'is_complete' => $task->getOriginal('is_complete'),
                'project_id' => $task->getOriginal('project_id'),
                'create_by_user_id' => $task->getOriginal('create_by_user_id'),
                'due_date' => $task->getOriginal('due_date'),
            ],
        ]);
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        TaskHistory::create([
            'task_id' => $task->id,
            'user_id' => auth()->id(),
            'action' => 'deleted',
            'description' => [
                'name' => $task->name,
                'description' => $task->description,
                'is_complete' => $task->is_complete,
                'project_id' => $task->project_id,
                'create_by_user_id' => $task->create_by_user_id,
                'due_date' => $task->due_date,
            ],
        ]);
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {

    }
}
