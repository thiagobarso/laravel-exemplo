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

<form action="/produtos/adiciona" method="post">
	
	<input type="hidden" name="_token" value="{{csrf_token()}}" />

	<div class="form-group">
		<label>Nome</label>
		<input name="nome" class="form-control" value="{{ old('nome') }}"/>
	</div>
	
	<div class="form-group">
		<label>Valor</label>
		<input name="valor" class="form-control" value="{{ old('valor') }}"/>
	</div>

	<div class="form-group">
		<label>Quantidade</label>
		<input name="quantidade" class="form-control" value="{{ old('quantidade') }}"/>
	</div>

	<div class="form-group">
		<label>Tamanho</label>
		<input name="tamanho" class="form-control" value="{{ old('tamanho') }}"/>
	</div>

	<div class="form-group">
		<label>Descrição</label>
		<input name="descricao" class="form-control" value="{{ old('descricao') }}"/>
	</div>

	<button class="btn btn-primary" type="submit">Adicionar</button>

</form>

@stop