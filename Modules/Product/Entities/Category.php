<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','status','caption','keywords','metaTag'];

    public function product(){
        return $this->hasMany(Product::class);  
    }
}
