<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();

        $post = collect(fake()->paragraphs(rand(5, 15)))
        ->map(function ($item) {
            return "<p>$item</p>";
        })->toArray();

        $post = implode($post);

        return [
            'uuid'        => Str::uuid(),
            'user_id'     => 3,
            'title'       => $title,
            'description' => fake()->paragraph(),
            'slug'        => Str::slug($title),
            'post'        => $post,
            'created_by'  => Auth::id() ?: 1,
            'updated_by'  => Auth::id() ?: 1,
        ];
    }
}
