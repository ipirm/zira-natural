<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements Searchable
{
    use HasTranslations;
    public $translatable = ['title', 'subtitle', 'composition'];

    public function cat()
    {
        return $this->belongsTo(Cat::class, 'cat_name');
    }

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $this->cat_name,
            $this->text,
            $this->slug,
            $this->subtitle,
            $this->composition,
            $this->price,
            $this->add_shop,
            $this->add_catalog,
            $this->main_image,
            $this->product_images
        );
    }
}
