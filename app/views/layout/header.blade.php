
    <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('admin/bootstrap') }}">Ahmed bolg</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

<li class="active"><a href="{{ URL::to('admin/bootstrap') }}">Home</a></li>



                    
              <li>
              <a href="{{ URL::to('admin/news') }}">News</a>
               </li>


              <li>
              <a href="{{ URL::to('admin/cat') }}">categories</a>
               </li>



              <li>
              <a href="{{ URL::to('/') }}" target="_blank">website</a>
               </li>


      <li  class='logout'>
      <a href="{{  URL::to('logout') }}">Log out</a>
        
         </li>           
        </ul>
      </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="container">
















<?php /*
<div class="container">
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="{{ URL::to('admin/bootstrap') }}">Ahmed blog</a>
    <ul class="nav">
      <li class="active"><a href="{{ URL::to('admin/bootstrap') }}">Home</a></li>
      <li><a href="{{ URL::to('admin/news') }}">News</a></li>
      <li  class='logout'><a href="{{  URL::to('logout') }}">Log out</a></li>
    </ul>
  </div>
</div>

*/?>