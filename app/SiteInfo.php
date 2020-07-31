<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    //

    protected $fillable = [ 'phone' , 'email', 'facebook', 'twitter', 'linkedin', 'about'];
}
