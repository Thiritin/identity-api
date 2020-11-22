<?php
/*
 * Eurofurence Identity Provider Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/ef-idp
 */

namespace Database\Factories;

use App\Models\TwoFactor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TwoFactorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TwoFactor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'secret' => $this->faker->word,
            'type' => $this->faker->word,
        ];
    }
}
