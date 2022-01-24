<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'isAdmin' => '1',
        ]);
    }
}
