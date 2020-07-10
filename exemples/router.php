<?php
//assim foi usando callbacks
/*
$router->group(null);
$router->get("/", function($data){
    echo "<h1>Olá mundo!</h1>";
    var_dump($data);
});

$router->group("ops");
$router->get("/{erro}", function($data){
    echo "<h1> Erro {$data['erro']} </h1>";
});

$router->dispatch();

if($router->error()){
    $router->redirect("/ops/{$router->error()}");
}
*/
//usando controller
$router->namespace("Source\controller");

$router->group(null);
$router->get('/',"IndexController:index");
//$router->get('/{filter}', 'IndexController:index');
//$router->get('/{filter}/{category}', 'IndexController:index');
//tudo que estiver depois da barra pode ser usado de filtro em um blog por exemplo
//posso criar qualquer tipo de entrada dinamica

//regras dinamicas tem que estar acima das regras fixas 
$router->group("ops");
$router->get("/{erro}","IndexController:error");

$router->group("contact");
$router->get("/","IndexController:contact");
$router->post("/","IndexController:contact");

$router->dispatch();

if($router->error()){
   $router->redirect("/ops/{$router->error()}");
}
?>