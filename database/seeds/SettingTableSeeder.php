<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
        	'site_name' => 'Medical',
        	'site_email' => 'no-reply@example.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
