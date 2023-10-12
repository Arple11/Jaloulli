<?php

namespace App\Jobs;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RegisterEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        Mail::to($this->user)->send(new RegisterEmail($this->user));
    }
}
