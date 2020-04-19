<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $this->call(DepartTableSeeder::class);
        $this->call(MuniTableSeeder::class);
        $this->call(CarrerTableSeeder::class);
        $this->call(PersonTableSeeder::class);
        $this->call(telefTableSeeder::class);
        $this->call(correoTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(cuartoTableSeeder::class);
        $this->call(hisEstuCuartosTableSeeder::class);
        $this->call(direcTableSeeder::class);
        
    }
}
