<?php

use App\Models\EntidadCorreo;
use Illuminate\Database\Seeder;

class correoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadCorreo::class,39)->create();
    }
}
