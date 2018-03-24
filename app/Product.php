<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function firm(){
        return $this->belongsTo('\App\Firm');
    }

    public function category(){
        return $this->belongsTo('\App\Category');
    }
}
