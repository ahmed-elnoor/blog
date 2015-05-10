    <h3> Categories </h3>
   
    <br />
   
   <!-- button add category -->
   
    {{ HTML::link('admin/cat/create','Add category',
    array('class'=>'btn btn-primary')) }} 
    
   <!-- button add sub category -->
    
    {{ HTML::link('admin/sub_cat/create','Add sub categories',
    array('class'=>'btn btn-info')) }} 
    
    <br /><br /><br />
    
    
    @if($cat == NULL)
    
    {{"no categories this time"}}
    
    @else


	<table class='table' >
    
	    <tr>

    <th>name</th>
    <th>type</th>
    <th>edit</th>
    <th>delete</th>

    	</tr>
 

	@foreach($cat as $category)
    
    <tr>
    <td style="font-size:18px; font-weight:600">{{$category->name}}</td>
   
        <td>
 
    
    <a 
    href="{{URL::to('/')}}">
    <img src={{asset('img/main.png')}}
     width="30px" 
     height="30px"  
     alt="edit"
     ></a>
    
    
    </td>
    
    <!--  edit image & link -->
    <td>
	<a 
    href="{{URL::to('admin/cat/'.$category->id.'/edit')}}">
    <img src={{asset('img/file_edit.png')}}
     width="30px" 
     height="30px"  
     alt="edit"
     ></a>
    
    </td>
    
    
    <!--  delete image & link -->
    <td>
{{ Form::open(
['action'=>['categoryController@destroy',$category->id],'method'=>'delete']) }}

{{Form::submit('Delete',array(
'class'=>'btn btn-danger',
'onClick'=>'return confirm("Are You sure.. Delete this category ")'

))}}
{{Form::close()}}


    </td>
        </tr>
   
       @foreach($category->sub_cat as $sub)
       
        <tr>
    <td style="font-size:14px;font-style:italic; font-weight:500; color:#666" >{{$sub->name_sub}}</td>
    
    <td>
    
   
    
    <a 
    href="{{URL::to('/')}}">
    <img src={{asset('img/sub5.png')}}
     width="30px" 
     height="30px"  
     alt="edit"
     ></a>
    
    
    </td>
    <td>
    
    <a 
    href="{{URL::to('admin/sub_cat/'.$sub->id.'/edit')}}">
    <img src={{asset('img/file_edit.png')}}
     width="30px" 
     height="30px"  
     alt="edit"
     ></a>
    
    </td>
    <td>
    
{{ Form::open(
['action'=>['subController@destroy',$sub->id],'method'=>'delete']) }}

{{Form::submit('Delete',array(
'class'=>'btn btn-danger',
'onClick'=>'return confirm("Are You sure.. Delete this sub category ")'

))}}
{{Form::close()}}

    
    </td>
        </tr>
        @endforeach
 
 
    
    
@endforeach
	</table>
	
    @endif


