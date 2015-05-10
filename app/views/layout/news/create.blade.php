	
    
    <h3>New News</h3>
	<br />

	

  {{ Form::open(["action"=>"newscontroller@store",'files'=>'true' ]) }}



 <div class="form-group 
  @if($errors->has('category')) has-error @endif">
  
  
    <label for="category">Category </label>
    
    <select 
    name="category" 
    
    value ="{{ Input::old('category') }}"
    class ="form-control" 
    id    ="type" 
    
    >

    <option value=""> -- Select Category Type </option>
    <option value="home|home"> home bage </option>
	
    @if(isset($all))
    @foreach($all as $cat)
	

    <option  value="cat|{{ $cat->id }}">{{ $cat->name }}</option>

    @foreach($cat->sub_cat as $sub)

    <option  style="color: maroon" value="sub|{{ $sub->id }}">  {{ $sub->name_sub }} </option>

    @endforeach
    @endforeach
    @endif
    
     
    </select>
  	
    
    @if($errors->has('category'))<p class="help-block">
    {{ $errors->First('category') }}</p>@endif


  </div>

  <div class="form-group 
  @if($errors->has('subject')) has-error @endif">
  
  
    <label for="sub">Subject</label>
    <input 
    name="subject" 
    type='text'
    value="{{ Input::old('subject') }}"
    class="form-control" 
    id="sub" 
    placeholder="Enter subject">
    
  	@if($errors->has('subject'))<p class="help-block">
    {{ $errors->First('subject') }}</p>@endif

  </div>
  
  
  
  <!--  <div class="form-group 
    @if($errors->has('short_news')) has-error @endif">
    <label for="brief">Brief</label>
    <textarea 
    class="form-control" 
    id="details" 
    name="short_news" 
    rows="2" 
    placeholder="Enter Brief"
    >{{ Input::old('short_news') }}
    </textarea>
  	
    <p class="help-block">
  	@if($errors->has('short_news'))
    {{ $errors->first('short_news')}}	 
    @endif
  	</p>
  	</div> -->
  
	<div class="form-group
	@if($errors->has('long_news')) has-error @endif">
    
    <label for="details">Details</label>
    
    <textarea 
    class="form-control" 
    id="details" 
    name="long_news" 
    rows="4" 
    placeholder="Enter details"
    >{{ Input::old('long_news') }}</textarea>
   @if($errors->has('long_news')) <p class="help-block"> 
   {{ $errors->first('long_news') }} </p>@endif
 	</div>
 
 
  <div class="form-group
	@if($errors->has('file')) has-error @endif">
  
  
    <label for="file">file</label>
    <input 
    name="file" 
    type='file'
    value="{{ Input::old('long_news') }}"
    >
    @if($errors->has('file')) <p class="help-block"> 
   {{ $errors->first('file') }} </p>@endif
 	
   

  </div>  
  	
  
	<button type="submit" class="btn btn-primary">save</button>



  

	{{ Form::close()}}
    
    