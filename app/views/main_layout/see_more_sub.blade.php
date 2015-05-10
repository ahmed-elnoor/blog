
@extends('main_layout.index')
@section('content')

  <div class="row">
  
  <!-- Blog Entries Column -->
  
   <div class="col-md-8">
	
     <ul class="breadcrumb">
 <li><a href="{{ URL::to('/') }}">Home</a> <span class="divider"></li>


<li>
<?php $ex   =  explode(' ',$name_cat);	
	  $im   = implode('-',$ex);
	  
	  $ex_s   =  explode(' ',$name_sub);	
	  $im_s   = implode('-',$ex_s);
		
?>


<a href="{{ URL::to('/cat/'.$im) }}">{{ $name_cat }}</a> <span class="divider"> </li>

<li>
<a href="{{ URL::to('/cat/'.$im.'/'.$im_s) }}">{{ $name_sub }}</a> <span class="divider"> </li>
<li>{{ $news->subject }}</li> 





           </ul>
<!--
  <h1 class="page-header">
  
   <a href="{{ URL::to('/cat/'.$name_cat) }}"></a>
      	{{ $title}}
   		 <small></small>
  
  </h1> 
-->
	@if(!empty($news))
    

	<!-- start post -->
    
    <!-- subject  -->
	
    	<h2> <a href="#"> {{ $news->subject }} </a> </h2>
                

     <!-- author  -->
     
     	<p class="lead">
       
       		by <a href="">{{ $news->author }}</a>
        </p>
      
        <p><span class="glyphicon glyphicon-time"></span> </p>
                
                
      <!-- image -->          
                
     @if(($news->file) == '')
     @else
     
     <hr>
     
    <img 
    
    width  = "900px"
    height = "300" 
    class  = "img-responsive" 
    src    = "http://localhost/blog/public/{{ $news->file }}" 
    
    >
    <hr>
    
    @endif
                
                
                
  <!-- long_text  -->
	
     <p>
        
      {{ $news->long_news }}

    </p>
   
                
    <hr>
    
	<!-- end news  -->
    
    @else
	

    <div class="alert alert-info">
      <h3>No Article Till Now</h3>
    </div>    


    @endif
<?php $ex_1   =  explode(' ',$name_cat);	
	  $im_1   = implode('-',$ex_1);
?>


				<p>
                {{ HTML::link('/cat/'.$im.'/'.$im_s,'Back to '.$name_sub.'  page ',
array('class'=>'btn btn-primary')) }}
                </p>
    
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
      
      <?php 
	  
	  $ex_2   =  explode(' ',$category -> name);	
	  $im_2   = implode('-',$ex_2);
		
	?>

     
      <li> <a href="{{ URL::to('/cat/'.$im_2) }}">  {{ $category -> name}} </a> </li>
      
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


      <?php 
	  
	  $ex_3   =  explode(' ',$name_cat);	
	  $im_3   = implode('-',$ex_3);

	  
	  $ex_4   =  explode(' ',$sub_category->name_sub);	
	  $im_4   = implode('-',$ex_4);
		
	?>
		

  <li> <a href="{{ URL::to('/cat/'.$im_3.'/'.$im_4)}}"> {{ $sub_category -> name_sub}} </a> </li>
 
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
