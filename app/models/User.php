<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	    
	/**
	 * The database table used by the model.
	 *
	 * @var string


	 */
    protected $fillable = array('name', 'email', 'password');
	
	protected $table = 'users';

	

	
	public function News(){
	
	
	return $this->hasOne('news');
	
	
	}

	public function cat(){
	
	return $this->hasOne('cat');
	
	}








/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
