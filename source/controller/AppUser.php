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

    public function update($data):void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(isset($_POST['update_name'])){

            if(!isset($data["name"]) || $data["name"] == ""){
                echo $this->ajaxResponse("message",[
                    "type" => "message",
                    "message" => "Informe o novo nome"
                ]);
                return;
            }

            $this->user->name = $data["name"];

            if(isset($data["last_name"]) && $data["last_name"]!= ""){
                $this->user->last_name = $data["last_name"];
            }
            
            if($this->user->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Nome alterado com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $this->user->fail->getMessage()
                ]);
                return;
            }
            
        }

        if(isset($_POST['update_email'])){

            if(!isset($data["email"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe o novo email"
                ]);
                return;
            }

            $this->user->email = $data["email"];

            if($this->user->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Email alterado com sucesso"
                ]);
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $this->user->fail->getMessage()
                ]);
                return;
            }
        }
        
        if(isset($_POST['update_pass'])){

            if(!isset($data["pass"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe a nova senha"
                ]);
                return;
            }

            if(!isset($data["confirm"])){
                echo $this->ajaxResponse("message",[
                    "type" => 'error',
                    "message" => "Confirme a nova senha"
                ]);
                return;
            }

            if($data["pass"] != $data["confirm"]){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Você informou duas senhas diferentes"
                ]);
                return;
            }

            $this->user->passwd = $data["pass"];

            if($this->user->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Senha alterada com sucesso"
                ]);
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $this->user->fail->getMessage()
                ]);
                return;
            }
            
        }
    }
}
