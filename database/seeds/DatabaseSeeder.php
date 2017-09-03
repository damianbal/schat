<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // create admin user
        \App\User::create([
            'name' => '@admin',
            'color' => '#F44336',
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'can_moderate' => true,
        ]);
    }
}
