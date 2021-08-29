<?php

namespace Database\Factories;

use App\Models\Mychan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MychanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mychan::class;

    public function randomPassword($lenght=8)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;

        for ($i = 0; $i < $lenght; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] .= $alphabet[$n];
        }

        return implode($pass);
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user' => $this->faker->unique()->name(),
            'title' => $this->faker->unique()->text(15),
            'content' => $this->faker->paragraph(5),
            'visitor' => $this->faker->ipv4(),
            'password' => $this->randomPassword(),
            'remarkID' => $this->randomPassword()
        ];
    }
}
