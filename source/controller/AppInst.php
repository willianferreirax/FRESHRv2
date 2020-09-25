<?php
namespace Source\controller;

use Model\Event;
use Model\Institution;

class AppInst extends Controller{

    protected $institution;

    public function __construct($router)
    {
        parent::__construct($router);
        
        //restrição de acesso
        if(empty($_SESSION["inst"]) || !$this->institution = (new Institution())->findById($_SESSION["inst"])){
            flash("error","Acesso negado. Favor logue-se");
            unset($_SESSION["inst"]);
            $this->router->redirect("web.login");
            
        }
        
    }

    public function instPanel(){

        $event = new Event();
        $event = $event->find('cod_inst = :c',"c= {$this->institution->cod_inst}")->fetch(true);

        echo $this->view->render('theme1/InstPanel', [
            "title" => "Painel da Instituição | FRESHR",
            'inst' => $this->institution,
            'events' => $event
        ]);
        
    }

    public function configInst(){
        
        echo $this->view->render('theme1/ConfigInst', [
            "title" => "Configurações | FRESHR",
            'inst' => $this->institution
        ]);
        
    }

    public function createEvent($data):void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("",[
            $data['name'],
            $data['date_begin'],
            $data['date_end'],
            $data['hour_begin'],
            $data['hour_end'],
            $data['address'],
            $data['neighbor'],
            $data['city'],
            $data['state'],
            $data['cep'],
        ])){
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => "Preencha todos os campos obrigatorios"       
            ]);
            return;
        }

        $event = new Event();

        $event->event_name = $data['name'];
        $event->date_begin = $data['date_begin'];
        $event->date_end = $data['date_end'];
        $event->hour_begin = $data['hour_begin'];
        $event->hour_end = $data['hour_end'];
        $event->address = $data['address'];
        $event->neighbor = $data['neighbor'];
        $event->city = $data['city'];
        $event->state = $data['state'];
        $event->cep = $data['cep'];
        $event->cod_inst = $_SESSION['inst'];
        $event->tags = json_encode('test');
        $event->visibility = 1;
        /*
        if($data['thumb']){
            $event->thumb = "existe";
        }
        else{
            $event->thumb = "arquivo padrao";
        }
        */
        if($data['description'] != ""){
            $event->description = $data['description'];
        }
        
        if($data['detail'] != ""){
            $event->details = $data['detail'];
        }

        if($data['price'] != ""){
            $event->price = $data['price'];
        }

        if($event->save()){

            flash('info','Evento cadastrado com sucesso');
           
             echo $this->ajaxResponse('redirect',[
                 "url" => $this->router->route('appInst.instPanel'),
             ]);
            
        }
        else{
            echo $this->ajaxResponse("message",[
                'type' => 'error',
                'message' => $event->fail()->getMessage()
            ]);
            return;
        }
    }

    public function logoff():void{
        if(isset($_SESSION["inst"])){
            unset($_SESSION["inst"]);

            flash(
                "info",
                "Você saiu com sucesso, {$this->institution->name}",
            );
            $this->router->redirect("web.home");
        }
        else{
            $this->router->redirect("web.home");
        }
    }

    public function update($data):void{
        if(isset($_POST['update_name'])){
            if(!isset($data["name"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe o novo nome"
                ]);
                return;
            }
            $this->institution->name = $data["name"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Nome alterado com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
                ]);
                return;
            }
        }

        if(isset($_POST['update_phone'])){
            if(!isset($data["phone"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe o novo telefone"
                ]);
                return;
            }
            $this->institution->phone = $data["phone"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Telefone alterado com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
                ]);
                return;
            }
        }

        if(isset($_POST['update_address'])){
            if(!isset($data["address"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe o novo endereço"
                ]);
                return;
            }
            $this->institution->address = $data["address"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Endereço alterado com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
                ]);
                return;
            }
        }

        if(isset($_POST['update_neighbor'])){
            if(!isset($data["neightbor"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe o novo bairro"
                ]);
                return;
            }
            $this->institution->neighbor= $data["neighbor"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Bairro alterado com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
                ]);
                return;
            }
        }

        if(isset($_POST['update_city'])){
            if(!isset($data["city"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe a nova cidade"
                ]);
                return;
            }
            $this->institution->city = $data["city"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Cidade alterada com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
                ]);
                return;
            }
        }

        if(isset($_POST['update_state'])){
            if(!isset($data["state"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe o novo estado"
                ]);
                return;
            }
            $this->institution->state = $data["state"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Estado alterado com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
                ]);
                return;
            }
        }

        if(isset($_POST['update_CEP'])){
            if(!isset($data["cep"])){
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => "Informe o novo cep"
                ]);
                return;
            }
            $this->institution->cep = $data["cep"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "CEP alterado com sucesso"
                ]);
                return;
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
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

            $this->institution->email = $data["email"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Email alterado com sucesso"
                ]);
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
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
                    'type' => 'error',
                    'message' => "Confirme a nova senha"
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

            $this->institution->passwd = $data["pass"];

            if($this->institution->save()){
                echo $this->ajaxResponse("message",[
                    'type' => 'message',
                    'message' => "Senha alterada com sucesso"
                ]);
            }
            else{
                echo $this->ajaxResponse("message",[
                    'type' => 'error',
                    'message' => $institution->fail->getMessage()
                ]);
                return;
            }
        }
    }
}
