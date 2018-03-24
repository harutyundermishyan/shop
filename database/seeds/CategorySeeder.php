<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::insert([
            [
                'name' => 'oxi'
            ],
            [
                'name' => 'sok'
            ],
            [
                'name' => 'chips'
            ],
            [
                'name' => 'krupa'
            ],
            [
                'name' => 'cxaxot'
            ]
        ]);
    }
}
