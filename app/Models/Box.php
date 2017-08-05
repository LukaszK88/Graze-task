<?php

namespace Graze\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public $table = self::TABLE;

    const   TABLE = 'box';

    const   COL_ACCOUNT_ID = 'account_id',
            COL_DELIVERY_DATE = 'delivery_date';

    const   TCOL_ACCOUNT_ID= self::TABLE .'.'. self::COL_ACCOUNT_ID;

    protected $fillable=[

    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function boxToProduct()
    {
        return $this->hasMany(BoxToProduct::class);
    }

    public function getBoxes($accountId)
    {
        return Box::
            with(['boxToProduct' => function ($query) use ($accountId){
            },'boxToProduct.product' => function($query) use ($accountId){
            },'boxToProduct.product.rating' => function($query) use ($accountId){
            $query->where('account_id', $accountId);
            }])
            ->where(self::TCOL_ACCOUNT_ID,$accountId)
            ->get();
    }

}