<?php

use App\Repositories\Persona\EntidadPersona;
use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadPersona::class,302)->create();
    }
}
