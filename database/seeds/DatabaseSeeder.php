<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nuevos Usuarios

        DB::table('users')->insert([
            'id' => '1',
            'email' => 'ivan990@gmail.com',
            'password' => bcrypt('1'),
            'nombre' => 'Ivan',
            'apellido_paterno' => 'Orellana',
            'apellido_materno' => 'Val',
            'rut' => '17698379',
            'rut_v' => '5',
            'celular' => '976084264',
            'tipo' => 'Docente',
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'email' => 'i.orellanav@alumnos.duoc.cl',
            'password' => bcrypt('1'),
            'nombre' => 'Ivan',
            'apellido_paterno' => 'Orellana',
            'apellido_materno' => 'Val',
            'rut' => '17698379',
            'rut_v' => '5',
            'celular' => '976084264',
            'tipo' => 'Ayudante',
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'email' => 'iorellanv@gmail.com',
            'password' => bcrypt('1'),
            'nombre' => 'Ivan',
            'apellido_paterno' => 'Orellana',
            'apellido_materno' => 'Val',
            'rut' => '17698379',
            'rut_v' => '5',
            'celular' => '976084264',
            'tipo' => 'Admin',
        ]);

        // Profesores

        DB::table('teachers')->insert([
            'user_id' => '1',
            'anexo' => '105',
            'faculty_id' => '1',
        ]);

        // Alumnos

        DB::table('students')->insert([
            'user_id' => '2',
        ]);

        // Admin

        DB::table('admins')->insert([
            'user_id' => '3',
        ]);

    }
}
