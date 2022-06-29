<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Mohamed",
            'last_name' => "Mkadem",
            'email' => "admin@edraakmc.com",
            'password' => Hash::make("edraakMC_admin"),
            'role' => "admin",
            'email_verified_at' => now(),
            
        ]);
    }
}
