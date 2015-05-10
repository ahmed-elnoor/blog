<?php

class Sub extends Eloquent{


	

	protected $table= "sub_cat";
	

		public function categories(){
		
		return $this->belongsTo('Cat');
					  
		}

	}