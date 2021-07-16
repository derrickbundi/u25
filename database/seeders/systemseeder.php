<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class systemseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('systems')->insert([
            'c_name' => 'CrownStars Magazine',
            'code' => 5509
        ]);
    }
}
