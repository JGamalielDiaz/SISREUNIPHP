<?php

use App\Models\EntidadMunicipio;
use Illuminate\Database\Seeder;

class MuniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadMunicipio::class,30)->create();
    }
}
