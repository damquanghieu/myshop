<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function images()
    {
        return $this->hasMany('App\ProductImage', 'product_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'product_tags', 'product_id', 'tag_id');
    }
}
