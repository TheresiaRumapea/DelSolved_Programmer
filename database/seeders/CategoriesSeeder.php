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
        DB::table('categories')->insert([
            [
                'title' => 'Java',
                'desc' => '<p>Deskripsi Java</p>',
                'user_id' => 1
            ],
            [
                'title' => 'Python',
                'desc' => '<p>Deskripsi Python</p>',
                'user_id' => 1
            ],
            [
                'title' => 'Java Back-End',
                'desc' => '<p>Deskripsi Java Back-End</p>',
                'user_id' => 1
            ]
        ]);
    }
}
