<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use \Illuminate\Database\Eloquent\Relations;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function parentCategory(): Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();

    }

    public function childCategories(): Relations\HasMany
    {
        return $this->hasMany(Category::class, 'category_id');

    }


}
