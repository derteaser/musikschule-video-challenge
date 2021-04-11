<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemindUserOfTerms extends Mailable {
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
    public function build(): RemindUserOfTerms {
        return $this
            ->subject(__("Don't forget the terms!"))
            ->markdown('mail.user.terms', [
                'url' => 'https://videochallenge.foev-musikschule.de/Teilnahmeerklaerung.pdf',
                'user' => $this->user
            ]);
    }
}
