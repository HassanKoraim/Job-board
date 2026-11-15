<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends Factory<post>
 */
class postFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid()->tostring(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3,asText: true),
            'published'=> $this->faker->boolean(),
            'user_id'   => User::factory(),
             ];
    }
}
