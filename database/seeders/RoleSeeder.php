<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'admin.index']);
        $permission = Permission::create(['name' => 'admin.create']);
        $permission = Permission::create(['name' => 'admin.edit']);
        $permission = Permission::create(['name' => 'admin.destroy']);


        //
    }
}
