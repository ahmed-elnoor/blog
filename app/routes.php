<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

	Route::get('/', function()
	
	
	
	{
	$cat  = Cat::all();
	$news = DB::table('news')->where('home', 'home')->get();
	return View::make('main_layout.main')
	->with('title','Ahmed blog')
	->with('news',$news)
	->with('cat',$cat)
	;
			

	
	
	
	});
	
	
	Route::get('cat/{name_cat}',function($name_cat){
	
	// Cat::find($id);
		
	  $ex         =  explode(' ',$name_cat);	
	  $name_cat   =  implode('-',$ex); 
      	
		$cat_row =	DB::table('cat')->where('name',$name_cat)->First();
	
		if($cat_row){

		$id = $cat_row->id;
		
		$category = Cat::all();
		$news = DB::table('news')->where('cid', $id)->get();
		$sub  = DB::table('sub_cat')->where('cid', $id)->get();		

		return View::make('main_layout.show_cat')
		
		->with('cat',$category)
		->with('sub',$sub)
		->with('news',$news)
		->with('title',$name_cat)
		->with('name_cat',$name_cat);
		
		}else{
				
				return Redirect::to('/');
				
				}
	

		
		
		
		});
	

	
	Route::get('cat/{name_cat}/{name_sub}',function($name_cat,$name_sub){
	
		
	  $ex         =  explode(' ',$name_cat);	
	  $name_cat   =  implode('-',$ex); 
	
	  $ex         =  explode(' ',$name_sub);	
	  $name_sub   =  implode('-',$ex); 
	  
	  
		// cat row 
	    $cat_row =	DB::table('cat')->where('name',$name_cat)->First();
	
		if($cat_row){
		
		// id about category
		$id = $cat_row->id;
		
		// all sub category 
		$sub  = DB::table('sub_cat')->where('cid', $id)->get();		
		
		
		// sub row 
		$sub_row = DB::table('sub_cat')->where('name_sub',$name_sub)->First();
		$id_sub  = $sub_row->id;
		//print_r($sub_row);		die();

		if(!empty($sub_row)){

		// all news in sub category 
		$news = DB::table('news')->where('sid', $id_sub)->get(); 
		
					
		}else {
			
		$news = '';	
			
		}




		$category = Cat::all();
		
		return View::make('main_layout.show_sub')
		// all category
		->with('cat',$category)
		// all sub 
		->with('sub',$sub)
		// news about sub 
		->with('news',$news)
		// title page 
		->with('title',$name_sub)
		// name category 
		->with('name_cat',$name_cat)
		// name sub 
		->with('name_sub',$name_sub)
		// sub row
		->with('sub_row',$sub_row);

		
		}else{
				
				return Redirect::to('/');
				
				}
	

		
		
		
		});
	


	Route::get('login',function(){
	
	return View::make('emails.auth.login')->with('title','login');
	
	
	});
	
	
	// route group before auth
	Route::group(array( 'before' => 'auth' ),
	function(){

	
	Route::get('admin/bootstrap',function(){
	
	return View::make('layout.main')->with('title','home page');
	
	});

	

	Route::resource('admin/sub_cat','subController');
		
	Route::resource('admin/cat','categoryController');
		
	Route::resource('admin/news','newscontroller');		
		
	}); // end of route group
	

	

	
	// login post
	Route::post('login',function(){
	
	$email    = Input::get('email');
	$password = Input::get('password');
	
	
	if(Auth::attempt
	(array('email' => $email , 'password' => $password))){
		
		return Redirect::to('admin/bootstrap');
		
	}else{
			
		return Redirect::to('login');
			
	}// End else
	});// End post login

	
	// log out
	Route::get('logout',function(){
	
	Auth::logout();
	
	return Redirect::to('login');


	});


	
	Route::get('/see_more/{id}',function($id){

	$news = DB::table('news')->where('home', 'home')->where('id', $id)->First();
	
    
	$cat  = Cat::all();
    
	$cat_name = 'Home Page';

	
	if($news){
	return View::make('main_layout.see_more')
	
	->with('news',$news)
    
	->with('cat',$cat)
    
	->with('title',$news->subject)
    
	->with('cat_name',$cat_name);
	}else {
		
		return Redirect::to('/');
		
		}
	});
	


	
	Route::get('/see_more/{name_cat}/{id}',function($name_cat,$id){
	
	// Cat::find($id);
			
		$cat_row =	DB::table('cat')->where('name',$name_cat)->First();
		
		if(!empty($cat_row))
		
		{
		
		$id_cat = $cat_row->id;
		$news = DB::table('news')->where('cid', $id_cat)->where('id', $id)->First();
		
		}
		
		if(!empty($cat_row) ||  !empty($news)){

		
		$category = Cat::all();


	

		$sub  = DB::table('sub_cat')->where('cid', $id_cat)->get();		

		return View::make('main_layout.see_more_cat')
		
		->with('cat',$category)
		->with('sub',$sub)
		->with('news',$news)
		
		->with('title',$name_cat)
		->with('name_cat',$name_cat);
		
		}else{
				
				return Redirect::to('/');
				
				}
	

		
		
		
		});
	
	
	
	Route::get('/see_more/{name_cat}/{name_sub}/{id}',function($name_cat,$name_sub,$id){
	
	// Cat::find($id);
			
		$cat_row =	DB::table('cat')->where('name',$name_cat)->First();
		
		if(!empty($cat_row))
		
		{
		
		$id_cat = $cat_row->id;
		
		$sub_row = DB::table('sub_cat')->where('name_sub',$name_sub)->First();
	
		
		if(!empty($sub_row))
		
		{
			
			$id_sub = $sub_row->id; 			
			$news   = DB::table('news')->where('sid',$id_sub)->where('id',$id)->First();
		//	print_r($news); die();
		if(!empty($news)){
				
		$category = Cat::all();
		$sub  = DB::table('sub_cat')->where('cid', $id_cat)->get();						
		
		return View::make('main_layout.see_more_sub')
		
		->with('cat',$category)
		->with('sub',$sub)
		->with('news',$news)
		->with('name_sub',$name_sub)
		->with('title',$name_cat)
		->with('name_cat',$name_cat);
		
				
				
				
					}// end if news
					else{ return Redirect::to('/'); }
			}// end if sub row 
			else{ return Redirect::to('/'); }
	}// end if cat row  
	else{ return Redirect::to('/'); }
		
		
		
	

		
		
		
		});



	// resources	
	Route::resource('users','userController');
	
