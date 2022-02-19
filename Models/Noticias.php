<?php

	require_once 'Conexao.php';

	Class Noticias 
	{
		private $con;

		public function __construct()
		{
			$this->con = Conexao::getConexao();
		}

		public function getNoticias()
		{
			$dados = array();	
			$cmd = $this->con->query("select * from noticias");
			$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $dados;
		}

		public function getCategoria($categoria)
		{
			$dados = array();	
			try {
				$cmd = $this->con->query("select 
											n.Id,
											n.titulo,
											n.imagem,
											n.texto,
											t.descricao 
									 	from noticias n inner join TipoNoticias t
										on n.TipoNoticia = t.Id
										where n.TipoNoticia = $categoria");
			$cmd->execute();
			} catch (PDOxception $e) {
				echo $e;
			}
			

			$dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
			return $dados;
		}
	}