<?php
namespace Database\Factories;

use Illuminate\Database\EloquentFactories\Factory;
use App\Models\Author;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            // publication_id e user_id vanno impostati dal seeder o tramite states
            'order'            => $this->faker->numberBetween(1,5),
            'is_corresponding' => $this->faker->boolean(30),
        ];
    }
}
