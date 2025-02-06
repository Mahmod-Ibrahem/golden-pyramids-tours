<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryTranslation extends Model
{
    use HasFactory , Sluggable;

    protected $fillable=['slug','bg_header','header','description','name','title_meta','description_meta','locale','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
