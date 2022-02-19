<?php

	Class homeController extends Controller
	{
		public function index() 
		{
			//Carregar uma model
			//$u = new usuarios();

			//Carregar uma view
			$this->carregarTemplate('home');
		}
	}