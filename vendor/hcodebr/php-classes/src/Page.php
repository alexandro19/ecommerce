<?php 
	
	namespace Hcode;

	use Rain\Tpl;

	class Page{

		private $tpl;
		private $options = [];
		private $defaults = [
			"data"=>[]
		];

		public function __construct($opts = array(), $tpl_dir = "/views/"){

			$this->options = array_merge($this->defaults, $opts);

			$config = array(
				"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
				"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
				"debug"         => false // set to false to improve the speed
		   	);

			Tpl::configure( $config );
			$this->tpl = new tpl;

			$this->setData($this->options["data"]);

			$this->tpl->draw("header");
		}

		private function setData($data = array()){ // Esse metodo é responsável por passar os dados para o templete
			foreach ($data as $key => $value) {
				$this->tpl->assign($key, $value);
			}			
		}

		public function setTpl($nome, $data  = array(), $returnHTML = false){
			$this->setData($data);
			$this->tpl->draw($nome, $returnHTML);
		} 

		public function __destruct(){
			$this->tpl->draw("footer");
			
		}
	}

 ?>