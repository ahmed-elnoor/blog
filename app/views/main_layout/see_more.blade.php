
@extends('main_layout.index')

@section('content')

       <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

        <ul class="breadcrumb">
          <li><a href="{{ URL::to('/') }}">Home</a> <span class="divider">/</span></li>
                   {{ $news->subject }}
           
           </ul>


                <h1 class="page-header">
                {{ $cat_name }}
                    <small></small>
                </h1>


    
                <!-- start post -->
                <h2>
                    <a href="#">
                    <!-- subject here -->
                   {{ $news->subject }}
                    </a>
                </h2>
                <p class="lead">
                <!-- author  -->
                 

                    by <a href="index.php">{{ $news->author }}</a>
                </p>
                
                
                
                
                @if(($news->file) == '')
                @else
                <hr>
                <img width="900px"
                height="300" class="img-responsive" src="http://localhost/blog/public/{{ $news->file }}"
                
                 >
                <hr>
                <p>
                @endif
                
                
                <!-- long_text  -->
			{{ $news->long_news }}
                </p>

				<p>
                {{ HTML::link('/','Back to home page ',
array('class'=>'btn btn-primary')) }}
                </p>
                <!-- end news  -->

           <!-- Pager -->
      <!--          <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>-->

            </div>


            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <!--<div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
               <!-- </div>-->



                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">

                        <!-- /.col-lg-6 -->
                    @if($cat->isEmpty()){

                     @else


                        <div class="col-lg-6">


                            <ul class="list-unstyled">

                         @foreach($cat as $category)
                                <li>
							<?php 
			  
		$ex   =  explode(' ',$category->name);	
		$im   = implode('-',$ex);
			  
			  					?>

                    <a href="{{ URL::to('cat/'.$im) }}">
                                {{ $category -> name}}
                                </a>
                                </li>
                         @endforeach
                            </ul>

                        </div>
                        <!-- /.col-lg-6 -->

                    @endif



                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>




@stop
