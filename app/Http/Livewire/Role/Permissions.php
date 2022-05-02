<?php

namespace App\Http\Livewire\Role;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component {

    public Role $role;

    public function render(): Factory|View|Application {
        return view('livewire.role.permissions', ['permissions' => Permission::all()->sortBy('name')]);
    }

    public function assignPermission(Permission $permission) {
        $this->role->givePermissionTo($permission);
    }

    public function removePermission(Permission $permission) {
        $this->role->revokePermissionTo($permission);
    }
}
