<?php
namespace Model;
use CoffeeCode\DataLayer\DataLayer;
use Exception;
use Model\Institution;

class Event extends DataLayer{
    public function __construct(){
        parent::__construct("event",[
            "event_name",
            "date_begin",
            "date_end",
            "hour_begin",
            "hour_end",
            "address",
            "neighbor",
            "city",
            "state",
            "cep",
            "cod_inst" 
        ],"cod_event",false);

    }

    public function save():bool{
        if(!Institution::validateCep($this) 
        || !$this->validateDateTime()
        || !parent::save()){
            return false;
        }
        return true;
    }

    protected function validateDateTime(){
        if(strtotime($this->date_begin) > strtotime($this->date_end)){
            $this->fail = new Exception("A data de inicio é posterior à data de término. Selecione corretamente.");
            return false;
        }

        if(strtotime($this->time_begin) > strtotime($this->time_end) && strtotime($this->date_end)<=strtotime($this->date_begin)){
            $this->fail = new Exception("A hora de inicio é posterior à hora de termino. Selecione de maneira correta.");
            return false;
        }

        if((strtotime($this->date_begin)==strtotime(date('Y-m-d')) || strtotime($this->date_end)==strtotime(date('Y-m-d'))) && (strtotime($this->time_end)< time() || strtotime($this->time_begin)< time())){
            $this->fail = new Exception("Não é possivel agendar o evento para a data e horarios propostos.");
            return false;
        }
        
        return true;
    }

    protected function updateVisibility(){
        if($this->visibility == 1){
            $this->visibility = 0;
        }
        elseif($this->visibility == 0){
            $this->visibility = 1;
        }
        parent::save();
    }
      
}