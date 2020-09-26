<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence,
            'choices' => [
                'a' => $this->faker->word,
                'b' => $this->faker->word,
                'c' => $this->faker->word,
                'd' => $this->faker->word,
            ],
            'answer' => $this->faker->randomElement(['a', 'b', 'c', 'd']),
            'departments' => ['All', 'Accounting']
        ];
    }
}
