<?php

use App\Models\EntidadRecinto;
use Illuminate\Database\Seeder;

class RecinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadRecinto::class,3)->create();
    }
}
