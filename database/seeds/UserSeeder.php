<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Benjamin Keller',
            'email' => 'ben@netiquette.co.za',
            'password' => bcrypt('Ben102030*'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'profile_picture' => '',
        ]);
        DB::table('users')->insert([
            'name' => 'Inge Jung',
            'email' => 'ingejung@outlook.com',
            'password' => bcrypt('Cheddar97'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'profile_picture' => '',
        ]);
    }
}
