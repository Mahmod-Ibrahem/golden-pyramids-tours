<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable=['type','image'];
    public $translatable=['name','header','bg_header','description','title_meta','description_meta'];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

}
