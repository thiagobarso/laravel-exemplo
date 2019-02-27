@extends('layout.principal')
@section('conteudo')

@if(!($errors->isEmpty()))
<div class="alert alert-danger">
<ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif

<form action="/login" method="post">
	
	<input type="hidden" name="_token" value="{{csrf_token()}}" />

	<div class="form-group">
		<label>Email</label>
		<input name="email" class="form-control" value="{{ old('email') }}"/>
	</div>
	
	<div class="form-group">
		<label>Senha</label>
		<input type="password" name="password" class="form-control" value="{{ old('password') }}"/>
	</div> 

	<button class="btn btn-primary" type="submit">Login</button>

</form>

@stop