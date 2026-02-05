<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
public function run()
{
    // Crear Roles
    $admin = Role::create(['name' => 'admin']);
    $editor = Role::create(['name' => 'editor']);

    // Crear un Permiso de prueba
    Permission::create(['name' => 'gestionar usuarios'])->assignRole($admin);
}}
