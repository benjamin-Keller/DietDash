<?php

use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->insert([
            'group' => 'Non-Communicable',
            'name' => 'Diabetes',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Non-Communicable',
            'name' => 'Hypertension',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Non-Communicable',
            'name' => 'Arthritis',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Non-Communicable',
            'name' => 'Epilepsy',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Non-Communicable',
            'name' => 'Renal Failure',
        ]);

        DB::table('diseases')->insert([
            'group' => 'Communicable',
            'name' => 'TB',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Communicable',
            'name' => 'HIV',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Communicable',
            'name' => 'Pneumonia',
        ]);

        DB::table('diseases')->insert([
            'group' => 'Paediatrics',
            'name' => 'Wasted',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Paediatrics',
            'name' => 'Underweight',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Paediatrics',
            'name' => 'Stunted',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Paediatrics',
            'name' => 'Dehydration',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Paediatrics',
            'name' => 'SAM',
        ]);
        DB::table('diseases')->insert([
            'group' => 'Paediatrics',
            'name' => 'MAM',
        ]);
    }
}
