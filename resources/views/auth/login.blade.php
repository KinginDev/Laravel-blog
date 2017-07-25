@extends('main')

@section('title', '| Login Page')

@section('content')
	
	<div class="row">
	<div class="col-md-6 col-md-offset-3" >
	{{ Form::open()}}
	 
	 {{Form::label('email', 'Email:')}}
	 {{Form::email('email',null, ['class' => 'form-control'])}}
<br>
 	{{Form::label('password', 'Password:')}}
	 {{Form::password('password',['class' => 'form-control'])}}
		
		{{Form::checkbox('remember',null,['class' =>'form-control'])}}	{{Form::label('remember', 'Remember:')}}
<br >
		{{Form::submit('Login', ['class' =>'btn btn-default btn-block'])}}

	{{ Form::close()}}
	</div>
	</div>
@stop