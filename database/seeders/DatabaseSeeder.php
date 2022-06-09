<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Si User',
            'email' => 'siuser@vcb.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('secret'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Si Admin',
            'email' => 'siadmin@vcb.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('secret'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Si Manager',
            'email' => 'simanager@vcb.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('secret'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'role' => 'manager'
        ]);
    }
}
