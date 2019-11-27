<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {

$page = new Page(); // Nesse momento ele chama o metodo construct. E esse metodo construct carrega a pagina header.html. Verifique seu código.

$page->setTpl("index"); // Carrega o conteudo que está na tela de index.html
	
});


$app->get('/admin', function() {

$page = new PageAdmin(); // Nesse momento ele chama o metodo construct. E esse metodo construct carrega a pagina header.html. Verifique seu código.

$page->setTpl("index"); // Carrega o conteudo que está na tela de index.html
	
});


$app->run(); // faz a ignição ou seja roda tudo isso que definimos a cima.

 ?>