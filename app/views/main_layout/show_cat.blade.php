
@extends('main_layout.index')
@section('content')

  <div class="row">
  
  <!-- Blog Entries Column -->
  
   <div class="col-md-8">
	
     <ul class="breadcrumb">
 <li><a href="{{ URL::to('/') }}">Home</a> <span class="divider"></li>
<li>{{ $name_cat }} </li>
           </ul>

  <h1 class="page-header">

<?php $ex   =  explode(' ',$name_cat);	
	  $im   = implode('-',$ex); ?>

   <a href="{{ URL::to('/cat/'.$im) }}"></a>
      	{{ $title}}
   		 <small></small>
  
  </h1> 


	@if(!empty($news))
    @foreach($news as $post)

	<!-- start post -->
    
    <!-- subject  -->
	
    	<h2> <a href="#"> {{ $post->subject }} </a> </h2>
                
     <!-- author  -->
     
     	<p class="lead">
       
       		by <a href="index.php">{{ $post->author }}</a>
        </p>
      
        <p><span class="glyphicon glyphicon-time"></span> </p>
                
                
      <!-- image -->          
                
     @if(($post->file) == '')
     @else
     
     <hr>
     
    <img 
    
    width  = "900px"
    height = "300" 
    class  = "img-responsive" 
    src    = "http://localhost/blog/public/{{ $post->file }}" 
    
    >
    <hr>
    
    @endif
                
                
                
  <!-- long_text  -->
	
     <p>
        
      {{ substr($post->long_news, 0, 250). '...' }}

    </p>
   
                
    <a 
    class = "btn btn-primary"
    href  = "{{ URL::to('/see_more/'.$name_cat.'/'.$post->id)}} " 
    id    = "$id"
    >
    
    Read More 
   
    <span class="glyphicon glyphicon-chevron-right"></span>
    </a>

    <hr>
    
	<!-- end news  -->
    
    @endforeach
    @else
	

    <div class="alert alert-info">
      <h3>No Article Till Now</h3>
    </div>    

    @endif
    
    <!-- Pager -->
    <!-- <ul class="pager">
     
       <li class="previous"> <a href="#">&larr; Older </a> </li>
       <li class="next"> <a href="#">Newer &rarr;     </a> </li>
     
     </ul>
	-->
     </div> <!-- End div col-md-8  -->


<!-- --------------------------------------------------------------------------------->

    <!-- Blog Sidebar Widgets Column -->
    
    <div class="col-md-4">

    
      <!--  Search  -->
      
      <div class="well">
      
       <h4>Blog Search</h4>
       
       <div class="input-group">
       
      <input type="text" class="form-control">
      
       <span class="input-group-btn">
      
      <button class="btn btn-default" type="button">
       <span class="glyphicon glyphicon-search"></span>
      </button>
      
      </span>
      </div><!-- End input-group -->
      </div><!-- End well -->


      <!--  Categories -->
      <div class="well">

        <h4>Blog Categories</h4>
        <div class="row">
     <!-- /.col-lg-6 -->

   @if($cat)

   <div class="col-lg-6">

   <ul class="list-unstyled">
                               
      @foreach($cat as $category) 
      
      <?php $ex   =  explode(' ',$category -> name);	
	  $im   = implode('-',$ex); ?>
     
      <li> <a href="{{ URL::to('/cat/'.$im) }}">  {{ $category -> name}} </a> </li>
      
      @endforeach
      
  </ul>
                            
 </div><!-- /.col-lg-6 -->
                        
  @endif

 </div>
 <!-- /.row -->
 </div>
 <!-- Blog Categories Well -->

   <div class="well">

   <h4>Sub Categories</h4>

   <div class="row">
                       
   <!-- /.col-lg-6 -->
   @if($sub)

  <div class="col-lg-6">

  <ul class="list-unstyled">
                               
    @foreach($sub as $sub_category) 


<?php $ex   =  explode(' ',$sub_category->name_sub);	
	  $im   = implode('-',$ex); ?>
      
      
  <li> <a href="{{ URL::to('/cat/'.$name_cat.'/'.$im)}}"> {{ $sub_category -> name_sub}} </a> </li>
 
    @endforeach

	 </ul>

 	</div>
 	<!-- /.col-lg-6 -->

  @else
  @endif

 </div>
 <!-- /.row -->
 </div>

 <!-- Side Widget Well -->
 <div class="well">
 
   <h4>Side Widget Well</h4>
 
         <p>
         
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.
        
        </p>
       </div>
       </div>
    
    
       </div><!-- /.row -->
    
       <hr>
    
    @stop
