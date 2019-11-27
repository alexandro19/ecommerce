<?php 
	
	namespace Hcode;

	class PageAdmin extends Page{ // Essa classe erda a classe Page 

		public function __construct($opts = array(), $tpl_dir = "/views/admin/"){

			parent::__construct($opts, $tpl_dir); // Nessa linha executamos o metodo construtor que está na classe Page que extendemos.

		}

	}
	

 ?>