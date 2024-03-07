<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AssetListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'device_image' => 'INF0161.jpg',
            'asset_tag' => 'ISSB'.Str::random(4),
            'serial' => Str::random(10),
            'brand' => $this->faker->numberBetween(1, 9),
            'model' => 'Vivobook A150Z', 
            'category' => $this->faker->numberBetween(1, 6),
            'status' => $this->faker->numberBetween(1, 4),
            'checked_out_to' => 'INF0161',
            'location' => $this->faker->numberBetween(1, 6),
            'current_value' => 'RM3000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
