<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin',
            'email' => 'me@thiritin.com',
            'password' => Hash::make('test'),
        ]);
        $this->call(
            [
                RoleSeeder::class,
            ]
        );
    }
}
