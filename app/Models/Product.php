<?php

namespace Graze\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';

    const   COL_ID = 'id',
            COL_NAME = 'name',
            COL_CATEGORY = 'category',
            COL_IMAGE_URL = 'image_url';

    protected $fillable=[

    ];

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function boxToProduct()
    {
        return $this->hasMany(Rating::class);
    }
}