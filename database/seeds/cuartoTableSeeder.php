<?php

use App\EntidadCuarto;
use Illuminate\Database\Seeder;

class cuartoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadCuarto::class,300)->create();
    }
}
