<h3>Edite News</h3>
<br />


{{ Form::open(['action' =>['newscontroller@update',$news->id],'method'=>'put','files'=>'true' ]

) }}


 <div class="form-group 
  @if($errors->has('category')) has-error @endif">
  
  
    <label for="category">Category </label>
    
    <select 
    name="category" 
    
    value="{{ Input::old('category') }}"
    class ="form-control" 
    id    ="type" 
    
    >
    
    <option value=""> -- Select Category Type </option>
    <option value="home|home" 
    
       <?php 
	   
	   if($news->home  == 'home')  
	   
	   echo " selected='selected' "; 
	   
	   ?>
    
    > home page </option>
	
    @if(isset($all))
   
    @foreach($all as $cat)
	

    <option  value="cat|{{ $cat->id }}" 
      
       <?php 
	   
	   if($news->cid  == $cat->id)  
	   
	   echo " selected='selected' "; 
	   
	   ?>
    
    
     >{{ $cat->name }}</option>

    @foreach($cat->sub_cat as $sub)

    <option  style="color: maroon" value="sub|{{ $sub->id }}"
 
      <?php 
   
   if(($news->sid)  == ($sub->id)) 
   
   echo " selected='selected' "; 
   
   
   ?>
    
     >  {{ $sub->name_sub }} </option>

    @endforeach
    @endforeach
    @endif
    
   
  
  
     
    </select>
  	
    
    @if($errors->has('category'))<p class="help-block">
    {{ $errors->First('category') }}</p>@endif


  </div>


 
  <div class="form-group">
    <label for="sub">Subject</label>
    <input name="subject" type='text' value="{{ $news->subject }}" name='sub' class="form-control" id="sub" placeholder="Enter subject">
  </div>
  
  
<div class="form-group">
    <label for="details">Details</label>
   <textarea class="form-control" id="details" name="long_news" rows="4" placeholder="Enter details">{{ $news->long_news }}</textarea>
  </div>
  

  
    @if($news->file !='')
	
    <div class="form-group">
    
    <img src='http://localhost/blog/public/{{ $news->file }}' width="140px" height="140px" class="img-polaroid"/>
    <br />

<a id="test" href="#"> change image</a>

<input id="test2" type="file" name="file" style="display:none;" />
    </div>
    @endif
 

 @if($news->file == '')
 <div class='form-group'>

  <label for='file'>file</label>
    <input 
    name='file' 
    type='file'
    
    >
    
  </div>  
  	
  
 @endif
   
  <div class='form-group'>
  <button type="submit" class="btn btn-primary">update</button>
  </div>

{{ Form::close()}}