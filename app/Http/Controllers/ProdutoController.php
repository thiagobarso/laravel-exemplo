<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use App\Produto;
use App\Http\Requests\ProdutoRequest;
use Auth;

class ProdutoController extends Controller {

    public function __construct(){
        $this->middleware('autorizador', 
        ['only' => ['adiciona', 'remove', 'novo']]);
    }


    public function lista(){

        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra($id){
        //$id= Request::input('id');
        // $id= Request::route('id');
        $produto = Produto::find($id);
        return view('produto.detalhes')->with('p', $produto);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(ProdutoRequest $request){


        Produto::create($request->all());

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function listaJson() {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }

    public function remove($id){
        // $id = Request::route($id);
        $produto = Produto::find($id);
        $produto->delete();
        // return redirect('/produtos');
        return redirect()->action('ProdutoController@lista');
    }
}