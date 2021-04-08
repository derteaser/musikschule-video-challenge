<?php

namespace App\Http\Livewire\Attendant;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component {

    const NO_ROLES = 'NONE';

    /** @var Collection */
    public $users;

    /** @var string */
    public $filterByRole;

    public function mount() {
        switch ($this->filterByRole) {
            case null:
                $this->users = User::all()->sortBy('name');
                break;
            case self::NO_ROLES:
                $this->users = User::withCount('roles')->has('roles', 0)->get()->sortByDesc('created_at');
                break;
            default:
                /** @var Role $role */
                $role = Role::where('name', $this->filterByRole)->first();
                $this->users = $role->users->sortBy('name');
                break;
        }
    }

    public function render() {
        return view('livewire.attendant.index');
    }
}
