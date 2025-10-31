<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    protected $fillable = [
        'tour_id',
        'name',
        'email',
        'phone',
        'nationality',
        'adult',
        'children_under_12',
        'children_under_6',
        'price_per_adult_person',
        'price_per_child_under_12',
        'price_per_child_under_6',
        'total_price',
        'start_date'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
