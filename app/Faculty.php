<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    //
    protected $primaryKey = 'facid';
    protected $table = 'facultys';
    protected $fillable = ['facname',];
}
