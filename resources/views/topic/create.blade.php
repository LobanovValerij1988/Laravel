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
  {!! Form::model($topic, array('action'=>'TopicController@store')) !!}
  <div class='form-group'>
 		{!! Form::label('topicname','Topic name')!!}
		{!! Form::text('topicname', '', array('class'=>'form-control'))!!}
  </div>
  <button class="btn btn-success" type="submit">Add Topic</button>
  {!! Form::close() !!}
</div>
@endsection