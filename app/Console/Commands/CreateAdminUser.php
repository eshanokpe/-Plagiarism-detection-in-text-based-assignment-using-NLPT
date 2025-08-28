<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is the admin name?');
        $email = $this->ask('What is the admin email?');
        $password = $this->secret('What is the admin password?');
        $confirmPassword = $this->secret('Confirm the admin password?');

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $this->error('Passwords do not match!');
            return;
        }

        // Check if email already exists
        if (Admin::where('email', $email)->exists()) {
            $this->error('An admin with this email already exists!');
            return;
        }

        // Create the admin
        Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $this->info('Admin user created successfully!');
    }
}