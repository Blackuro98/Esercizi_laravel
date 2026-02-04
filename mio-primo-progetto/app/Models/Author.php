<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['publication_id','user_id','order','is_corresponding'];
    protected $casts = ['is_corresponding' => 'boolean'];

    public function publication() { return $this->belongsTo(Publication::class); }
    public function user()        { return $this->belongsTo(User::class); }
}