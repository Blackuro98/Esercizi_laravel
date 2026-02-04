<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['attachable_type','attachable_id','path','uploaded_by'];

    public function attachable() { return $this->morphTo(); }
    public function uploader()   { return $this->belongsTo(User::class, 'uploaded_by'); }
}