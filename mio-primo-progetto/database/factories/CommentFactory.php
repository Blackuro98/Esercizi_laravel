<?php
namespace Database\Factories;

use Illuminate\Database\EloquentFactories\Factory;
use App\Models\Comment;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            // I campi polimorfici commentable_type/id NON sono impostati qui.
            // Verranno compilati via relazione o con ->for($model, 'commentable')
            'body'    => $this->faker->sentence(10),
            'user_id' => null,
        ];
    }
}
