<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'firstname' => 'Anthony Carl',
            'lastname' => 'Meniado',
            'email' => 'carlsus@gmail.com',
            'password' => bcrypt('password'),
            'builtin' => 1
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'firstname' => 'System',
            'lastname' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'builtin' => 0
        ]);

    }
}
