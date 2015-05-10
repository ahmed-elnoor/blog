	
    
    <h3>New category </h3>
	<br />

	

  {{ Form::open(["action"=>"categoryController@store" ]) }}
 
  <div class="form-group 
  @if($errors->has('name')) has-error @endif">
  
  
    <label for="name">Category Name</label>
    <input 
    name="name" 
    type='text'
    value="{{ Input::old('name') }}"
    class ="form-control" 
    id    ="name" 
    placeholder="Enter Category Name">
    
  	@if($errors->has('name'))<p class="help-block">
    {{ $errors->First('name') }}</p>@endif

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
    >{{ Input::old('description') }}</textarea>
   @if($errors->has('description')) <p class="help-block"> 
   {{ $errors->first('description') }} </p>@endif
 	</div>
 
  	
  
	<button type="submit" class="btn btn-primary">save</button>



  

	{{ Form::close()}}
    
    