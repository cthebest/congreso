<?php

namespace Database\Seeders;

use App\Models\Thematic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThematicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Thematic::insert([
            [
                'description' => 'Necesidades, oportunidades y desafíos en la articulación de áreas curriculares de la educación básica y media (educación matemática, artística, ciencias sociales, comunicación y lenguaje, ética y valores, educación física) con la formación del profesorado de ciencias naturales. Necesidades, oportunidades y desafíos del currículo formativo del profesorado de ciencias naturales con la generación de políticas públicas.'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos en Ambientalización, Interculturalidad e Inclusión en los procesos formativos del profesorado de ciencias naturales.'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos sobre la Articulación de las educaciones emergentes (educación para la sustentabilidad ambiental, educación en cambio climático, educación para la seguridad alimentaria e hídrica, educación sanitaria) con la formación del profesorado de ciencias naturales.'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos formativos del profesorado de ciencias naturales en Escenarios educativos remotos y a distancia; Estrategias de enseñanza apoyadas por tecnologías de la información y comunicación; STEAM.'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos de formación del profesorado de ciencias naturales para Escenarios formales y no convencionales de educación.'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos en la formación del profesorado de ciencias naturales para la Participación en la toma de decisiones ante problemas esenciales de la sociedad, aspectos controversiales y en justicia social (formación ciudadana).'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos formativos metadisciplinares del profesorado de ciencias naturales: historia, filosofía, sociología y psicología de las ciencias.'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos de los Modelos formativos del profesorado de ciencias naturales: constructivistas, críticos, cognitivos, …'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos en la formación del profesorado de ciencias naturales frente a los Estándares y evaluaciones nacionales e internacionales del desempeño profesional.'
            ],
            [
                'description' => 'Necesidades, oportunidades y desafíos en la formación del profesorado de ciencias naturales, conocimiento profesional, conocimiento didáctico del contenido: CDC – PCK, progresiones – transiciones de aprendizaje docente.'
            ],
            [
                'description' => 'Oportunidades y desafíos en la formación del profesorado de ciencias naturales frente a las Necesidades emocionales y afectivas en escenarios conflictivos.'
            ],
        ]);
    }
}
