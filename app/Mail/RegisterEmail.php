<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope():envelope
    {
        return new envelope(
        from:$this->user->email,
        subject:"Welcome");
    }

    public function build()
    {
        return $this->subject('Welcome')
            ->view('emails.EmailRegister');
    }
}