<?php

namespace App\Http\Livewire\Attendant;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component {

    use WithPagination;

    const NO_ROLES = 'NONE';

    public string $filterByRole;
    public string $title;
    private Collection $users;

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
                $this->users = $role ? $role->users->sortBy('name') : Collection::empty();
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
