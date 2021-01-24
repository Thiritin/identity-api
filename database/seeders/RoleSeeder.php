<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "Banned"]);
        Role::create(["name" => "Attendee"]);
        Role::create(["name" => "Verified"]);
        Role::create(["name" => "Staff"]);
        Role::create(["name" => "Director"]);
        Role::create(["name" => "Board of Directors"]);
        Role::create(["name" => "Administrator"]);
    }
}
