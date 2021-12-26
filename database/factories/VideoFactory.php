<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word;

        return [
            'name' => $name,
            'description' => $this->faker->sentence,
            'slug' => \Illuminate\Support\Str::slug($name),
            'video' => 'video.m3ua',
            'thumb' => $this->faker->imageUrl(640, 480),
            'code'  => $this->faker->uuid
        ];
    }
}
