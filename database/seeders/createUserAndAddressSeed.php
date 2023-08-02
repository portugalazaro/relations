<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class createUserAndAddressSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'savio Portugal',
            'email'=> 'lazaroportugal@gmail.com',
            'password' => hash::make('lazaro'),
            // 'address_id' => 1
        ]);

        DB::table('addresses')->insert([
            'addresses' => 'Rua orlando ferreira - machados'
        ]);
    }
}
