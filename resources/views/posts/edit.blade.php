@extends('main')

@section('title', '|Edit Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection


@section('content')

<div class="row">
{!! Form::model($post, ['route' => ['post.update' , $post->id], 'method'=> 'PUT' ]) !!}
<div class="col-sm-8">
		{{Form::label('title','Title:')}}
		{{Form::text('title', null ,['class'=>'form-control input-lg'])}}

		{{Form::label('slug', 'URL Slug',['class'=> 'form-spacing-top'])}}
		{{Form::text('slug',null,['class' =>'form-control'])}}

		{{Form::label('body','Body:', ['class'=>'form-spacing-top'])}}
		{{Form::textarea('body', null, ['class'=>'form-control'])}}
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ date('M j, Y h:ia',strtotime($post->created_at))}}<dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Last Updated:</dt>
				<dd>{{date('M j, Y h:ia',strtotime($post->updated_at)) }}<dd>
				</dl>
				<hr />
				<div class="row">
			
				<div class="col-sm-6">
				


				{!! Html::LinkRoute('post.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block') ) !!}
				
				</div>
				<div class="col-sm-6">
				{{ Form::submit( 'Save Changes',  array('class'=>'btn btn-success btn-block') ) }}

				</div>
				</div>
			</div>
		</div>
		{!!Form::close()!!}
		</div><!-- end .row(form)-->


@endsection

@section('scripts')
{!! Html::script('js/parsely.min.js')!!}
@endsection