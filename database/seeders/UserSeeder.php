<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Samuel Mayorga',
            'email' => 'sams134@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('ultima'),
            
        ]);
    }
}
