<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    //Table Name
    Protected $table = 'cars';
    //Primary Key
    public $PrimaryKey = 'id';
    //TimeStamps
    public $timestamps = true;

}
