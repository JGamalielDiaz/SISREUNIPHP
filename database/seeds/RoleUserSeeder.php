<?php

use App\Models\EntidadRoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EntidadRoleUser::create([
            'role_id' => 1, 
            'user_id' => 1 //cambiar a 1 luego de test; para los test dejarlo en 2
        ]);
    }
}
