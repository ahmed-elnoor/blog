<?php

class News extends Eloquent{
	
	protected $table= "news";
	
	public function news(){
		
		
		return $this->belongsTo('User');

		}
	}