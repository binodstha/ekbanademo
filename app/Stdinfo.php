<?php

namespace App;

class Stdinfo extends BaseModel {
    protected $primaryKey = 'stdid';
    protected $table = 'stdinfos';
    protected $fillable = ['stdname', 'stdbatch', 'stdemail', 'stdfaculty',];
}