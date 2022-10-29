<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' =>$this->faker->name(),
            'email' =>$this->faker->unique()->safeEmail(),
//            'email_verified_at' => now(),
            'password' => '$2y$10$jsTN8cw796QQLFg2YvCEl.iSDvwIlRXV8hBvqDxV.RO4P0fFH5xnq', // password
            'remember_token' => Str::random(10),
            'role' => '2',
            'status' => '1',
            'userCode' => 'nv_'.Str::random(8),
//            k có thêm trực tiếp đc, thêm vào bản phụ ?
//            'department_id' => rand(1, 10),
//            'position_id' => rand(1, 10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
