<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $guarded=[];
    public $translatable = ['product_name'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getImageAttribute(){
        return $this->getFirstMediaUrl('product_images');
    }
}
