<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $fillable = [
    	'typedocument_id',
    	'daterec',
    	'datedocument',
    	'codedocument',
    	'sender',
    	'subject',
    	'pages',
    	'project',
    	'category_id',
    	'comments',
    	'userrec_id',
    	'userenc_id',
    	'state_id',
    	'filename',
    ];

    public function typeDocument(){
    	return $this->belongsTo(typedocument::class);
    }

    public function category(){
    	return $this->belongsTo(category::class);
    }

    public function userRec(){
    	return $this->belongsTo(User::class);
    }

    public function userEnc(){
    	return $this->belongsTo(User::class);
    }

    public function state(){
    	return $this->belongsTo(state::class);
    }

    public function responses(){
    	return $this->hasMany(responses::class);
    }
}
