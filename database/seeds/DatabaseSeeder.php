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
        DB::table('users')->insert([
            'name' => 'Benjamin Keller',
            'email' => 'ben@netiquette.co.za',
            'password' => bcrypt('Ben102030*'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Inge Jung',
            'email' => 'ingejung@outlook.com',
            'password' => bcrypt('Cheddar97'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        DB::table('payment_types')->insert([
            'description' => 'Cash',
        ]);
        DB::table('payment_types')->insert([
            'description' => 'Card',
        ]);
        DB::table('payment_types')->insert([
            'description' => 'Cheque',
        ]);
    }
}
