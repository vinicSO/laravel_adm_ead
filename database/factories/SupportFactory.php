<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['P', 'A', 'C'];

        return [
            'id' => Str::uuid(),
            'user_id' => User::factory(),
            'lesson_id' => Lesson::factory(),
            'status' => $status[rand(0, 2)],
            'description' => $this->faker->sentence(20)
        ];
    }
}
