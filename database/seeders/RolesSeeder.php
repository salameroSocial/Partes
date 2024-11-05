<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'administracion']);
        Role::create(['name' => 'brigada']);
        Role::create(['name' => 'limpieza']);
        Role::create(['name' => 'servicios']);
    }
}
