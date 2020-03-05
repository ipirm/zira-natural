<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Cat extends Model
{
    use HasTranslations;
    public $translatable = ['title'];
    public function product()
    {
        return  $this->hasMany('App\Product','cat_name');
    }
}
