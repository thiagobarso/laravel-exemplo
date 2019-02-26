<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function lista(){

        $produtos = DB::select('select * from produtos');
        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra(){
        //$id= Request::input('id');
        $id= Request::route('id');
        $produto = DB::select('select * from produtos where id = ? ',  [$id]);
        return view('produto.detalhes')->with('p', $produto[0]);
    }

    public function novo(){
        return view('formulario');
    }

    public function adiciona(){

        //pegar as informações do Formulario
        $nome = Request::input('nome');
        $quantidade = Request::input('quantidade');
        $valor = Request::input('valor');
        $descricao = Request::input('descricao');
        //salvar no Banco
        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)',
                array($nome,$quantidade,$valor, $descricao));


        return view('adicionado')->with('nome', $nome);
    }
}