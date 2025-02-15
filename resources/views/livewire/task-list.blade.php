<div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow">
    <div class="mb-4">
        <button class="p-2 bg-gray-200 rounded" wire:click="setFilter('all')">All</button>
        <button class="p-2 bg-yellow-200 rounded" wire:click="setFilter('pending')">Pending</button>
        <button class="p-2 bg-blue-200 rounded" wire:click="setFilter('in_progress')">In Progress</button>
        <button class="p-2 bg-green-200 rounded" wire:click="setFilter('completed')">Completed</button>
    </div>

    <button class="bg-green-500 text-white px-4 py-2 mb-4 rounded" wire:click="$toggle('showCreateForm')">
        + New Task
    </button>

    @if($showCreateForm)
        <div class="my-4 p-4 border rounded bg-gray-700">
            <select wire:model="project_id" class="border p-2 w-full mb-2 bg-gray-800 text-gray-200">
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            <input type="text" wire:model="title" class="border bg-gray-800 text-gray-200 p-2 w-full mb-2" placeholder="Task Title">
            <textarea wire:model="description" class="border bg-gray-800 text-gray-200 p-2 w-full mb-2" placeholder="Task Description"></textarea>


            <button wire:click="createTask" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">
                Save Task
            </button>
        </div>
    @endif

    <div>
        @foreach($tasks as $task)
            <div class="p-2  text-white mb-2">
                <p>{{ $task->title }} - <strong>{{ ucfirst($task->status) }}</strong> (Project: {{ $task->project->name }})</p>
            </div>
        @endforeach
    </div>
</div>
