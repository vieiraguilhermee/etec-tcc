<?php
	//Aqui nos vamos construir a URL amigável
	
	Class Core {

		//Aqui estamos fazendo com que a função run seja executada quando a classe for instanciada
		public function __construct() {
			$this->run();
		}


		public function run() 
		{
			//Aqui estamos verificando se tem alguma coisa no GET, pois fizemos uma configuração em
			//htaccess que armazena qualquer coisa depois da / em uma query string chamada pag
			if (isset($_GET['pag']))
			{
				$url = $_GET['pag'];
			}

			//Caso não esteja vazio, vamos separar o que é classe, método e parâmetros
			if(!empty($url))
			{
				// Cria um array, podendo ser um array de uma posição, duas ou três
				$url = explode('/', $url);
				//Estamos guardando quem é o controller
				$controller = $url[0].'Controller';
				//Estamos retirando a primeira posição do array e ordenar o array novamente
				array_shift($url);

				//Estamos vendo se tem algo no $url e se tiver, estamos guardando qual o método
				if(isset($url[0]) && !empty($url[0]))
				{
					$metodo = $url[0];
					array_shift($url);
				} else
				{
					//Aqui, só foi passado a classe, então estamos definindo o método e parâmetro padrão
					$metodo = 'index';
				}

				//Verificando se tem algo no array, que seria os parâmetros
				if(count($url) > 0)
				{
					$parametros = $url;
					print_r($parametros);

				}

			} else //Não foi passado nada, só o site mesmo
			{
				//Já que não foi passado nada, estamos definindo controller e método padrão
				$controller = 'homeController';
				$metodo = 'index';
			}

			//Veremos se o controller passado existe realmente
			$caminho = 'MVC/Controllers/'.$controller.'php';

			// Estamos vendo se existe o controller e se existe o método passado
			if(!file_exists($caminho) && !method_exists($controller, $metodo))
			{
				$controller = 'homeController';
				$metodo = 'index';
			}

			if (!isset($parametros)) {
				$parametros = array();			
			}
			//Iremos instanciar a classe do controller
			$c = new $controller;

			//Chamando o método
			call_user_func_array(array($c, $metodo), $parametros);
		}
	}

?>