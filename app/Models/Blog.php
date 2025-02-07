<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory , Sluggable , HasTranslations;

    protected $fillable = ['slug', 'title', 'blog', 'image','city_id'];
    public $translatable =['title','blog','slug'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title',
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
