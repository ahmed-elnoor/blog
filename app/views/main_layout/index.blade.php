<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

{{  HTML::style('css/bootstrap/css/bootstrap.min.css')}}
{{  HTML::style('css/bootstrap/css/blog-home.css')}}
{{  HTML::style('css/bootstrap/css/bootstrap.css')}}



<title>

@if (empty($title)) untitled  
@else {{$title }}
@endif

</title>

</head>

<body>

@include('main_layout.includes.header')

@yield('content')

@include('main_layout.includes.footer')

</body>
</html>