<?php

use App\Models\EntidadCarrera;
use Illuminate\Database\Seeder;

class CarrerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadCarrera::class,5)->create();
    }
}
