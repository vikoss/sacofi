<?php

use Illuminate\Database\Seeder;
use App\Role;

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
        $role->description = 'Administrator del Sistema';
        $role->save();
        
        $role = new Role();
        $role->name = 'client';
        $role->description = 'El cliente solo puede visualizar sus documentos';
        $role->save();

        $role = new Role();
        $role->name = 'accountant';
        $role->description = 'Los contadores se encargan de subir los documentos';
        $role->save();
    }
}
