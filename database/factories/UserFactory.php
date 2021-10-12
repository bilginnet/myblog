<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'level' => 1,
                'email' => 'admin@mobillium.com',
                'password' => '$2y$12$6lXUot9QL6o93B6EcBtN9uI2xpak8kv639NNted9MfnBXMWB17WA2',
            ];
        });
    }

    public function author(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'level' => 3,
                'email' => 'writer1@mobillium.com',
                'password' => '$2y$12$6lXUot9QL6o93B6EcBtN9uI2xpak8kv639NNted9MfnBXMWB17WA2',
            ];
        });
    }
}
