<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fileUploadModel extends Model
{
    //
	protected  $table = "files";
	protected $fillable = ['filename', 'size', 'owner', 'owner_id', 'file_type',];

	public function user(){
		return $this->belongsTo('App\User','id','owner_id');
	}
}
