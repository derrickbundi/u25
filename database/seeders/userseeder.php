<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'fname' => 'Derrick',
                'lname' => 'Bundi',
                'mobile' => '0799770833',
                'email' => 'derrick@xwift.co.ke',
                'password' => bcrypt('123456')
            ],
            [
                'fname' => 'Sebastian',
                'lname' => 'Kilonzo',
                'mobile' => '0712345678',
                'email' => 'kilonzo@crownstarsmagazine.co.ke',
                'password' => bcrypt('123456')
            ],
            [
                'fname' => 'Editor',
                'lname' => 'User',
                'mobile' => '0712345678',
                'email' => 'editor@crownstarsmagazine.co.ke',
                'password' => bcrypt('123456')
            ]
        ]);
    }
}
