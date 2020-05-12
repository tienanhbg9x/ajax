<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
                DB::table('users')->insert([
                    'name' => 'User_'.$i,
                    'email' => 'user_'.$i.'@mymail.com',
                    'password' => bcrypt('123456'),
                    'created_at' => new DateTime(),
                ]);
        }
    }
}
