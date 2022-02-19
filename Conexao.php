<?php

	Class Conexao 
	{
		private static $instancia;

		private function __construct(){}

		public static function getConexao()
		{
			if(!isset(self::$instancia))
			{
				$dbname = 'mvc';
				$host = '127.0.0.1';
				$user = 'root';
				$senha = 'etecjau';

				try
				{
					self::$instancia = new PDO("mysql:dbname={$dbname};host={$host};port=3308","{$user}", "{$senha}");

				} 
				catch (Exception $ex) 
				{
					echo "Erro: $ex";
				}
			}

			return self::$instancia;
			
		}
	}