@extends('layout.index')



@section('content')

 
welcome {{ Auth::user()->name }}
<br />
This is home bage

@stop