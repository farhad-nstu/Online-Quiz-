<?php

use Illuminate\Database\Seeder;

class ExamrulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->insert([
            'rules_description' => 'Please Insert your Exam Rules',
        ]);
    }
}
