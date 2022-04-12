<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->insert(
            [
                [
                    'title' => 'Penelitian Gadget',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Pariatur officia omnis harum inventore voluptas.',
                    'link' => 'https://www.google.com/',
                    'user_id' => 1
                ],
                [
                    'title' => 'Penelitian Danau Toba',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Pariatur officia omnis harum inventore voluptas.',
                    'link' => 'https://www.google.com/',
                    'user_id' => 1
                ],
                [
                    'title' =>'Penelitian Balige',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Pariatur officia omnis harum inventore voluptas.',
                    'link' => 'https://www.google.com/',
                    'user_id' => 2
                ],
                [
                    'title' =>'Penelitian Samosir',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.Pariatur officia omnis harum inventore voluptas.',
                    'link' => 'https://www.google.com/',
                    'user_id' => 5
                ],
            ]
        );
        
    }
}
