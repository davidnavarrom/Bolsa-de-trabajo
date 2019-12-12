<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();

        $role2 = new Role();
        $role2->name = 'candidato';
        $role2->description = 'Candidato';
        $role2->save();
    }
}
