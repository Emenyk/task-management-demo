<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskList extends Component
{
    public $tasks;
    public $users;
    public $selectedUser;

    public function mount()
    {
        $this->tasks = Task::all();
        $this->users = User::all();
    }

    public function assignTask($taskId)
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $task = Task::find($taskId);
        $task->assigned_to = $this->selectedUser;
        $task->save();

        session()->flash('message', 'Task assigned successfully.');
        $this->tasks = Task::all(); // Refresh tasks
    }

    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => $this->tasks,
            'users' => $this->users
        ]);
    }
}

