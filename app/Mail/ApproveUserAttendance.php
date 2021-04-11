<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveUserAttendance extends Mailable {
    use Queueable, SerializesModels;

    /** @var User */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ApproveUserAttendance {
        return $this
            ->subject(__("Your account has been approved!"))
            ->markdown('mail.user.attend', [
                'url' => 'https://videochallenge.foev-musikschule.de',
                'user' => $this->user
            ]);
    }
}
