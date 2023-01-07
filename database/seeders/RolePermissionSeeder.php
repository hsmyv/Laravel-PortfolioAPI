<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create(['name' => 'Super-Admin']);
         Role::create(['name' => 'Admin']);
         Role::create(['name' => 'Standart-User']);

        //Give role to model
        /*
        $user = User::where('id', 1)->first();
        $user->syncRoles('Super-Admin');
        */

        //GIVE PERMISSION TO ROLE
        /*
        $role = Role::where('id', 1)->first();
        $permission =  Permission::where('id', 2)->first();
        $role->givePermissionTo($permission);
        */
        //$permission = Permission::create(['name' => 'Update-Portfolio']);
        /* // GIVE PERMISSION TO MODEL
        $model = User::where('id', 5)->first();
        $permission = Permission::create(['name' => 'Create-Portfolio']);
        $model->givePermissionTo($permission);
        */
    }
}
