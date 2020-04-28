<?php

use App\EntidadDireccion;
use Illuminate\Database\Seeder;

class direcTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadDireccion::class,80)->create();
    }
}
