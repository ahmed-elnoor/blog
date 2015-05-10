<?php

class Cat extends Eloquent{
	
	protected $table= "cat";
	



public function cat(){
		
		return $this->belongsTo('User');
					  
		}



public function sub_cat()
{
  return $this->hasMany('Sub','cid','id');
  
}


		


	}// end of class