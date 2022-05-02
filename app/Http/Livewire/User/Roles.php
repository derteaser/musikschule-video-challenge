<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component {

    public User $user;

    public function render(): Factory|View|Application {
        return view('livewire.user.roles', ['roles' => Role::all()->sortBy('name')]);
    }

    public function assignRole(Role $role) {
        $this->user->assignRole($role);
    }

    public function removeRole(Role $role) {
        $this->user->removeRole($role);
    }
}
