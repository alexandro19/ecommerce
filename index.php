<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {

$page = new Page(); // Nesse momento ele chama o metodo construct. E esse metodo construct carrega a pagina header.html. Verifique seu código.

$page->setTpl("index"); // Carrega o conteudo que está na tela de index.html
	
});


$app->get('/admin', function() {

User::verifyLogin();

$page = new PageAdmin(); // Nesse momento ele chama o metodo construct. E esse metodo construct carrega a pagina header.html. Verifique seu código.

$page->setTpl("index"); // Carrega o conteudo que está na tela de index.html
	
});

$app->get('/admin/login', function(){
$page = new PageAdmin([
	"header"=>false,
	"footer"=>false
]);
$page->setTpl("login");
});

$app->post('/admin/login', function(){
	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;
});


$app->get('/admin/logout', function(){
	User::logout();
	header("Location: /admin/login");
	exit;
});


$app->run(); // faz a ignição ou seja roda tudo isso que definimos a cima.

 ?>