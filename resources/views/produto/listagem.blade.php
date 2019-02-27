@extends('layout.principal')

@section('conteudo')
<h1>Listagem de Produtos</h1>

@if($produtos->isEmpty())

<div class="alert alert-danger">
  Você não tem nenhum produto cadastrado.
</div>

@else

<table class="table table-striped table-bordered table-hover">
	@foreach ($produtos as $p)
	<tr class="{{ $p->quantidade <=1 ? 'danger' : ''}}">
		<td>{{$p->nome}} </td>
		<td>R$ {{$p->valor}}</td>
		<td>{{$p->descricao}}</td>
		<td>{{$p->quantidade}}</td>	
		<td>{{$p->tamanho}}</td>	
		<td>{{$p->categoria->nome or ''}}</td>	
		<td>
			<a href="/produtos/mostra/{{$p->id}} ">
				<span class="glyphicon glyphicon-search"></span>
			</a>
		</td>
		<td>
			<a href="{{action('ProdutoController@remove', $p->id)}}">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	@endforeach
</table>
@endif

@if(old('nome'))
	<div class="alert alert-success">
		<strong>Sucesso!</strong> 
		O produto {{old('nome')}} adicionado com sucesso!	
	</div>	
@endif


<h4>
  <span class="label label-danger pull-right">
    Um ou menos itens no estoque
  </span>
 </h4>

@stop