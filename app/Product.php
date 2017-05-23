<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['description'];

    public function metaTexts()
    {
        return $this->hasOne(MetaPhoneText::class);
    }
}
