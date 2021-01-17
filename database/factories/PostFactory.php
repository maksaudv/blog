<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 7));
        return [
            'category_id' => rand(1, 10),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->text(rand(100, 255))
        ];
    }
}
