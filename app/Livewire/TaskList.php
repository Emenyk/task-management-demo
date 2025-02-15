<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class TaskList extends Component
{
    public $tasks;
    public $projects;
    public $title;
    public $description;
    public $status = 'pending';
    public $project_id;
    public $showCreateForm = false;
    public $filter = 'all';

    public function mount()
    {
        $this->projects = Project::all();
        $this->loadTasks();
    }

    public function loadTasks()
    {
        if ($this->filter === 'all') {
            $this->tasks = Task::all();
        } else {
            $this->tasks = Task::where('status', $this->filter)->get();
        }
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->loadTasks();
    }

    public function createTask()
    {
        if (!$this->title || !$this->project_id) {
            session()->flash('error', 'Task title and project are required.');
            return;
        }

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'project_id' => $this->project_id,
            'assigned_to' => Auth::id(),
        ]);

        session()->flash('message', 'Task created successfully.');
        $this->showCreateForm = false;
        $this->title = '';
        $this->description = '';
        $this->project_id = null;
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => $this->tasks,
            'projects' => $this->projects
        ]);
    }
}


