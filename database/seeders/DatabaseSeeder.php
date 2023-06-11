<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['title' => 'admin'],
            ['title' => 'user']
        ]);
         \App\Models\User::factory(1)->create();
         DB::table('profiles')->insert(['user_id' => 1]);
    }
}
