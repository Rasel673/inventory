<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     protected $fillable = [
        'emp_id','att_date','month','att_year','attendance','edit_date',
    ];
}
