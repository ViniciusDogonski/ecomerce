<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    use HasFactory;

    public function user(){
        return $this->beleongsTo('App\Models\User');
    }

    public function product(){
        return $this->beleongsTo('App\Models\Product');
    }
}
