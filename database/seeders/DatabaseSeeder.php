<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(permissionseeder::class);
        $this->call(roleseeder::class);
        $this->call(userseeder::class);
        $this->call(systemseeder::class);
        $this->call(usersroleseeder::class);
        $this->call(categoryseeder::class);
        $this->call(messageseeder::class);
    }
}
