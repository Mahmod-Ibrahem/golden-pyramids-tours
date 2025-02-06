<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory ,Sluggable,HasTranslations;

    protected $fillable=['name','slug','image'];
    public $translatable =['name'];
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
    public function getRouteKeyName(): string //reslove this model by slug not id
    {
        return 'slug';
    }

}
