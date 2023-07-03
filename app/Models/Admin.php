<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;

class Admin extends Authenticatable implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasApiTokens;
    protected $guarded=[];
    protected $hidden = [
        'password',
    ];
    public function getImageAttribute(){
        return $this->getFirstMediaUrl('admin_images');
    }

}
