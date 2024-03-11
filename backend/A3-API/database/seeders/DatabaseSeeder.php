<?php

namespace Database\Seeders;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\InstructorFactory;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //descomentar y ejecutar de primero para crear la base de datos

        //Llamada al InstructorFactory para crear 5 instructores con perfiles variados
        /*Instructor::factory()->create([
            'type' => 'Planta',
            'profile' => 'Administrativo',
        ]);

        Instructor::factory()->create([
            'type' => 'Planta',
            'profile' => 'Desarrollador',
        ]);

        Instructor::factory()->create([
            'type' => 'Planta',
            'profile' => 'Auxiliar',
        ]);

        //Llamada al UserFactory para crear 5 usuarios
        User::factory(5)->create();


        // descomentar y ejecutar de segundo para crear la base de datos
        $this->call(CareerSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(EnvironmentTypeSeeder::class);*/


        //descomentar y ejecutar de tercer para crear la base de datos
        /*$this->call(LocationSeeder::class);
        $this->call(LearningEnvironmentSeeder::class);*/


        //Descomentar y ejecutar de ultimo para crear la base de datos
        /*$this->call(SchedulingEnvironmentSeeder::class);*/


    }
}
