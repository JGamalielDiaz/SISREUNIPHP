<?php

use App\Models\EntidadGenero;
use Illuminate\Database\Seeder;

class generoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(EntidadGenero::class,2)->create();
    }
}
