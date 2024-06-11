<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [];

      //child category
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

     // Parent category relationship
     public function parent()
     {
         return $this->belongsTo(Category::class, 'parent_id', 'id');
     }

}
