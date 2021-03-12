<?php
namespace Model;

use Model\User;
use CoffeeCode\DataLayer\DataLayer;
use Exception;

class Institution extends DataLayer{

  public function __construct(){
    //entity(strings),campos obrigatorios(array), primary key, timestamps
    parent:: __construct("institutions", 
    [
      "CNPJ",
      "email",
      "passwd",
      "name",
      "address",
      "neighbor",
      "city",
      "state",
      "cep",
      "phone"
    ]
    ,"cod_inst", false);
  }

  public function save():bool{
    if(empty($this->cod_inst)){
      //create
      if(!$this->validateEmail() || !User::validatePass($this)){
        return false;
      }

      $this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT);
      
      if(!$this->validateCep($this)){
        return false;
      }

      $this->cep = str_replace("-","",$this->cep);

      if(!$this->validatePhone($this->phone) ||!$this->validateCNPJ($this->CNPJ) || !parent::save()){
        return false;
      }

      return true;
    }
    else{
      //update
      if(!parent::save()){
        return false;
      }

      return true;
    }
  }

  public function validateCep($object):bool{
    if(!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $object->cep)) {
      $object->fail = new Exception("Cep inválido");
      return false;
    }
    return true;
  }


  protected function validatePhone($phone):bool{
    $phone = str_replace(array('(',')','-',' '),'',$phone);

    if(!preg_match('/^[0-9]{2,3}([0-9]{4}[0-9]{4})$/', $phone)){
      $this->fail = new Exception("Telefone inválido");
      return false;
    }
    $this->phone = $phone;
    return true;
  }

  protected function validateCNPJ($cnpj):bool{

    $cnpj = str_pad(str_replace(array('.','-','/'),'',$cnpj),14,'0',STR_PAD_LEFT);
    
    if (strlen($cnpj) != 14):
        $this->fail = new Exception("CNPJ inválido");
        return false;
    else:
        for($t = 12; $t < 14; $t++):
            for($d = 0, $p = $t - 7, $c = 0; $c < $t; $c++):
                $d += $cnpj[$c] * $p;
                $p  = ($p < 3) ? 9 : --$p;
            endfor;
            $d = ((10 * $d) % 11) % 10;
            if($cnpj[$c] != $d):
              $this->fail = new Exception("CNPJ inválido");
              return false;
            endif;
        endfor;
        $this->CNPJ = $cnpj;
        return true;
    endif;
  }

  protected function validateEmail():bool{
    
    if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      $this->fail = new Exception("Informe um email válido");
      return false;
    }

    $userByEmail = null;
    $instByEmail = null;
  
    if(!$this->cod_inst){
      $instByEmail = $this->find("email = :email", "email={$this->email}")->count();
    }
    else{
      $instByEmail = $this->find("email = :email AND cod_inst != :id", "email={$this->email}&id={$this->cod_inst}")->count();
      $userByEmail = (new User())->find("email = :email","email={$this->email}")->count();
    }

    if($userByEmail || $instByEmail){
      $this->fail = new Exception("O e-mail informado já está em uso1");
      return false;
    }
    return true;
    
  }

}
