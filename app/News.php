<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['category_id','title','description','pubDate','thumbnail_url'];

    public function category(){
        $this->belongsTo(Category::class);
    }
}
