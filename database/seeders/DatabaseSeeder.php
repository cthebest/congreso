<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Diana Catalina Carrión Pérez',
            'email' => 'dianacarrioncp@gmail.com',
            'password' => bcrypt('N3n3Is42008')
        ]);


        $this->call([
            RoleSeeder::class,
            EvaluationFormatSeeder::class,
            EvaluationAxesSeeder::class,
            QuestionSeeder::class,
            QuestionMapSeeder::class,
        ]);
    }
}
