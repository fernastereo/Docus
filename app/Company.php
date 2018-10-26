<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = [
		'name', 'email', 'startdate', 'prefixcdocument', 'bucket', 'consecutive'
	];
	
    public function documents(){
    	return $this->hasMany(Document::class);
    }

    public function users(){
    	return $this->hasMany(User::class);
    }
}
