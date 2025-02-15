{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}



<div>
    <h2 class="text-lg font-bold mb-4">User Management</h2>

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->getRoleNames()->first() }}</td>
                    <td class="border px-4 py-2">
                        <select wire:change="setRole({{ $user->id }}, $event.target.value)">
                            <option>Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

