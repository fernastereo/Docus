<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Typedocument;
class Document extends Model
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
    	'user_id',
    	'state_id',
    	'filename',
        'company_id',
        'consecutive'
    ];

    public function typedocument(){
    	return $this->belongsTo(Typedocument::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function state(){
    	return $this->belongsTo(State::class);
    }

    public function responses(){
    	return $this->hasMany(Response::class);
    }

    public function reception(){
        return $this->hasOne(Reception::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

/*    public function getFilenameAttribute($filename){
        if(!$filename || starts_with($filename, 'http')){
            return $filename;
        }

        return \Storage::url($filename);
    }*/

    public function userenc($id){
        $user = User::select('name')->where('id', $id)->first();
        if($user){
            return $user->{'name'};
        }
        return '';
    }
}
