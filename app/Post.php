<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Post extends Model implements AuditableContract
{
	use Auditable;
    //Table name
    protected $table = 'posts';
    //Primary Key
    Public $primaryKey ='id';
    
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
