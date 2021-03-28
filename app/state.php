<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    public function documents(){
        return $this->hasMany(Document::class);
    }
}
