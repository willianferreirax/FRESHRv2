<?php
namespace Source\controller;

use Model\User;
use Model\Institution;
use Source\Support\Email;

class Auth extends Controller{

    public function __construct($router){
        parent::__construct($router);
    }

    public function login($data):void{
        $email = $data['email'];
        $passwd = filter_var($data["passwd"], FILTER_DEFAULT);

        if(!$email || !$passwd){
            echo $this->ajaxResponse("message",[
                "type" => "alert",
                "message" => "Informe seu login e senha para logar"
            ]);
            return;
        }

        $user = (new User())->find("email = :e", "e={$email}")->fetch();

        if($user && password_verify($passwd, $user->passwd)){
            
            $_SESSION["user"] = $user->cod_user;

            echo $this->ajaxResponse("redirect",[
                "url" => $this->router->route("appUser.userPanel")
            ]);
            return;
        }
        else{
            $institution = (new Institution())->find("email = :e", "e={$email}")->fetch();

            if($institution && password_verify($passwd, $institution->passwd)){
            
                $_SESSION["inst"] = $institution->cod_inst;
    
                echo $this->ajaxResponse("redirect",[
                    "url" => $this->router->route("appInst.instPanel")
                ]);

                return;
            }
        }
        echo $this->ajaxResponse("message",[
            "type" => "error",
            "message" => "login ou senha incorreto(s)"
        ]);
        return; 
    }

    public function registerUser($data):void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("",$data)){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => "Preencha todos os campos"       
            ]);
            return;
        }

        if($data['passwd'] != $data['confirm']){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => "Senhas diferentes"       
            ]);
            return;
        }
    
        $user = new User();

        $user->name = $data['name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->passwd = $data['passwd'];

        if($user->save()){
            $_SESSION['user'] = $user->cod_user;

            echo $this->ajaxResponse('redirect',[
                "url" => $this->router->route('appUser.userPanel')
            ]);
            
        }
        else{
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => $user->fail()->getMessage()       
            ]);
            return;
        }
    }

    public function registerInst($data):void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("",$data)){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => "Preencha todos os campos"       
            ]);
            return;
        }

        if($data['passwd'] != $data['confirm']){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => "Senhas diferentes"       
            ]);
            return;
        }
       
        $institution = new Institution();

        $institution->CNPJ = $data['cnpj'];
        $institution->passwd = $data['passwd'];
        $institution->name = $data['name'];
        $institution->address = $data['address'];
        $institution->neighbor = $data['neighbor'];
        $institution->city = $data['city'];
        $institution->state = $data['state'];
        $institution->cep = $data['cep'];
        $institution->email = $data['email'];
        $institution->phone = $data['phone'];

        if($institution->save() === true){
            $_SESSION['inst'] = $institution->cod_inst;

            echo $this->ajaxResponse('redirect',[
                "url" => $this->router->route('appInst.instPanel')
            ]);
            
        }
        else{
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => $institution->fail()->getMessage()
            ]);
            return;
        }
    }

    public function forget($data):void{
        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);

        if(!$email){
            echo $this->ajaxResponse("message",[
                'type' => 'alert',
                'message' => "informe seu email para recuperar a senha"
            ]);
            return;
        }

        $user = (new User())->find("email = :e", "e={$email}")->fetch();

        if(!$user){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => "o E-MAIL informado não está cadastrado"
            ]);
            return;
        }

        $user->forget = (md5(uniqid(rand(), true)));

        $user->save();

        $_SESSION["forget"] = $user->id;

        $email = new Email();

        $email->add(
            "Recupere sua senha |".site("name"),
            $this->view->render("emails/recover",[
                "user" =>$user,
                "link" =>$this->router->route("web.reset",[
                    "email" => $user->email,
                    "forget" => $user->forget
                ])
            ]),
            "{$user->first_name} {$user->last_name}",
            $user->email,
        )->send();

        flash("success", "enviamos o link de recuperação para seu email");
        
        echo $this->ajaxResponse("redirect",[
            "url" => $this->router->route("web.forget")
        ]);

    }

    public function reset($data):void{
        if(empty($_SESSION["forget"]) || !$user = (new User())->findById($_SESSION["forget"])){
            flash("error","Não foi possivel recupera, tente novamente");
            echo $this->ajaxResponse("redirect",[
                "url" => $this->router->route("web.forget")
            ]);
            return;
        }

        if(empty($data["password"]) || empty($data["password_re"])){
            echo $this->ajaxResponse("message",[
                'type' => 'alert',
                'message' => "Informe e repita sua nova senha"
            ]);
            return;
        }

        if($data["password"] != $data["password_re"]){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => "Você informou duas senhas diferentes"
            ]);
            return;
        }

        $user->passwd = $data["password"];
        $user->forget = null;

        if(!$user->save()){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => $user->fail->getMessage()
            ]);
            return;
        }

        unset($_SESSION["forget"]);

        flash("success", "sua senha foi atualizada com sucesso");

        echo $this->ajaxResponse("redirect",[
            "url" => $this->router->route("web.login")
        ]);
    }
}