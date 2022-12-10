<?php

namespace Database\Factories;

use App\Models\RequestStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestStatus>
 */
class RequestStatusFactory extends Factory
{
    protected $model = RequestStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'text' => fake()->text(200),
        ];
    }
}
