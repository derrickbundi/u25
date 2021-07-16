<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class usersroleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $one = User::find(1);
        $role = Role::find(1);
        $permissions = [1,2,3];
        $role->syncPermissions($permissions);
        $one->assignRole([$role->id]);

        $two = User::find(2);
        $role = Role::find(1);
        $permissions = [1,2];
        $role->syncPermissions($permissions);
        $two->assignRole([$role->id]);

        $three = User::find(3);
        $role = Role::find(2);
        $permissions = [2];
        $role->syncPermissions($permissions);
        $three->assignRole([$role->id]);
    }
}
