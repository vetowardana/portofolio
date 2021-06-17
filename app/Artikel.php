<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    protected $guarded = [];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
