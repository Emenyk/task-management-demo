<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Projects extends Component
{
    public $name, $description;
    public $projects;

    public function mount()
    {
        $this->projects = Project::where('user_id', Auth::id())->get();
    }

    public function createProject()
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => Auth::id(),
        ]);

        $this->reset(['name', 'description']);
        $this->projects = Project::all();
    }

    public function deleteProject($id)
    {
        Project::findOrFail($id)->delete();
        $this->projects = Project::all();
    }

    public function render()
    {
        return view('livewire.projects');
    }
}
