<?php

namespace App\Http\Livewire\Attendant;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component {

    const NO_ROLES = 'NONE';

    public string $filterByRole;
    public string $title;

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
        switch ($this->filterByRole) {
            case null:
                $users = User::query()->orderBy('name');
                break;
            case self::NO_ROLES:
                $users = User::withCount('roles')->has('roles', 0)->orderByDesc('created_at');
                break;
            default:
                /** @var Role $role */
                $role = Role::where('name', $this->filterByRole)->first();
                $users = User::whereHas('roles', function ($q) use ($role) {
                    $q->where('id', $role->id);
                });
                break;
        }

        return view('livewire.attendant.index', [
            'users' => $users->paginate(20)
        ]);
    }
}
