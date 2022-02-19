<?php

	//Basicamente estamos criando um arquivo que lida com a questão de incluir os arquivos necessários, 
	//assim não precisamos dar um monte de include ou require em cada página, apenas chamar essa
	//esse método faz com que possamos registrar várias funções que serão chamadas quando uma classe for instanciada
	
	spl_autoload_register(function($nome_arquivo) 
	{
		if(file_exists('Controllers/'.$nome_arquivo.'.php'))
		{
			require 'Controllers/'.$nome_arquivo.'.php';
		} 
		elseif(file_exists('Models/'.$nome_arquivo.'.php'))
		{
			require 'Models/'.$nome_arquivo.'.php';
		}
		elseif(file_exists('Core/'.$nome_arquivo.'.php'))
		{
			require 'Core/'.$nome_arquivo.'.php';
		}
	});
?>