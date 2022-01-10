<?php

namespace App\Http\Livewire\Attendant;

use App\Actions\Jetstream\DeleteUser;
use App\Mail\ApproveUserAttendance;
use App\Mail\RemindUserOfTerms;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Row extends Component {

    public User $user;
    public bool $confirmingUserDeletion = false;

    public function render() {
        return view('livewire.attendant.row');
    }

    public function remindUserOfTerms() {
        Mail::to($this->user)->send(new RemindUserOfTerms($this->user));
        $this->emit('reminderSent');
    }

    public function approveUserAttendance() {
        $this->user->assignRole('Student');
        Mail::to($this->user)->send(new ApproveUserAttendance($this->user));
        $this->emit('attendanceApproved');
    }

    public function confirmUserDeletion() {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-user');
        $this->confirmingUserDeletion = true;
    }

    public function deleteUser(DeleteUser $deleter) {
        $this->resetErrorBag();
        $deleter->delete($this->user);
        redirect(route('dashboard-attendants'));
    }
}
