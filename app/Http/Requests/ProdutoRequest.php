<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdutoRequest extends Request {


	public function authorize()
	{
		return true;
	}


	public function rules()
	{
		return [
			'nome' => 'required|min:3',
			'descricao' => 'required|max:255',
			'valor' => 'required|numeric',
			'quantidade' => 'required|numeric',
			'tamanho' => 'required|max:100',
		];
	}

	public function messages()
	{
  		return [
     		'required' => 'O campo :attribute não pode estar vazio.',     		
  		];
	}

}
