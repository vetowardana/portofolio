<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin Veto',
        	'username' => 'v_wdhana',
        	'password' => bcrypt('admin123'),
        	'remember_token' => Str::random(60)
        ]);
    }
}
