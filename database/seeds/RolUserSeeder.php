<?php

use Illuminate\Database\Seeder;
use App\Models\EntidadRoleUser;

class RolUserSeeder extends Seeder
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
            'user_id' => 1
        ]);
    }
}
