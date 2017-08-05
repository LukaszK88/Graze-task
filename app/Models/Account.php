<?php

namespace Graze\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $table = 'account';

    const   COL_ID = 'id';

    protected $fillable=[

    ];

    public function box()
    {
        return $this->hasMany(Box::class);
    }

}