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
            'module_id' => '0e6c3a54-edbe-41a6-9b4b-c0b5582f64c8',
            'name' => $name,
            'url' => Str::slug($name),
            'video' => $this->faker->url(),
            'description' => $this->faker->sentence(20)
        ];
    }
}
