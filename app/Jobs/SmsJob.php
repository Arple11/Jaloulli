<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::create([
            'email' => 'amir@gmail.com',
            'first_name' => 'amir',
            'last_name' => 'Jalouli',
            'user_name' => 'Arple',
            'phone_number' => 9057630901,
            'age' => 20,
            'postal_code' => 5762491562,
            'password' => 'fbdbdnamdbcbsnch',
        ]);
    }
}
