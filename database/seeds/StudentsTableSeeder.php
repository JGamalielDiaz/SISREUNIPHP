<?php

use App\Repositories\Estudiante\EntidadEstudiante;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadEstudiante::class,80)->create();
    }
}
