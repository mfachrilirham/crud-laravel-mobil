<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = ['merek', 'warna', 'tahun', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
