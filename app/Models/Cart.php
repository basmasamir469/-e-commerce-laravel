<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    Protected $guarded=[];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot(['price','quantity']);
    }
}
