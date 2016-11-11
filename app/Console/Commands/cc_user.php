<?php

namespace App\Console\Commands;

use Hash;
use Illuminate\Console\Command;
use App\User;

class cc_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cc:user
                            {--make : Make new object}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New Object';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if($this->option('make'))
        {   
            $username = $this->ask("Please add username");                
            $password = $this->ask("Please add password");      
            $User = new User;
            $User->email = $username;
            $User->password = Hash::make($password);
            $User->save();
            echo "Create User Success\n";                      
            echo "\n";                      
        }else{
            $this->makeInfo();
        }
    }

    private function makeInfo()
    {
        $this->info('Customer Connect V.1');
        echo "\n";
        $this->comment('Options');
        echo "  --make";
        echo "sample :  php artisan cc:user --make\n";
        echo "\n";
    }
}
