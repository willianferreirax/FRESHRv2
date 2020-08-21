<?php
namespace Source\controller;
use Model\User;

class AppUser extends Controller{

    protected $user;

    public function __construct($router)
    {
        parent::__construct($router);
        
        //restrição de acesso
        if(empty($_SESSION["user"]) || !$this->user = (new User())->findById($_SESSION["user"])){
            flash("error","Acesso negado. Favor logue-se");
            unset($_SESSION["user"]);
            $this->router->redirect("web.login");
        }
        
    }

    public function userPanel(){
        
        echo $this->view->render('theme1/UserPanel', [
            "title" => "Painel da Usuário {$this->user->name} | FRESHR",
            'user' => $this->user
        ]);
        
    }

    public function configUser(){
        echo $this->view->render('theme1/ConfigUser', [
            "title" => "Configuração do Usuário | FRESHR",
            'user' => $this->user
        ]);
    }

    public function logoff():void{

        if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);

            flash(
                "info",
                "Você saiu com sucesso, {$this->user->name}",
            );

            $this->router->redirect("web.home");
        }
        else{
            $this->router->redirect("web.home");
        }
    }

    public function updateName($data):void{
        $this->user->name = $data["name"];

        $this->user->save();


    }
}
