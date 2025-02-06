<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'title', 'content','reviewer'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

}
