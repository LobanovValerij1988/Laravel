
@extends('layouts.app')

@section('title', 'Page Title')
@section('menu')
		@parent
@endsection
@section('content')
 <div class="row">
 <div class="label label-info" style="display:inline-block; width:100%;">{{$page}}</div>
 </div>
 <div class="row">
  	@if ($errors->any())
    	<div class="alert alert-danger">
       	<ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    	</div>
    @endif
    @if(session('message'))
			<div class="alert alert-success" > 
				{{session('message')}}
			</div>
		@endif
{!! Form::model($block, ['action'=>'BlockController@store','files'=>true]) !!}
  <div class='form-group'>
 		{!! Form::label('topicid','Select topic',['class'=>'col-sm-2  col-md-2 col-lg-2'  ])!!}
		
		{!! Form::select('topicid', $topics,'',['class'=>'col-sm-8 col-md-8 col-lg-8'])!!}
	  <a href="{{url('topic/create')}}" class='btn  btn-info col-sm-2 col-md-2 col-lg-2' type='submit'  >Add new topic</a>
  </div>
  <div class='form-group'>
  {!! Form::label('title','Block title',['class'=>'col-sm-2  col-md-2 col-lg-2'  ])!!}
  {!! Form::text('title', '', ['class'=>'col-sm-10 col-md-10 col-lg-10'] )!!}
  
 </div>
  <div class='form-group'>
  {!! Form::label('content','Add content',['class'=>'col-sm-2 col-md-2 col-lg-2'])!!}
  {!! Form::textarea('content', '', ['class'=>'col-sm-10 col-md-10 col-lg-10'] )!!}
  </div>
  <div class='form-group'>
  {!! Form::label('iPath','Add image',['class'=>'col-sm-2 col-md-2 col-lg-2'])!!}
  {!! Form::file('iPath',null,['class'=>'col-sm-10 col-md-10 col-lg-10'])!!}
  </div>
  <button class="btn btn-success" type="submit">Add Block</button>
  {!! Form::close() !!}

</div>
@endsection
