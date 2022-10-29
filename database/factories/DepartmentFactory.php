<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Department::class;
    public function definition()
    {
        $d = file_get_contents("public/public/seederData/departments.txt");
        $d = explode(',', $d);
        return [
            'departmentName' => $d[array_rand($d)],
            'departmentCode' => 'cv_'.Str::random(8),
            'slotAccount' => '10',
            'manager_id' => rand(1, 5),
        ];
    }
}
