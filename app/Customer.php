<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','email','phone','address','shopname','photo','account_holder','account_number','bank_name','branch_name','city'
    ];
}
