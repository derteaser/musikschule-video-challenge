<?php

namespace App\Http\Livewire\Role;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component {

    public bool $creatingRole = false;
    public array $state = [];

    public function render(): Factory|View|Application {
        return view('livewire.role.index', ['roles' => Role::all()->sortBy('name')]);
    }

    public function createRole() {
        $this->resetErrorBag();
        Validator::make($this->state, [
            'name' => ['required', 'string', 'max:255', 'unique:Spatie\Permission\Models\Role,name'],
        ])->validateWithBag('createRole');

        $this->state['guard_name'] = 'web';
        Role::create($this->state);

        $this->creatingRole = false;
        $this->state = [];
        $this->emit('roleCreated');
    }
}
