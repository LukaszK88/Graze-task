<?php

namespace Graze\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = 'rating';

    const   COL_PRODUCT_ID = 'product_id',
            COL_ACCOUNT_ID = 'account_id',
            COL_RATING = 'rating';

    protected $fillable=[
        self::COL_PRODUCT_ID,
        self::COL_ACCOUNT_ID,
        self::COL_RATING
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}