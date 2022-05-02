<?php

namespace App\Http\Livewire\Permission;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component {

    public bool $creatingPermission = false;
    public array $state = [];

    public function render(): Factory|View|Application {
        return view('livewire.permission.index', ['permissions' => Permission::all()->sortBy('name')]);
    }

    public function createPermission() {
        $this->resetErrorBag();
        Validator::make($this->state, [
            'name' => ['required', 'string', 'max:255', 'unique:Spatie\Permission\Models\Permission,name'],
        ])->validateWithBag('createPermission');

        $this->state['guard_name'] = 'web';
        Permission::create($this->state);

        $this->creatingPermission = false;
        $this->state = [];
        $this->emit('permissionCreated');
    }
}
