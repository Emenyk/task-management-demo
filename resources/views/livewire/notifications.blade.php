
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}



<div class="relative">
    <button class="text-gray-200 p-2 rounded" wire:click="$toggle('showNotifications')">
        🔔 {{ count($notifications) }}
    </button>

    @if($showNotifications)
        <div class="absolute right-0 text-white bg-gray-700 p-2 w-64 shadow-lg">
            @foreach($notifications as $notification)
                <div class="p-2 border-b">
                    <p>{{ $notification->data['message'] }}</p>
                    <button wire:click="markAsRead('{{ $notification->id }}')" class="text-blue-500 text-sm">
                        Mark as read
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>
