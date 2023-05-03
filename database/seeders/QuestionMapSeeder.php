<?php

namespace Database\Seeders;

use App\Models\EvaluationFormat;
use App\Models\EvaluationPoint;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Investigacion y experiencias
        $investigacion_experiences = EvaluationFormat::find(2);

        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 1]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 2]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 3]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 4]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 5]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 6]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 7]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 8]);
        $investigacion_experiences->evaluation_points()->attach(1, ['question_id' => 9]);

        $investigacion_experiences->evaluation_points()->attach(2, ['question_id' => 10]);
        $investigacion_experiences->evaluation_points()->attach(2, ['question_id' => 11]);
        $investigacion_experiences->evaluation_points()->attach(2, ['question_id' => 12]);
        $investigacion_experiences->evaluation_points()->attach(2, ['question_id' => 13]);
        $investigacion_experiences->evaluation_points()->attach(2, ['question_id' => 14]);
        $investigacion_experiences->evaluation_points()->attach(2, ['question_id' => 15]);


        //Investigación en proceso

        $investigacion_in_process = EvaluationFormat::find(1);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 16]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 17]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 18]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 19]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 20]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 21]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 22]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 23]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 6]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 24]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 25]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 26]);
        $investigacion_in_process->evaluation_points()->attach(1, ['question_id' => 9]);


        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 27]);
        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 28]);
        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 29]);
        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 30]);
        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 31]);
        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 32]);
        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 33]);
        $investigacion_in_process->evaluation_points()->attach(2, ['question_id' => 34]);
    }
}
