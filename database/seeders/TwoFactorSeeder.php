<?php

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
