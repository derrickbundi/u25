<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Entrepreneurship', 'Agribusiness', 'Environment', 'Talent'];
        foreach($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
