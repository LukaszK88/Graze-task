<?php

namespace Graze\Models;

use Illuminate\Database\Eloquent\Model;

class BoxToProduct extends Model
{
    public $table = 'box_to_product';

    const   COL_PRODUCT_ID = 'product_id',
            COL_BOX_ID = 'box_id';

    protected $fillable=[

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function box()
    {
        return $this->belongsTo(Product::class);
    }
}