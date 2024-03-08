<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearningEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LearningEnvironmentSeeder::insert([
            ["name" => "Nuevo entorno", "capacity" => 29 , "area_mt2" => 10, 'floor' => 3 ,
                    "inventory" => "Computadores" , 'type_id' => 6 , 'location_id' => 2 , 'status' => 'INACTIVO'],
        ]);
    }
}