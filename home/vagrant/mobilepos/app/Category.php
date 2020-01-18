<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'ID';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'NAME', 'TEXTTIP','PARENTID','IMAGE'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->id = Str::uuid()->toString();
        });
    }



}
