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

        // DB::table('users')->insert([
        //     'name' => 'Si User',
        //     'email' => 'siuser@vcb.com',
        //     'email_verified_at' => date('Y-m-d H:i:s'),
        //     'password' => Hash::make('secret'),
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Si Admin',
        //     'email' => 'siadmin@vcb.com',
        //     'email_verified_at' => date('Y-m-d H:i:s'),
        //     'password' => Hash::make('secret'),
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        //     'role' => 'admin'
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Si Manager',
        //     'email' => 'simanager@vcb.com',
        //     'email_verified_at' => date('Y-m-d H:i:s'),
        //     'password' => Hash::make('secret'),
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s'),
        //     'role' => 'manager'
        // ]);

        // DB::table('product')->insert([
        //     'name' => Str::random(10),
        //     'contact' => Str::random(50),
        //     'price' => '50000000',
        //     'location' => Str::random(100),
        //     'expired_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' + 8 days')),
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // DB::table('product')->insert([
        //     'name' => Str::random(10),
        //     'contact' => Str::random(50),
        //     'price' => '65000000',
        //     'location' => Str::random(100),
        //     'expired_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' + 10 days')),
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // DB::table('product')->insert([
        //     'name' => Str::random(10),
        //     'contact' => Str::random(50),
        //     'price' => '70000000',
        //     'location' => Str::random(100),
        //     'expired_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' + 15 days')),
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // DB::table('product')->insert([
        //     'name' => Str::random(10),
        //     'contact' => Str::random(50),
        //     'price' => '20000000',
        //     'location' => Str::random(100),
        //     'expired_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' + 21 days')),
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        DB::table('history')->insert([
            'product_id' => rand(1,10),
            'history_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 100 days')),
            'history' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('history')->insert([
            'product_id' => rand(1,10),
            'history_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 150 days')),
            'history' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('history')->insert([
            'product_id' => rand(1,10),
            'history_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 130 days')),
            'history' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('history')->insert([
            'product_id' => rand(1,10),
            'history_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 90 days')),
            'history' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
