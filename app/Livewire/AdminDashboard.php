<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminDashboard extends Component
{


        public $users;
        public $selectedUser;
        public $roles;
    
        public function mount()
        {
            $this->users = User::all();
            $this->roles = Role::all();
        }
    
        public function setRole($userId, $roleName)
        {
            $user = User::find($userId);
            $user->syncRoles([$roleName]); // ✅ Assign role
            $this->users = User::all(); // ✅ Refresh users
        }
    
        public function render()
        {
            return view('livewire.admin-dashboard', [
                'users' => $this->users,
                'roles' => $this->roles
            ]);
        }
    
    
}

