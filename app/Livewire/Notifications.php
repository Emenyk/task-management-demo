<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public $notifications = [];
    public $showNotifications = false; // ✅ Add this property

    #[On('taskCreated')]
    public function mount()
    {
        $this->notifications = Auth::user()->unreadNotifications;
    }

    public function markAsRead($notificationId)
    {
        Auth::user()->notifications->where('id', $notificationId)->markAsRead();
        $this->notifications = Auth::user()->unreadNotifications;
    }

    public function toggleNotifications()
    {
        $this->showNotifications = !$this->showNotifications; // ✅ Toggle visibility
    }

    public function render()
    {
        return view('livewire.notifications', [
            'notifications' => $this->notifications,
        ]);
    }
}   

