<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
	protected $fillable = [
		'date',
        'comments',
        'codedocument',
        'document_id',
        'filename',
	];
	
    public function document(){
    	return $this->belongsTo(Document::class);
    }

    public function getFilenameAttribute($filename){
        if(!$filename || starts_with($filename, 'http')){
            return $filename;
        }

        return \Storage::url($filename);
    }
}
