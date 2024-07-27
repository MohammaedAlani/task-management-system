<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class TaskShow extends Component
{
    public $taskInfo;

    public $task;

    public $comments;

    public $comment;

    public $taskId;

    public $history;


    public function render()
    {
        $this->taskInfo = Task::find($this->task)->load('users', 'history', 'comments');

        return view('livewire.task.task-show');
    }

    public function addComment()
    {
        // validate the comment field
        $this->validate([
            'comment' => 'required',
        ]);

        $this->taskInfo->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $this->comment,
        ]);

        // Clear the comment field
        $this->comment = '';

        $this->comments = $this->taskInfo->comments;
    }
}
