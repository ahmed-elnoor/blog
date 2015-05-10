<?php

class categoryController extends \BaseController {

		protected $layout = "layout.index";



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		
	
//$cat =DB::table('cat')->join('sub_cat','cat.id','=','sub_cat.cid')->get();
		
	

	$cat = Cat::with('sub_cat')->get();	
	//print_r($cat);die();
	$this->layout->title   = 'Add New Category';
	$this->layout->content = View::make('layout.category.index', compact('cat'));

	
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
		//$roles = DB::table('cat')->lists('name');
		//dd(DB::getQueryLog());
		$this->layout->title = 'create new category';
		$this->layout->content = View::make('layout.category.create')
		->with('all',$all);
				

		
		
		
		
		//return View::make('layout.category.create');
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
	
	'name'         => 'required|unique:cat'
	,'description' => 'required'
	
	);
	
	$validator = Validator::make(Input::all(),$rules);
	
	if($validator->fails())
	{
		
		$all = Cat::all();
		return Redirect::to('admin/cat/create')
	
		->withErrors($validator)
	
		->withInput()
	
		->with('all',$all);	
		
	}else{
		
		
		$cat              = new Cat;
		
		
		$name = Input::get('name');
		$ex   = explode(' ',$name);	
		$im   = implode('-',$ex);
		
		$cat->name        = $im;
		$cat->d_name      = Input::get('description');	
		
		// save
		$cat->save();
		
		// redirect
		
		return Redirect::to('admin/cat');
		
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

		$category = Cat::find($id);
		
		$this->layout->title = 'Edite category';
		$this->layout->content = View::make('layout.category.edit')
		
		->with('category',$category);

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
	
	'name'         => 'required|unique:cat,id,'.$id
	,'description' => 'required'
	
	);
	
	$validator = Validator::make(Input::all(),$rules);
	
	if($validator->fails())
	{
		

		return Redirect::to('admin/cat/'.$id.'/edit')
	
		->withErrors($validator)
	
		->withInput();
	
		
	}else{
		
		
		$cat       = Cat::find($id);
		
		$name_edit = Input::get('name');
		$ex_edit   =  explode(' ',$name_edit);	
		$im_edit   =  implode('-',$ex_edit);
		
		$cat->name      = $im_edit;
		$cat->d_name    = Input::get('description');	
		
		// save
		$cat->save();
		
		// redirect
		
		return Redirect::to('admin/cat');
		
	}//end else 
	
	


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
		
		$cat_delete = Cat::find($id)->delete();
		$news       = DB::table('news')->where('cid',$id)->delete();	
		return Redirect::to('admin/cat');

	}


}
