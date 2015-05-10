<?php

class subController extends \BaseController {


	protected $layout = "layout.index";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return 'This is index sub';
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	$all = Cat::all();		
	$this->layout->title = 'new sub category';
	$this->layout->content = View::make('layout.sub_category.create')
	->with('all',$all);

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
	
	'name_sub'     => 'required|unique:sub_cat'
	,'description' => 'required'
	,'type'        => 'required'
	
	);
	
	$validator = Validator::make(Input::all(),$rules);
	
	if($validator->fails())
	{
		
		$all = Cat::all();
		return Redirect::to('admin/sub_cat/create')
	
		->withErrors($validator)
	
		->withInput()
	
		->with('all',$all);	
		
	}else{
		
		
		$cat               = new Sub;
    	
		$name = Input::get('name_sub');
		$ex   =  explode(' ',$name);	
		$im   = implode('-',$ex);
		
	
		$cat->name_sub     = $im;
		$cat->d_name_sub   = Input::get('description');	
		$cat->cid          = Input::get('type');
		// save
		$cat->save();
		
		// redirect
		
		return Redirect::to('admin/cat');
		
	}//end else 
	
	
	}// end store function


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
		$sub = Sub::find($id);
		$all = Cat::all();
		$this->layout->title = 'edit sub category ';
		$this->layout->content = View::make('layout.sub_category.edit')
		->with('sub',$sub)->with('all',$all);
		
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
				
	$rules = array(
	
	'name_sub'     => 'required|unique:sub_cat,id,'.$id
	,'description' => 'required'
	,'type'        => 'required'
	
	);
	
	$validator = Validator::make(Input::all(),$rules);
	
	if($validator->fails())
	{
		
		$all = Cat::all();
		return Redirect::to('admin/sub_cat/'.$id.'/edit')
	
		->withErrors($validator)
	
		->withInput()
	
		->with('all',$all);	
		
	}else{
		
		
		$cat               = Sub::find($id);
		
		$name_edit = Input::get('name_sub');
		$ex_edit   =  explode(' ',$name_edit);	
		$im_edit   = implode('-',$ex_edit);
		
		$cat->name_sub     = $im_edit;
		$cat->d_name_sub   = Input::get('description');	
		$cat->cid          = Input::get('type');
		// save
		$cat->save();
		
		// redirect
		
		return Redirect::to('admin/cat');
		
	}//end else 

	}// end update function


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$sub_delete = Sub::find($id)->delete();
		$news       = DB::table('news')->where('sid',$id)->delete();	
		return Redirect::to('admin/cat');
	}


}
