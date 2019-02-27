<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use App\Produto;

class ProdutoController extends Controller {

    public function lista(){

        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra(){
        //$id= Request::input('id');
        $id= Request::route('id');
        $produto = Produto::find($id);
        return view('produto.detalhes')->with('p', $produto);
    }

    public function novo(){
        return view('formulario');
    }

    public function adiciona(){

        $produto = new Produto();

        //pegar as informações do Formulario
        $produto->nome = Request::input('nome');
        $produto->quantidade = Request::input('quantidade');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        //salvar no Banco
        $produto->save();

        return redirect('/produtos')->withInput(Request::only('nome'));
    }

    public function listaJson() {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }
}