<?php

	Class Controller 
	{
		public $dados;
		public $dados2;

		public function __construct() 
		{
			$this->dados = array();
		}

		public function carregarTemplate($nomeView, $dadosModel = array(), $dados2 = array())
		{
			$this->dados = $dadosModel;
			$this->dados2 = $dados2;
			require 'Views/template.php';
		}

		public function carregarViewNoTemplate($nomeView, $dadosModel = array())
		{
			//No php, podemos usar em arrays nomes ao invés de indíces
			//extract basicamente transforma esses nomes em variáveis e seus valores
			extract($dadosModel);
			require 'Views/'.$nomeView.'.php';
			
		}
	}