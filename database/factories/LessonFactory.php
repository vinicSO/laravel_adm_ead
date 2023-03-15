<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();

        return [
            'id' => Str::uuid(),
            'module_id' => '64d35cfc-5d96-4dc9-a4cb-7e5d918fe631',
            'name' => $name,
            'url' => Str::slug($name),
            'video' => $this->faker->url(),
            'description' => $this->faker->sentence(20)
        ];
    }
}
