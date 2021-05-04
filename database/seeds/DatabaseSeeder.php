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
        factory('App\User',5)->create()->each(function($user){

            $user->notices()->save(factory('App\Notice')->make());
            $user->roles()->save(factory('App\Role')->make());

        });

        factory('App\Subject',5)->create();
        factory('App\Grade',5)->create();
    }
}
