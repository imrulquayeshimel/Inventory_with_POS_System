<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = [
        'emp_id', 'att_date','month', 'att_year','attendence','edit_date',
    ];
}
