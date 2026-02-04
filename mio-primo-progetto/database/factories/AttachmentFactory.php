<?php
namespace Database\Factories;

use Illuminate\Database\EloquentFactories\Factory;
use App\Models\Attachment;

class AttachmentFactory extends Factory
{
    protected $model = Attachment::class;

    public function definition(): array
    {
        return [
            // I campi polimorfici attachable_type/id NON sono impostati qui.
            // Verranno compilati:
            //   - via relazione: $model->attachments()->create([...])
            //   - oppure con factory: Attachment::factory()->for($model, 'attachable')->create()
            'path'        => 'docs/'.$this->faker->bothify('file_##').'.pdf',
            'uploaded_by' => null,
        ];
    }
}
