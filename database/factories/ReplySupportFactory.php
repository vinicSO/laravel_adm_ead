<?php

namespace Database\Factories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReplySupport>
 */
class ReplySupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'support_id' => Support::all()->random(),
            'user_id' => User::all()->random(),
            'description' => $this->faker->sentence(20),
        ];
    }
}
