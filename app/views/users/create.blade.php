@extends('main_layout.index')

@section('content')

   

{{ Form::open(array('route'=>'users.store')) }}
	
<div style="
width:80%;
height:auto;
margin:2% auto;
">


                <h1 class="page-header">
                   Sign Up
                </h1>

 <div class="form-group 
 
 @if($errors->has('name')) 
 has-error 
 @endif
 
 ">
  
  
    <label for="name">Enter Name</label>
   
    <input 
    name="name" 
    type='text'
    value="{{ Input::old('name') }}"
    class="form-control" 
    id="sub" 
    placeholder="Enter name">
	
    
    @if($errors->has('name'))
    <p class="help-block">
    {{$errors->First('name')}}
    </p>    
  	@endif
  
  
  </div>
    
      <div class="form-group
      
      @if($errors->has('email'))
      has-error
      @endif
      
      ">
  
  
    <label for="email">Enter email</label>
   
    <input 
    name="email" 
    type='text'
    value="{{ Input::old('email') }}"
    class="form-control" 
    id="email" 
    placeholder="Enter email">
    
    @if($errors->has('email'))
    <p class="help-block">
    {{ $errors->First('email') }}
    </p>
	@endif
  </div>
    
    
    <div class="form-group 
    @if($errors->has('password')) has-error @endif
    ">
  
  
    <label for="password">Enter password</label>
   
    <input 
    name="password" 
    type='password'
    value="{{ Input::old('password') }}"
    class="form-control" 
    id="password" 
    placeholder="Enter password">
    @if($errors->has('password'))
	<p class="help-block">
    {{ $errors->first('password') }}
    </p>
    @endif
  </div>
    
    <div class="form-group

    @if($errors->has('password_confirm'))
    has-error
    @endif
    
    ">
  	
    <label for="password_confirm">confirm password</label>
   
    <input 
    name="password_confirm" 
    type='password'
    value="{{ Input::old('password_confirm') }}"
    class="form-control" 
    id="password_confirm" 
    placeholder="Confirm Password">
    @if($errors->has('password_confirm'))
	<p class="help-block">
    {{ $errors->First('password_confirm') }}
    </p>
    @endif
  </div>
    
    <input type="submit" class="btn btn-primary" value="save" />
    


{{ Form::close() }}
</div>
@stop