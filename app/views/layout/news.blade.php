
<h3> News </h3>

<h3>{{ HTML::link('admin/news/create','create news',
array('class'=>'btn btn-info')) }} </h3>
<br />

@if($news->isEmpty())

{{"no news this time"}}

@else


<table class='table' cellspacing='20%'>
<tr>
<th>subject</th>
<th>edit</th>
<th>delete</th>
</tr>

@foreach($news as $post)

<tr>

<td>{{ $post->subject }}</td>
<td>
<a
 href="{{URL::to('admin/news/'.$post->id.'/edit')}}">
    <img src={{asset('img/file_edit.png')}}
     width="30px" 
     height="30px"  
     alt="edit"
     ></a>
    
</td>
<td>
{{ Form::open(
['action'=>['newscontroller@destroy',$post->id],'method'=>'delete']) }}

{{Form::submit('Delete',array(
'class'=>'btn btn-danger',
'onClick'=>'return confirm("Are You sure.. Delete this news ")'

))}}
{{Form::close()}}
</td>
</tr>

@endforeach

</table>

@endif