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
            'nombre' => 'Super Admin',
            'descripcion' => 'descp',
            'logo' => '',
            'nivel_importancia' => 1
        ]);
    }
}
