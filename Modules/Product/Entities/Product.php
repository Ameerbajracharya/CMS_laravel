<?php

namespace Modules\Product\Entities;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\ProductType;
use Modules\Product\Entities\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable = ['name','mrp','code','discount','image','description','brand_id','category_id','producttype_id','status','caption','keywords','metatag'];

    // establishing the relation between tables
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function producttype(){
        return $this->belongsTo(ProductType::class);
    }

}

