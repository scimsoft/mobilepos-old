<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Product extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID';

    protected $keyType = 'string';

    public $incrementing = false;
    protected $fillable = [
        'name', 'display'
    ];

    //TODO default values
    protected $attributes = [

        'category' => '2bc90ba0-0c7a-4c7c-95eb-216fe9b4285e',
        'taxcat'=> '001'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->id = Str::uuid()->toString();
            $post->code = Str::uuid()->toString();

            $post -> reference = Str::uuid()->toString();
        });
    }
    public function scopeFilter($query, $params)
    {
        if ( isset($params['name']) && trim($params['name'] !== '') ) {
            $query->where('name', 'LIKE', trim($params['name']) . '%');
        }

        if ( isset($params['categoryid']) && trim($params['categoryid']) !== '' )
        {
            $query->where('category', '=', trim($params['categoryid']));
        }
        return $query;

    }

}