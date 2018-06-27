<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function documents(){
    	return $this->hasMany(Document::class);
    }
}
