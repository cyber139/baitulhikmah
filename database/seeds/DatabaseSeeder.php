<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory('App\User',10)->create()->each(function($user){

            $user->notices()->save(factory('App\Notice')->make());

        });
    }
}
