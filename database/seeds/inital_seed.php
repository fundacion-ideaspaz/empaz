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
        // $this->indicadores();
        // $this->preguntas();
        // $this->cuestionarios();
    }

    public function dimensiones(){
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
