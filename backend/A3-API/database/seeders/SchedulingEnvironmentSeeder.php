<?php

namespace Database\Seeders;

use App\Models\Scheduling_environment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchedulingEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scheduling_environment::insert([
            [
                "course_id" => 1,
                "instructor_id" => 1,
                "date_scheduling" => '2022-01-01',
                "initial_hour" => '10:00',
                "final_hour" => '11:00',
                "environment_id" => 1,
            ]
        ]);
    }
}