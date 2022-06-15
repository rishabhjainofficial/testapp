<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function subcategory()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'parent_id', 'id');
    }
}
