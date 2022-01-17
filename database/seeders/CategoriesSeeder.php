<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = array(
            array(
                'id' => '1',
                'name' => 'category1',
                'active' => '1',
                'created_at' => '2022-01-17 16:38:52',
                'updated_at' => '2022-01-17 16:38:52'
            ),

            array(
                'id' => '2',
                'name' => 'category2',
                'active' => '1',
                'created_at' => '2022-01-17 16:39:00',
                'updated_at' => '2022-01-17 16:39:00'
            ),
            array(
                'id' => '3',
                'name' => 'category3',
                'active' => '0',
                'created_at' => '2022-01-17 16:40:00',
                'updated_at' => '2022-01-17 16:40:00'
            )
        );


        DB::table('categories')->insert($categories);
    }
}
