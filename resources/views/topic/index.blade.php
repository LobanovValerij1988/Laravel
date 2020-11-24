@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')
<div class="row">
	<div class="col-sm-3 col-md-3 col-lg-3 pull-left">
 	
{!! Form::open(array('action'=>'TopicController@search','class'=>'form'))!!}
 	<div class="input – group"> 
 	{!! Form::text('searchform','', array('class'=>'form-control','placeholder'=>'Enter topic'))!!}
 	  <span class="input – group – btn"> 
 	   <button class="btn btn–success btn–secondary" type="submit">Search
 	   </button>
 	   </span>
 	    </div>
 	  {!! Form::close() !!}
 	<ul style="list-style-type:none">
 		@foreach($topics as $t)
 			<li>
				<a href="{{url('topic/'.$t->id)}}">{{$t->topicname}}</a>
 			</li>
  	@endforeach
 </ul>
 </div>
 <div class="col-sm-9 col-md-9 col-lg-9 pull-right">
 		@if($id != 0)
				@foreach($blocks as $b)
					<div>
						<div>
							<!-- Block's title -->
							<h2>{{$b->title}}</h2>
						</div>
						<!-- Check if an image exisis and show it if it exists -->
						@if($b->iPath !="")
							<a href="{{url($b->iPath)}}" style="float:left; margin-right:20px" target="_blank" class="wrap-image">
								<img src="{{asset($b->iPath)}}" height="150px"  alt=""/>
							</a>				
						@endif
						<!-- Check if a text content exisis and show it if it exists -->
						<div class="pre_text">{{$b->content}}</div>
							<!-- Form for Delete button -->
							{!! Form::open(array('route'=>array('block.destroy',$b->id))) !!}
								<!-- set HTTP method DELETE for the form -->
								{{ Form::hidden('_method','DELETE')}}
								<button class="btn btn-xs btn-danger  glyphicon glyphicon-remove" style="float:right" type="submit"></button>	
							{!! Form::close() !!}
							<!-- Form for Edit button -->
							{!! Form::model($b,array('route'=>array('block.update',$b->id))) !!}
								<!-- set HTTP method PUT for the form -->
								{{ Form::hidden('_method','PUT')}}

								<a class="btn btn-xs btn-info glyphicon glyphicon-pencil" style="float:right" href="{{url('block/'.$b->id.'/edit')}}"></a>
							{!! Form::close() !!}
						<br><br>
						
					</div>
				@endforeach
			@endif
 </div>
</div>
@endsection