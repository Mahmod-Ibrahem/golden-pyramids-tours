<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourTranslation extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['tours_id', 'slug', 'locale', 'title', 'description', 'itenary_title', 'itenary_section', 'included', 'excluded', 'duration', 'locations'
        , 'places'];

    public function tour()
    {
        return $this->belongsTo('Tour');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true, //To Change Slug WhenEver Title Field Is Changed
            ]
        ];
    }

    public function getRouteKeyName(): string //reslove this model by slug not id
    {
        return 'slug';
    }


}
