<?php

namespace LaraCourse\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use LaraCourse\Models\User;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;
public $user;
    /**
     * @var $user
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.testemail')->with(['username'=>'Hidran']);
    }
}
