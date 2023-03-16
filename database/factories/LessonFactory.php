<?php

namespace Database\Factories;

use App\Models\Module;
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
            'module_id' => Module::all()->random(),
            'name' => $name,
            'url' => Str::slug($name),
            'video' => $this->faker->url(),
            'description' => $this->faker->sentence(20)
        ];
    }
}
