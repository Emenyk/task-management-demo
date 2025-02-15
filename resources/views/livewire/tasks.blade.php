<div class="px-20">
    <div class="mb-4">
        <button class="p-2 bg-gray-200 rounded" wire:click="setFilter('all')">All</button>
        <button class="p-2 bg-yellow-200 rounded" wire:click="setFilter('pending')">Pending</button>
        <button class="p-2 bg-blue-200 rounded" wire:click="setFilter('in_progress')">In Progress</button>
        <button class="p-2 bg-green-200 rounded" wire:click="setFilter('completed')">Completed</button>
    </div>

    <div>
        @foreach($tasks as $task)
            <div class="p-2 border mb-2">
                <p>{{ $task->title }} - <strong>{{ ucfirst($task->status) }}</strong></p>
            </div>
        @endforeach
    </div>
</div>
