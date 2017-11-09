<?php

use Illuminate\Database\Seeder;

class create_admin_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'nombre' => 'Super Admin',
            'email' => 'admin1@empaz.com',
            'password' => bcrypt('snoopy007'),
            'role' => 'superadmin'
        ]);
    }
}
