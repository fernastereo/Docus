<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typedocument extends Model
{
    public function documents(){
    	return $this->hasMany(Document::class);
    }
}
