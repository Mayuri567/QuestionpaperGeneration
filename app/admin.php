<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $table='admins';
    protected $primaryKey='admin_id';
    protected $fillable=['firstname','lastname','email','password','image'];
    public $timestamps=false;
}
