<?php

namespace App\Http\Livewire\Attendant;

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Row extends Component {

    /** @var User */
    public $user;

    public function render() {
        return view('livewire.attendant.row');
    }

    public function test() {
        $this->resetErrorBag();
        $this->user->nickname = 'Nicky';
        $this->user->save();
    }
}
