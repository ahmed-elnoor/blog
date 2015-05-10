	
    
    <h3>Edit category </h3>
	<br />

	

  {{ Form::open(["action" => array("categoryController@update",$category->id),'method'=>'put' ]) }}
 
  <div class="form-group 
  @if($errors->has('name')) has-error @endif">
  
  
    <label for="name">Category Name</label>
    
    <input 
    name="name" 
    type='text'
    value="{{ $category->name }}"
    class ="form-control" 
    id    ="name" 
    placeholder="Enter Category Name">
    
  	@if($errors->has('name'))<p class="help-block">
    {{ $errors->First('name') }}</p>@endif

  </div>
  
  
  <div class="form-group
	@if($errors->has('long_news')) has-error @endif">
    
    <label for="description">Description</label>
    
    <textarea 
    class="form-control" 
    id="description" 
    name="description" 
    rows="4" 
    placeholder="Enter Description	"
    >{{ $category->d_name }}</textarea>
   @if($errors->has('description')) <p class="help-block"> 
   {{ $errors->first('description') }} </p>@endif
 	</div>
 
  	
  
	<button type="submit" class="btn btn-primary">update</button>



  

	{{ Form::close()}}
    
    