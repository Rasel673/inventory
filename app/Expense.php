<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
     protected $fillable = [
        'details','amount','date','month','year'
    ];
}
