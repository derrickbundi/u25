<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'editor', 'user', 'outlier'];
        foreach($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
