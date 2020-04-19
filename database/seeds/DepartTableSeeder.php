<?php

use App\EntidadDepartamento;
use Illuminate\Database\Seeder;

class DepartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadDepartamento::class,20)->create();
    }
}
