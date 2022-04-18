<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert(
            [
                [
                    'name' => 'Alfrendo Silalahi',
                    'email' => 'alfrendo@gmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => 1
                ],
                [
                    'name' => 'Daniel Lumbanraja',
                    'email' => 'daniel@gmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => 0
                ],
                [
                    'name' => 'Gabryella Apriani Sinaga',
                    'email' => 'gabryella@gmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => 0
                ],
                [
                    'name' => 'Theresia Rumapea',
                    'email' => 'theresia@gmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => 0
                ],
                [
                    'name' => 'Hans Situmeang',
                    'email' => 'hans@gmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => 0
                ],
                [
                    'name' => 'Rewina Pakpahan',
                    'email' => 'rewina@gmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => 0
                ],
                [
                    'name' => 'Jonggi Sitorus',
                    'email' => 'jonggi@gmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => 0
                ]
            ]
        );

    }
}
