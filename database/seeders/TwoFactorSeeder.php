<?php
/*
 * Stride Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://stride.thiritin.com
 */

namespace Database\Seeders;

use App\Models\TwoFactor;
use Illuminate\Database\Seeder;

class TwoFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TwoFactor::factory()->count(5)->create();
    }
}
