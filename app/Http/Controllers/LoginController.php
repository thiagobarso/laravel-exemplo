<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;

class LoginController extends Controller {

	public function form(){
		return view('form_login');
	}

	public function login(){
		$credenciais = Request::only('email','password');

		if(Auth::attempt($credenciais)){
			return 'usuario existe';
		}

		return 'usuario não existe';
	}

}
