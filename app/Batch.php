<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
  	// 
  	protected $primaryKey = 'batid';
    protected $table = 'batchs';
    protected $fillable = ['batname',];   
}
