<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function subcategory()
  {
    return $this->belongsTo(Subcategory::class);
  }
    public function brand()
  {
    return $this->belongsTo(Brand::class);
  }
}
