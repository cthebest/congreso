<?php

namespace Database\Seeders;

use App\Models\EvaluationPoint;
use Illuminate\Database\Seeder;

class EvaluationAxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EvaluationPoint::create([
            'name'=>'B.VALORACIÓN DE LA ESTRUCTURA'
        ]);

        EvaluationPoint::create([
            'name'=>'C.VALORACIÓN DEL CONTENIDO'
        ]);
    }
}
