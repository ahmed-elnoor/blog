<?php

class userController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		//
		$cat  = Cat::all();
		return View::make('users.create')
		->with('title','sign up')
		->with('cat',$cat);
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	 $rules = array(
		 
		 
		 'name'=>'required',
		 'email'=>'required|email|unique:users',
		 'password'=>'required',
		 'password_confirm'=>'required|same:password',
		 

    );
	
	$validator = Validator::make(Input::all(),$rules);
	
	
	if($validator->fails()){
		

       $messages = $validator->messages();
		
		return Redirect::to('users/create')
		->withErrors($validator)
		->withInput(Input::except('password','password_confirm'));
		
		
		
		
		}else{
		

		$user = new User;
		$user-> name     = Input::get('name');
		$user-> email    = Input::get('email');
		$user-> password = Hash::Make(Input::get('password'));
		
		$user->save();
		return "the information send successfuly";
		}//end else
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
