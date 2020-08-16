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
}
