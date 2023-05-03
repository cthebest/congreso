<?php

namespace Database\Seeders;

use App\Models\EvaluationFormat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EvaluationFormat::create([
            'name' => 'VALORACIÓN DE PONENCIAS RESULTADO DE INVESTIGACIONES EN PROCESO O CONCLUIDAS',
            'view_name' => 'investigation-in-process'
        ]);

        EvaluationFormat::create([
            'name' => 'VALORACIÓN DE PONENCIAS RESULTADO DE ENSAYOS DE INVESTIGACIÓN O EXPERIENCIAS / INNOVACIONES',
            'view_name' => 'investigation-experiences'
        ]);
    }
}
