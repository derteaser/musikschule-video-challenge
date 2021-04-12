<?php

namespace App\Http\Livewire\Attendant;

use App\Mail\ApproveUserAttendance;
use App\Mail\RemindUserOfTerms;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Row extends Component {

    /** @var User */
    public $user;

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
}