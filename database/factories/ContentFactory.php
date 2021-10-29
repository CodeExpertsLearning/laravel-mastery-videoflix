<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'description' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(5, true),
            'slug' => \Illuminate\Support\Str::slug($title),
            'type' => 1,
            'cover' => $this->faker->imageUrl(1920, 1080)
        ];
    }

    public function contentSeries()
    {
        return $this->state([
            'type' => 2
        ]);
    }
}
