<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin',
        	'username' => 'admin',
        	'email' => 'admin@example.com',
        	'status' => 2,
        	'is_admin' => true,
        	'user_type' => 'administrator',
        	'api_token' => str_random(64),
        	'password' => Hash::make('123456'),
         	'created_at' => Carbon::now(),
        	 'updated_at' => Carbon::now()
        ]);
        DB::table('profiles')->insert([
        	'user_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Client',
            'username' => 'client',
            'email' => 'client@example.com',
            'status' => 2,
            'is_admin' => false,
            'user_type' => 'client',
            'api_token' => str_random(64),
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
        ]);
        DB::table('profiles')->insert([
            'user_id' => 2
        ]);

         DB::table('users')->insert([
            'name' => 'Patient',
            'username' => 'patient',
            'email' => 'patient@example.com',
            'status' => 1,
            'is_admin' => false,
            'user_type' => 'patient',
            'api_token' => str_random(64),
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
             'updated_at' => Carbon::now()
        ]);
        DB::table('profiles')->insert([
            'user_id' => 3
        ]);
    }
}
