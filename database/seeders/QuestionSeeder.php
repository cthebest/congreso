<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Investigación y experiencias
        Question::create([
            'description' => 'Incluye una introducción que resalta los componentes generales del escrito'
        ]);
        Question::create([
            'description' => 'Presenta un desarrollo conceptual / teórico.'
        ]);
        Question::create([
            'description' => 'Presenta un desarrollo metodológico a propósito de la experiencia / innovación hecha / o contexto del ensayo'
        ]);
        Question::create([
            'description' => 'El trabajo presenta conclusiones'
        ]);
        Question::create([
            'description' => 'Incluye referencias bibliográficas (en normas APA séptima edición).'
        ]);
        Question::create([
            'description' => 'El escrito tiene un mínimo de 3 y un máximo de 4 páginas, equivalentes a 1300 palabras'
        ]);
        Question::create([
            'description' => 'El estilo, la redacción, sintaxis, coherencia y ortografía es adecuado.'
        ]);
        Question::create([
            'description' => 'El documento se ajusta a las normas solicitadas (fuente, tamaño, márgenes, etc.)'
        ]);
        Question::create([
            'description' => 'El escrito fue hecho en la plantilla del congreso'
        ]);
        Question::create([
            'description' => 'INTRODUCCIÓN: está presentada de forma adecuada y es pertinente.'
        ]);
        Question::create([
            'description' => 'TEMA: está formulado adecuadamente y es pertinente a un eje problemático del congreso'
        ]);
        Question::create([
            'description' => 'DESARROLLO: es consistente, coherente y pertinente.'
        ]);
        Question::create([
            'description' => 'CONCLUSIONES: son coherentes con los aspectos formulados y a un eje problemático del congreso'
        ]);
        Question::create([
            'description' => 'CONCLUSIONES: se desarrollan desde los planteamientos del escrito y en coherencia con la formación de profesores de ciencias'
        ]);
        Question::create([
            'description' => 'REFERENCIAS BIBLIOGRÁFICAS: son enunciadas en el texto, son pertinentes y en formato APA última edición.'
        ]);


        //Investigacion
        Question::create([
            'description' => 'El título no es mayor a 12 palabras y refleja el contenido del escrito'
        ]);

        Question::create([
            'description' => 'El resumen está entre las 150 palabras.'
        ]);

        Question::create([
            'description' => 'Describe entre 3 y 5 Palabras claves'
        ]);

        Question::create([
            'description' => 'El escrito evidencia introducción, objetivos y problema de investigación'
        ]);

        Question::create([
            'description' => 'Presenta un marco teórico.'
        ]);

        Question::create([
            'description' => 'Describe la metodología.'
        ]);

        Question::create([
            'description' => 'Presenta resultados y su discusión.'
        ]);

        Question::create([
            'description' => 'Incluye referencias bibliográficas en normas APA séptima edición.'
        ]);

        Question::create([
            'description' => 'Cumple con el estilo, la sintaxis y la ortografía para una publicación académica.'
        ]);

        Question::create([
            'description' => 'El documento se ajusta a las normas solicitadas (fuente, tamaño, márgenes, etc.)'
        ]);

        Question::create([
            'description' => 'Las citaciones y referencias cumplen con la norma APA séptima edición'
        ]);

        Question::create([
            'description' => 'RESUMEN: es coherente y pertinente. '
        ]);

        Question::create([
            'description' => 'INTRODUCCIÓN: da cuenta de lo desarrollado y es coherente con todo el escrito'
        ]);

        Question::create([
            'description' => 'TEMA Y PROBLEMA: está formulado adecuadamente y es pertinente a un eje problemático del congreso'
        ]);

        Question::create([
            'description' => 'MARCO TEÓRICO: es consistente y actualizado.'
        ]);

        Question::create([
            'description' => 'MARCO METODOLÓGICO: está claramente descrita y es coherente con el problema y marco teórico.'
        ]);

        Question::create([
            'description' => 'RESULTADOS: están debidamente analizados y responden al problema de la investigación.'
        ]);

        Question::create([
            'description' => 'CONCLUSIONES: son coherentes con los aspectos formulados.'
        ]);

        Question::create([
            'description' => 'REFERENCIAS BIBLIOGRÁFICAS: son enunciadas en el texto, están actualizadas y son pertinentes para lo desarrollado.'
        ]);
    }
}
