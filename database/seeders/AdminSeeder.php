<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = User::create([
            'first_name' => "owner",
            'last_name' => "owner",
            'email' => "owner@owner.com",
            'password' => Hash::make("owner"),
        ]);

        $user->attachRole("owner");

    }
}

