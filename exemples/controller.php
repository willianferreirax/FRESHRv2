<?php
class Controller{
    public function index($data){
        echo "<h1>home</h1>";
        var_dump($data);
    }

    public function error($data){
        echo "<h1>Algo deu errado! <br> Erro {$data['erro']}</h1>";
        var_dump($data);
    }

    public function contact($data){
        echo "<h1>Contato<h1>";
        var_dump($data);
        $url = URL_BASE;

        require __DIR__."/../view/contact.php";
    }
}
?>