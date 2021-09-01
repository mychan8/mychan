<?php

namespace Database\Factories;

use App\Models\Mychan;
use App\Http\Controllers\Aux;
use Illuminate\Database\Eloquent\Factories\Factory;

class MychanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mychan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $user = $this->faker->unique()->name();
        $title = $this->faker->unique()->text(15);

        return [

            /* Registro */
            'user' => $user,
            'password' => '$2y$10$xdHMbLJk2O0aJ47CiLbwwehS33r67vSLuxDZf5gVwqmkaGN0/h6xS',

            /* Información del usuario */
            'subtitle' => $this->faker->text(10),
            'description' => $this->faker->paragraph(),

            /* Publicaciones */
            'nick' => $this->faker->name(),
            'title' => $title,
            'content' => $this->faker->paragraph(5),
            'remarkID' => Aux::randomPassword(),
            'by' => $user,

            /* Informacion adicional */
            'visitor' => $this->faker->ipv4(),
        ];
    }
}
