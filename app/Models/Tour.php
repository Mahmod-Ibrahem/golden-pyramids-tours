<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'group', 'preference', 'tour_cover', 'price_per_person', 'price_two_five', 'price_six_twenty'];


    public function tourTranslations()
    {
     return  $this->hasMany(TourTranslation::class, 'tours_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(TourImage::class, 'tours_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'tour_id', 'id');
    }

    public function scopeWithTranslations(Builder $query): Builder
    {
        return $query->with(['category.categoryTranslations', 'tourTranslations'=>function ($query) {
            $query->where('locale','=',app()->getLocale());
        }]);
    }

}

