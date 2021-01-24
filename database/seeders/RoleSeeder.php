<?php
/*
 * Eurofurence Identity Provider Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/ef-idp
 */

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
        Role::create(['name' => 'Banned']);
        Role::create(['name' => 'Attendee']);
        Role::create(['name' => 'Verified']);
        Role::create(['name' => 'Staff']);
        Role::create(['name' => 'Director']);
        Role::create(['name' => 'Board of Directors']);
        Role::create(['name' => 'Administrator']);
    }
}
