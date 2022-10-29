<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Position::class;
    public function definition()
    {
        $p = file_get_contents("public/public/seederData/jobs.txt");
        $p = explode(',', $p);

        return [
//            'positionName' =>$this->array_rand($p),
            'positionName' => $p[array_rand($p)],
            'positionStatus' => '1',
            'postionCode' => 'cv_'.Str::random(8),
        ];
    }
}
