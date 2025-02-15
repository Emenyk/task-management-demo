<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class Tasks extends Component
{
    public $tasks = [];
    
    public function mount()
    {
        $this->tasks = Task::where('assigned_to', Auth::id())->get();
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        
        // ✅ Only allow admins to delete tasks
        if (Auth::user()->hasRole('admin')) {
            $task->delete();
            $this->tasks = Task::where('assigned_to', Auth::id())->get();
        }
    }

    public function render()
    {
        return view('livewire.tasks', [
            'tasks' => $this->tasks
        ]);
    }
}
