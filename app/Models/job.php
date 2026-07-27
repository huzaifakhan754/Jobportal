<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $fillable = ['title','desc','desig','location','job_time','Company','Salary','user_id','type_id'];
}
