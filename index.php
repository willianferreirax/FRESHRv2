<?php
ob_start();
session_start();

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("Source\controller");

/**WEB */
$router->group(null);
$router->get("/","Web:home", "web.home");//drop tema 1
$router->get("/login","Web:login","web.login");// tema 2
$router->get("/ajuda","Web:help", 'web.help');//drop tema 1
$router->get("/sobre","Web:about","web.about");//drop tema 1

$router->group('/cadastro');
$router->get("/","Web:cadChoose", "web.cadChoose");//tema 2
$router->get("/usuario","Web:registerUser", "web.registerUser");//tema 2
$router->get("/instituição","Web:registerInst", "web.registerInst");//tema 2

/*SEARCH */
$router->group('pesquisa');
$router->post('/',"Web:search", "web.search");


/*ALL */
$router->group('/todos');
$router->get("/instituições","Web:allInst","web.allInst");
$router->get("/eventos","Web:allEvent","web.allEvent");

/*SHOW*/
$router->group(null);
$router->get("/instituicao/{id}","Web:showInst","web.showInst");
$router->get("/evento/{id}","Web:showEvent","web.showEvent");

/*AUTH */
$router->group(null);
$router->post('/login',"Auth:login", "auth.login");
$router->post('/cadastre-se',"Auth:registerUser", "auth.registerUser");
$router->post('/divulgue',"Auth:registerInst","auth.registerInst");


/**PROFILE USER*/
$router->group('usuario');
$router->get('/',"AppUser:userPanel", "appUser.userPanel");//tema 3
$router->get('/sair','AppUser:logoff','appUser.logoff');
$router->get('/config','AppUser:configUser','appUser.configUser');
$router->post('/update','AppUser:updateName','appUser.updateName');

/**PROFILE INST*/
$router->group('/instituicao');
$router->get("/","AppInst:instPanel","appInst.instPanel");//tema 3
$router->get("/evento","Web:createEvent","web.createEvent");
$router->post("/evento","AppInst:createEvent","appInst.createEvent");
$router->get('/sair','AppInst:logoff','appInst.logoff');
$router->get('/config','AppInst:configInst','appInst.configInst');

/**
 * ERROR
 */
$router->group("ops");
$router->get('/{errcode}', 'Web:error', 'web.error');


/**
 * ROUTES PROCESSING
 */
$router->dispatch();

/**
 * ERROR PROCESSING
 */
if($router->error()){
    $router->redirect("web.error",["errcode" => $router->error()]);
}

ob_end_flush();