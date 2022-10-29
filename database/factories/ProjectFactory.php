<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Position::class;
    public function definition()
    {
        $p = file_get_contents("public/public/seederData/project.txt");
        $p = explode(',', $p);

        return [
//            'positionName' =>$this->array_rand($p),
//            'nameProject' => $p[array_rand($p)],
//            'status' => '1',
//            'postionCode' => 'da_'.Str::random(8),
        ];
    }
}
