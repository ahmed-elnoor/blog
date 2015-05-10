<?php

class newsController extends \BaseController {

	protected $layout = "layout.index";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */




	public function index(){
		
		//
		$news = News::all();
		$this->layout->title = 'news';
		$this->layout->content = View::make('layout.news')->
		with('news',$news);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function create(){
		
		//
        $all = Cat::with('sub_cat')->get();

		$this->layout->title = 'create new news';
		$this->layout->content = View::make('layout.news.create')
		->with('all',$all);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store(){
		
		
		
	if(Input::hasFile('file')){
			
		//validate
		$validator = Validator::make(Input::all(),
		array(
		
		'subject' => 'required',
		'long_news' => 'required',
		'category' => 'required',
		'file' =>'image'
		
	));
		
	
	
	
	
	}else {
			
			
	//validate
	$validator = Validator::make(Input::all(),
			
	array(
		
		'category'  => 'required',
		'subject'   => 'required',
		'long_news' => 'required'
		
	));
			
	}// end else
		
		
	if($validator->fails()){
	
			
		return Redirect::to('admin/news/create')->withErrors
		($validator)->withInput();
			
	} else {

			$news = new News;			
				
			if(Input::hasFile('file')){
		
			$dest = 'images/';
			$name = str_random(5).'_'. 
			Input::file('file')->getClientOriginalExtension();
				
			Input::file('file')->move($dest,$name);
			
			$news->file = $dest.$name;
			

			}// end if



            $check = explode('|',Input::get('category'));

            if($check[0]== 'cat'){

                $cid = $check[1];
                $sid = 0 ;
				$home = 0;

            }elseif($check[0]== 'sub'){

                $sid = $check[1];
                $cid = 0 ;
				$home= 0 ;

            }else{
				
				$sid = 0;	
				$cid = 0;
				$home = 'home';
				
			}

			$news->subject    = Input::get('subject');	
			$news->long_news  = Input::get('long_news');

			$news->cid        = $cid;
            $news->sid        = $sid;
			$news->home       = $home;
            $news->author     = Auth::user()->name;
            $news->author_id  = Auth::user()->id;

			$news->save();
			return Redirect::to('admin/news');
				
		}// end else
	}// end function store


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
	 
	public function edit($id){
		
 		$all  = Cat::with('sub_cat')->get();
		$news = News::find($id);
		$this->layout->title = " edit news ";
		$this->layout->content = View::make('layout.news.edit')
		->with('news',$news)
		->with('all',$all);
	
	}// end edit


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function update($id){
	
		
	if(Input::hasFile('file')){
			
	//validate
	$validator = Validator::make(Input::all(),
	
	array(
	
		'category'  => 'required',		
		'subject'   => 'required',
		'long_news' => 'required',
		'file'      => 'image'
	
	));
		
	
	
	}else {
			
			
	//validate
	$validator = Validator::make(Input::all(),
		
	array(
	
	'subject'   => 'required',
	'long_news' => 'required',
		
	));
	
	}// end else
		
		
	
		
		if($validator->fails()){
			
		return Redirect::to('admin/news/'.$id.'/edit')->withErrors
		($validator)->withInput();
			
			} else {
				
						
		$news = News::find($id);

		if(Input::hasFile('file')){
				
			$dest = 'images/';
			$name = str_random(5).'_'. 
			Input::file('file')->getClientOriginalName();
			Input::file('file')->move($dest,$name);
			$news->file = $dest.$name;

		}

        $check = explode('|',Input::get('category'));
            if($check[0]== 'cat'){

                $cid = $check[1];
                $sid = 0 ;
				$home = 0;

            }elseif($check[0]== 'sub'){

                $sid = $check[1];
                $cid = 0 ;
				$home= 0 ;

            }else{
				
				$sid = 0;	
				$cid = 0;
				$home = 'home';
				
			}

			$news->subject    = Input::get('subject');	
			$news->long_news  = Input::get('long_news');

			$news->cid        = $cid;
            $news->sid        = $sid;
			$news->home       = $home;
			
            $news->author     = Auth::user()->name;
            $news->author_id  = Auth::user()->id;

			$news->save();
			return Redirect::to('admin/news');
				
		}// end else

	}// end update

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
	
				$news = News::find($id)->delete();
				return Redirect::to('admin/news');
	}


		


} // end class container
