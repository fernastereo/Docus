<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function documents(){
    	return $this->hasMany(documents::class);
    }
}
