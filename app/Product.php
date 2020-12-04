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
        $slug = Str::slug($value);
        $matchs = $this->uniqueSlug($slug);

        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $matchs ? $slug . '-' . $matchs : $slug;
    }

    public function uniqueSlug($slug)
    {
        $matchs = $this->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->count();

        return $matchs;
    }

    /**
     * Relations
     */

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
