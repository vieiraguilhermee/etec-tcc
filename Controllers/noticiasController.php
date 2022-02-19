<?php

	Class noticiasController extends Controller
	{
		public function index() 
		{
			//Carregar uma model
			//$u = new usuarios();
			//Carregar uma view

			$n = new Noticias();
			$dados = $n->getNoticias();

			$this->carregarTemplate('noticias', array(), $dados);
		}

		public function entretenimento($parametros)
		{
			$n = new Noticias();
			$dados = $n->getCategoria($parametros);
			$this->carregarTemplate('noticias', array(), $dados);
		}

		public function futebol() 
		{
			$this->carregarTemplate('futebol');
		}
	}