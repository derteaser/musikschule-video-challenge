<?php

namespace App\Http\Livewire\Attendant;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component {
    /** @var Collection */
    public $users;

    public function mount() {
        $this->users = User::all()->sortByDesc('created_at');
    }

    public function render() {
        return view('livewire.attendant.index');
    }
}
