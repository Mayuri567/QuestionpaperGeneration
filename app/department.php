<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
    protected $table="departments";
    protected $fillable=['department_name','city','admin_id','university_id'];

}
