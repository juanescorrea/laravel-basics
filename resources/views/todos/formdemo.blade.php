{{ Form::open(array('route'=>'todos.store')) }}
	{{ Form::label('title','List Title') }}
	{{ Form::text('title') }}
	{{ Form::submit('submit',array('class'=>'button')) }}
	{{ Form::close() }}

	{!! Form::open(array('url' => 'foo/bar')) !!}
    //
	{!! Form::close() !!}

		<form method="POST" action="http://laravel.dev:8000/todos" accept-charset="UTF-8">
		<input name="_token" type="hidden" value="40XSb0bJvMQ72hs2pKCFwt1OYncgp74MOLp6mGRa"> 
		<label for="title">List Title</label> 
		<input name="title" type="text" id="title"> 
		{{ $errors->first('title','<small class="error">:message </small>') }}
		<input class="button" type="submit" value="submit"> 
	</form>