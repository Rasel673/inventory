<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = [
        'name','email','phone','address','shopname','photo','account_holder','type','account_number','bank_name','branch_name','city'
    ];
}
