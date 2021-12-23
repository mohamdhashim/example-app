<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "street"=> $this->faker->streetName(),
            "apartment"=> rand(1, 50),
            "floor"=> rand(1, 40),
            "building"=> $this->faker->buildingNumber(),
            'area_id'=> rand(1, 20),
            'user_id'=> rand(1, 20),
        ];
    }
}
