<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Sluggable\HasSlug;
// use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;

class Product extends Model
{
    // use HasSlug;
    
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    // public function getSlugOptions()
    // {
    //     return SlugOptions::create()
    //                         ->generateSlugsFrom('name')
    //                         ->saveSlugsTo('slug');
    // }

    public function getThumbAttribute()
    {
        return $this->photos->first()->image;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
