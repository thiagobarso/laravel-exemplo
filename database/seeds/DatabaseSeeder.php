<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class DatabaseSeeder extends Seeder {


	public function run()
	{
		Model::unguard();

		$this->call('CategoriaTableSeeder');
	}

}

class CategoriaTableSeeder extends Seeder{
	public function run(){
		Categoria::create(['nome' => 'ELETRODOMESTICO']);
		Categoria::create(['nome' => 'ELETRONICA']);
		Categoria::create(['nome' => 'BRINQUEDO']);
		Categoria::create(['nome' => 'ESPORTES']);
	}
}
