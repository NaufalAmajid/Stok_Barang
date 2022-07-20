<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([

            'name' => 'Naufal Amajid',
            'username' => 'nanzy',
            'password' => Hash::make('321')
            
        ]);

        \App\Models\User::create([

            'name' => 'Rian Widi',
            'username' => 'rian',
            'password' => Hash::make('456')

        ]);

        \App\Models\User::create([

            'name' => 'Restu Aprianto',
            'username' => 'restu',
            'password' => Hash::make('123'),
            'is_owner' => true

        ]);
    }
}
