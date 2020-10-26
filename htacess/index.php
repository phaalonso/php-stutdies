<?php

require_once "config.php";

class Route{
	
	private $routes;

	public function __construct(){
		 $this->initRoutes(); 
		 $this->run($this->getURL());
	}

	public function initRoutes(){
		 $this->routes['/rotas/']=array('controle'=>'indexControler','action'=>'index');
		 $this->routes['/rotas/lista']=array('controle'=>'indexControler','action'=>'listar');
		 $this->routes['/rotas/cadastro']=array('controle'=>'indexControler','action'=>'cadastrar');
		 $this->routes['/rotas/menu']=array('controle'=>'menuController','action'=>'cadastrar');
	}

	public function run($url){
		 if(array_key_exists($url,$this->routes)){
			 $class = "controle".DIRECTORY_SEPARATOR.$this->routes[$url]['controle'];
			 $controle = new $class; 
			 $action=$this->routes[$url]['action'];
			 $controle->$action(); 
		 }
	}

	public function getURL(){
		 return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}

}

$Rotas = new Route();
