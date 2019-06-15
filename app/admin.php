<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'user';
    protected $primaryKey='u_id';
    public $timestamps = false;
}
