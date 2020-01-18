<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_cat extends Model
{
    //
    protected $table = 'products_cat';
    public $timestamps = false;
    protected $primaryKey = 'ID';

    protected $keyType = 'string';

    public $incrementing = false;
    protected $fillable = [
        'ID'
    ];
}
