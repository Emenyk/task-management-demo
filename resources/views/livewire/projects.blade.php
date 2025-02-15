{{-- In work, do what you enjoy. --}}

<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-lg font-semibold mb-4">Projects</h2>

    <!-- Create Project Form -->
    <form wire:submit.prevent="createProject" class="mb-4">
        <input type="text" wire:model="name" class="border p-2 w-full mb-2" placeholder="Project Name">
        <textarea wire:model="description" class="border p-2 w-full mb-2" placeholder="Project Description"></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Project</button>
    </form>

    <!-- List Projects -->
    <ul class="divide-y">
        @foreach($projects as $project)
            <li class="py-2 flex justify-between">
                <div>
                    <strong>{{ $project->name }}</strong>
                    <p class="text-sm text-gray-600">{{ $project->description }}</p>
                </div>
                <button wire:click="deleteProject({{ $project->id }})" class="text-red-500">Delete</button>
            </li>
        @endforeach
    </ul>
</div>


