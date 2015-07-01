<?php namespace App; 

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
	protected $table = 'maker';
	protected $primaryKey = 'id';
	protected $fillable = ['name','phone'];
	protected $hidden = ['id','created_at','updated_at','maker_id'];

    public function vehicles(){
    	return $this->hasMany('App\Vehicle');
    }
}


?>