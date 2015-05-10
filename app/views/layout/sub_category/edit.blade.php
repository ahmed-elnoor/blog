	
    
    <h3>Edit Sub category </h3>
	<br />

	

  {{ Form::open(['action'=>array('subController@update',$sub->id),'method'=>'put' ]) }}
 
  <div class="form-group 
  @if($errors->has('name_sub')) has-error @endif">
  
  
    <label for="name">Sub Category Name</label>
    <input 
    name="name_sub" 
    type='text'
    value="{{ $sub->name_sub }}"
    class ="form-control" 
    id    ="name" 
    placeholder="Enter Sub Category Name">
    
  	@if($errors->has('name_sub'))<p class="help-block">
    {{ $errors->First('name_sub') }}</p>@endif

  </div>
  
 <div class="form-group
	@if($errors->has('description')) has-error @endif">
    
    <label for="description">Description</label>
    
    <textarea 
    class="form-control" 
    id="description" 
    name="description" 
    rows="4" 
    placeholder="Enter Description	"
    >{{ $sub->d_name_sub }}</textarea>
   @if($errors->has('description')) <p class="help-block"> 
   {{ $errors->first('description') }} </p>@endif
 	</div>
 
  	
    
 
  <div class="form-group 
  @if($errors->has('type')) has-error @endif">
  
  
    <label for="type">Category </label>
    <select 
    name="type" 
    
    value=""
    class ="form-control" 
    id    ="type" 
    
    >
   
    
    <option value=""> -- Select Category  </option>
	
    @if(isset($all))
    @foreach($all as $cat)
	
    <option value="{{ $cat->id }}" 
     
	 <?php 
   
   		if(($sub->cid)  == ($cat->id)) 
   
 	  echo " selected='selected' "; 
   
   
   ?>  >{{ $cat->name }}</option>	    
    
    @endforeach
    @endif
    
     
    </select>
  	@if($errors->has('type'))<p class="help-block">
    {{ $errors->First('type') }}</p>@endif


  </div>
  
  
  	
  
	<button type="submit" class="btn btn-primary">update</button>



  

	{{ Form::close()}}
    
    