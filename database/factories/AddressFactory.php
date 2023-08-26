<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'street' => fake()->streetName(),
            'neighborhood' => fake()->streetAddress(),
            'state' => fake()->streetSuffix(),
            'cep' => fake()->streetSuffix,
            'number' => fake()->randomNumber()
        ];
    }
}
