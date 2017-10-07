<?php

use Illuminate\Database\Seeder;

class dimensiones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dimensiones')->insert([
            'id' => 1,
            'nombre' => 'Dimension 1',
            'descripcion' => 'Descripcion de prueba.',
            'logo' => '',
            'nivel_importancia' => 1
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
    }
}
