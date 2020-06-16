<?php

use App\Models\EntidadTelefono;
use Illuminate\Database\Seeder;

class telefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(EntidadTelefono::class,100)->create();
    }
}
