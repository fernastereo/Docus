<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class responses extends Model
{
    public function document(){
    	return $this->belongsTo(documents::class);
    }
}
