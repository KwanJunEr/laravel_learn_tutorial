<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

     //This is for the arguments 
    // protected $signature = 'user:create {name} {email} {password}';

    //This is for the options 
    // protected $signature = 'user:create {--name=} {--email=} {--password=}';

    //base
    // protected $signature = 'user:create';

    //show progress bar
    protected $signature = 'user:create {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // $user = \Str::random(6);
        // $email = $user. '@example.com';
        // $password = bcrypt('password');

        //This is for the arguments 

        // $user = $this->argument('name');
        // $email = $this->argument('email');
        // $password = $this->argument('password');

        //This is for the options 

        // $user = $this->option('name') ?? 'Test User';
        // $email = $this->option('email') ??  \Str::random(4) . '@gmail.com';
        // $password = $this->option('password') ?? 'password';

        //Ask for values 
        // $user = $this->ask('Give your User Name: ');
        // $email = $this->ask('Give your User Email: ');
        // $password = $this->ask('Give your User Password: ');

        $count = $this->option('count');
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for($i = 1; $i <= $count; $i++){
            $user = \Str::random(5);
            $email = \Str::random(5) . '@example.com';
            $password = 'password';
            User::create([
                'name' => $user,
                'email' => $email,
                'password' => $password,
            ]);
            $bar->advance();
        }
        $bar->finish();
        // $this->info('User created: Name:' . $user . 'Email:' . $email . 'Password:' . $password);
        $this->info('Users created');
      
       
    }
}
