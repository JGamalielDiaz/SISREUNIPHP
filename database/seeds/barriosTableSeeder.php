<?php

use App\EntidadBarrio;
use Illuminate\Database\Seeder;

class barriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadBarrio::class,20)->create();
    }
}
