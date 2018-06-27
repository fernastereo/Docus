<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
	protected $fillable = [
		'document_id',
		'user_id',
	];

    public function document(){
    	return $this->belongsTo(Document::class);
    }
}
