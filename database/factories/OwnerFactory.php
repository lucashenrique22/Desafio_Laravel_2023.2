<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OwnerFactory extends Factory
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
            'name' => fake()->name(),
            'profile_picture' => null,
            'email' => fake()->email(),
            'cpf' => fake()->text(20),
            'birth_date' => fake()->date(),
            'address_id' => Address::factory()->create()->id,
            'phone_number' => fake()->phoneNumber()

        ];
    }
}
