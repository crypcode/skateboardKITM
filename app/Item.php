<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'description', 'price', 'quantity', 'cat_id', 'img', 'userID'];
}
