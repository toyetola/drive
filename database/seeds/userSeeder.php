<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'role'=>"Creator",
			'email'=> "me@me.com",
			'username'=> "bash",
			'password'=>bcrypt(1234567),
		]);
    }
}

