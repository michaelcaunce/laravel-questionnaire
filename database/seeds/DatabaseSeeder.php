<?php

use Illuminate\Database\Seeder;
use App\questionnaire;
use App\User;
use App\questions;

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
        // $this->call(QuestionnaireTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
    }
}
