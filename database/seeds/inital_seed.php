<?php

use Illuminate\Database\Seeder;

class initial_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->dimensiones();
        $this->indicadores();
        $this->preguntas();
        $this->cuestionarios();
    }

    public function preguntas()
    {
        DB::table('preguntas')->delete();
        DB::table('preguntas')->insert([
            'id' => 1,
            'nombre' => 'Pregunta 1',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo',
            'tipo_respuesta' => '4',
        ]);
        DB::table('preguntas')->insert([
            'id' => 2,
            'nombre' => 'Pregunta 2',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo',
            'tipo_respuesta' => '4',
        ]);
        DB::table('opciones_respuestas')->insert([
            'id' => 1,
            'pregunta_id' => 1,
            'descripcion' => 'Descripcion de prueba.',
            'number' => 1
        ]);
        DB::table('opciones_respuestas')->insert([
            'id' => 2,
            'pregunta_id' => 1,
            'descripcion' => 'Descripcion de prueba.',
            'number' => 2
        ]);
        DB::table('opciones_respuestas')->insert([
            'id' => 3,
            'pregunta_id' => 2,
            'descripcion' => 'Descripcion de prueba.',
            'number' => 1
        ]);
        DB::table('opciones_respuestas')->insert([
            'id' => 4,
            'pregunta_id' => 2,
            'descripcion' => 'Descripcion de prueba.',
            'number' => 2
        ]);
    }

    public function cuestionarios()
    {
        DB::table('cuestionarios')->delete();
        DB::table('cuestionarios')->insert([
            'id' => 1,
            'nombre' => 'Cuestionario 1',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo',
            'version' => '1',
        ]);
        DB::table('cuestionarios')->insert([
            'id' => 2,
            'nombre' => 'Cuestionario 2',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo',
            'version' => '1',
        ]);
    }

    public function indicadores()
    {
        DB::table('indicadores')->delete();
        DB::table('indicadores')->insert([
            'id' => 1,
            'nombre' => 'Indicador 1',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo',
        ]);
        DB::table('indicadores')->insert([
            'id' => 2,
            'nombre' => 'Indicador 2',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo'
        ]);
    }

    public function dimensiones(){
        DB::table('enunciados')->delete();
        DB::table('dimensiones')->delete();
        DB::table('dimensiones')->insert([
            'id' => 1,
            'nombre' => 'Dimension 1',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo',
            'logo' => ''
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 1,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'bajo'
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 1,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'medio'
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 1,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'alto'
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 1,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'muy alto'
        ]);
        DB::table('dimensiones')->insert([
            'id' => 2,
            'nombre' => 'Dimension 2',
            'descripcion' => 'Descripcion de prueba.',
            'estado' => 'activo',
            'logo' => ''
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 2,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'bajo'
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 2,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'medio'
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 2,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'alto'
        ]);
        DB::table('enunciados')->insert([
            'dimension_id' => 2,
            'descripcion' => 'Desc',
            'nivel_importancia' => 'muy alto'
        ]);
    }
}
