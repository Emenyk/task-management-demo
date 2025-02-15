{{-- The best athlete wants his opponent at his best. --}}






<div>
    <h2 class="text-lg font-bold mb-4">Task List</h2>

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Task</th>
                <th class="border px-4 py-2">Assigned To</th>
                @if(auth()->user()->hasRole('admin'))
                    <th class="border px-4 py-2">Assign</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td class="border px-4 py-2">{{ $task->title }}</td>
                    <td class="border px-4 py-2">{{ $task->assignedTo?->name ?? 'Unassigned' }}</td>

                    @if(auth()->user()->hasRole('admin'))
                        <td class="border px-4 py-2">
                            <select wire:model="selectedUser" wire:change="assignTask({{ $task->id }})">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
