<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = [
        'id', 'name', 'picture', 'job_title', 'email','linkedin','cv', 'job_desc'
    ];

}
