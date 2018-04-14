<?php
//Autoload
$loader = require 'vendor/autoload.php';

//Instanciando objeto
$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

//lista todos os projetos
$app->get('/projetos/', function() use ($app){
	(new \controllers\Projeto($app))->listar();
});

//mostra os dados de um projeto
$app->get('/projetos/:id', function($id) use ($app){
	(new \controllers\Projeto($app))->listar($id);
});

//cadastra projeto
$app->post('/projetos/', function() use ($app){
	(new \controllers\Projeto($app))->salvar();
});

//atualiza projeto
$app->put('/projetos/:id', function($id) use ($app){
	(new \controllers\Projeto($app))->salvar($id);
});

//exclui projeto
$app->delete('/projetos/:id', function($id) use ($app){
	(new \controllers\Projeto($app))->excluir($id);
});

//Rodando aplicação
$app->run();
