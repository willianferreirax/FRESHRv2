<?php 

namespace Source\controller;

use Model\User;
use Model\Event;
use Model\Institution;
use CoffeeCode\Paginator\Paginator;

class Web extends Controller
{
    protected $user;

    protected $inst;

    public function __construct($router){
        parent::__construct($router);

        if(!empty($_SESSION['user'])){
            $this->user = (new User())->findById($_SESSION["user"]);
        }
        elseif(!empty($_SESSION['inst'])){
            $this->inst = (new Institution())->findById($_SESSION["inst"]);
        }

    }
    
    public function home(){
        
        echo $this->view->render('theme1/index', [
            "title" => "Página inicial | FRESHR",
            "user" => $this->user,
            "inst" => $this->inst
        ]);
        
    }

    public function login(){

        if(!empty($_SESSION['user'])){
            $this->router->redirect('app.userPanel');
        }
        elseif(!empty($_SESSION['inst'])){
            $this->router->redirect('app.userPanel');
        }
        
        echo $this->view->render('theme2/Login', [
            "title" => "Faça login | FRESHR",

        ]);
        
    }

    public function cadChoose(){

        if(!empty($_SESSION['user'])){
            $this->router->redirect('app.userPanel');
        }
        elseif(!empty($_SESSION['inst'])){
            $this->router->redirect('app.userPanel');
        }
        
        echo $this->view->render('theme2/CadChoose', [
            "title" => "Faça seu cadastro | FRESHR"
        ]);
        
    }

    public function error($data){
        
        echo "erro".$data['errcode'];
        
    }

    public function registerUser(){

        if(!empty($_SESSION['user'])){
            $this->router->redirect('app.userPanel');
        }
        elseif(!empty($_SESSION['inst'])){
            $this->router->redirect('app.userPanel');
        }
        
        echo $this->view->render('theme2/RegisterUser', [
            "title" => "Faça seu cadastro - Usuário | FRESHR"
        ]);
        
    }

    public function registerInst(){

        if(!empty($_SESSION['user'])){
            $this->router->redirect('app.userPanel');
        }
        elseif(!empty($_SESSION['inst'])){
            $this->router->redirect('app.userPanel');
        }
        
        echo $this->view->render('theme2/RegisterInst', [
            "title" => "Faça seu cadastro - Instituição | FRESHR"
        ]);
        
    }

    public function help(){
        
        echo $this->view->render('theme1/Help', [
            "title" => "Precisa de ajuda? | FRESHR",
            "user" => $this->user,
            "inst" => $this->inst
        ]);
        
    }

    public function about(){
        
        echo $this->view->render('theme1/About', [
            "title" => "Sobre nós | FRESHR",
            "user" => $this->user,
            "inst" => $this->inst
        ]);
        
    }

    public function allInst(){

        $all = new Institution();
        
        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $pager = new Paginator($this->router->route('web.inst')."?page=");

        //quantos tem, quantos mostrar pro pagina, qual a pagina atual, quantos links pra frente e pra tras (1-2-atual-3-4)
        $pager->pager($all->find()->count(), 3, $page, 2);
    
        $all = $all->find("","","cod_inst,name,address,phone,city,state")->limit($pager->limit())->offset($pager->offset())->fetch(true);

        echo $this->view->render('theme1/ListInstitution', [
            "title" => "Todas as Instituições | FRESHR",
            "user" => $this->user,
            "inst" => $this->inst,
            "all" => $all,
            "pager" => $pager
        ]);
        
    }

    public function allEvent(){

        $all = new Event();
        
        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $pager = new Paginator($this->router->route('web.event')."?page=");

        //quantos tem, quantos mostrar pro pagina, qual a pagina atual, quantos links pra frente e pra tras (1-2-atual-3-4)
        $pager->pager($all->find()->count(), 3, $page, 2);
    
        $all = $all->find("","","event_name,
        thumb,
        cod_event,
        date_begin,
        date_end,
        hour_begin,
        hour_end,
        address,
        neighbor,
        city,
        state,
        cep,
        details,
        description,
        price,
        tags")->limit($pager->limit())->offset($pager->offset())->fetch(true);

        //trazer o nome da instituição junto
        //$name_inst = (new Institution())->find('cod_inst = :c',"c= {$event->cod_inst}",'name');

        echo $this->view->render('theme1/ListEvent', [
            "title" => "Todos os Eventos | FRESHR",
            "user" => $this->user,
            "inst" => $this->inst,
            "all" => $all,
            "pager" => $pager
        ]);
        
    }

    public function createEvent(){
        echo $this->view->render('theme1/CreateEvent', [
            "title" => "Todos os Eventos | FRESHR",
            "inst" => $this->inst
        ]);
    }

    public function showEvent($data){

        $event = new Event();
        $event = $event->find('cod_event = :c',"c= {$data['id']}")->fetch();
       

        echo $this->view->render('theme1/ShowEvent', [
            "title" => "{$event->event_name}| FRESHR",
            "event" => $event,
        ]);
    }

    public function showInst($data){

        $inst = new Institution();
        $inst = $inst->find('cod_inst = :c',"c= {$data['id']}")->fetch();

        echo $this->view->render('theme1/ShowInst', [
            "title" => "{$inst->inst_name}| FRESHR",
            "inst" => $inst
        ]);
    }

}