<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forums')->insert([
            [
                'title' => 'Java Dasar',
                'desc' => '<p>Deskripsi Java Dasar</p>',
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'Java OOP',
                'desc' => '<p>Deskripsi Java OOP</p>',
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'Python Dasar',
                'desc' => '<p>Deskripsi Python Dasar</p>',
                'user_id' => 1,
                'category_id' => 2
            ],
        ]);
    }
}
