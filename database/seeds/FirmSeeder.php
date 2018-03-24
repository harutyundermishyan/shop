<?php

use Illuminate\Database\Seeder;

class FirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Firm::insert([
            [
                'name' => 'philip moris'
            ],
            [
                'name' => 'malboro'
            ],
            [
                'name' => 'lays'
            ],
            [
                'name' => 'maranik'
            ],
            [
                'name' => 'coca-cola'
            ],
            [
                'name' => 'xortica'
            ]
        ]);
    }
}
