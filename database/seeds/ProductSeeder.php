<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::insert([
            [
                'category_id' => '5',
                'firm_id' => '2',
                'name' => 'barak malboro',
                'number' => '10',
                'first_price' => '500',
                'last_price' => '550',
                'percent' => '3',
            ],
            [
                'category_id' => '5',
                'firm_id' => '2',
                'name' => 'hast malboro',
                'number' => '20',
                'first_price' => '700',
                'last_price' => '750',
                'percent' => '4',
            ],
            [
                'category_id' => '5',
                'firm_id' => '2',
                'name' => 'mijin malboro',
                'number' => '25',
                'first_price' => '600',
                'last_price' => '650',
                'percent' => '3',
            ],
            [
                'category_id' => '1',
                'firm_id' => '6',
                'name' => 'xortica solver',
                'number' => '5',
                'first_price' => '1600',
                'last_price' => '2650',
                'percent' => '5',
            ],
            [
                'category_id' => '1',
                'firm_id' => '6',
                'name' => 'xortica black',
                'number' => '6',
                'first_price' => '1800',
                'last_price' => '2650',
                'percent' => '5',
            ]
        ]);
    }
}
