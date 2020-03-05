<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Cook extends Model
{
    use HasTranslations;
    public $translatable = ['text'];
}
