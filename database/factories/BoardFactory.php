<?php

namespace Database\Factories;

use App\Models\Board;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    protected $model = Board::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'earliest_start_date' => $this->faker->date(),
            'earliest_finish_date' => $this->faker->date(),
            'latest_start_date' => $this->faker->date(),
            'latest_finish_date' => $this->faker->date(),
            'task_duration' => $this->faker->randomNumber(),
            'dependencies_board' => $this->faker->randomElements(),
            'status' => $this->faker->randomElement(['in progress', 'completed', 'not started']),
            'project_id' => function () {
                return \App\Models\Team::factory()->create()->id;
            }
        ];
    }
}
