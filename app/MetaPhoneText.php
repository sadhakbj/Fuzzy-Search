<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaPhoneText extends Model
{
    protected $table = 'metaPhoneText';

    protected $fillable = ['sound', 'product_id'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
