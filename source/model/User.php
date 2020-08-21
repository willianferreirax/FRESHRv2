<?php
namespace Model;

use Exception;
use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer{

  public function __construct(){
    //entity(strings),campos obrigatorios(array), primary key, timestamps
    parent:: __construct("users", 
    [
      "name",
      "last_name",
      "email",
      "passwd"
    ]
    ,"cod_user", false);
  }

  public function save():bool{

    if(!$this->validateEmail($this) || !$this->validatePass($this)){
      return false;
    }

    $this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT);

    if(!parent::save()){
      return false;
    }

    return true;
  }

  public function validateEmail():bool{
    
    if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      $this->fail = new Exception("Informe um email válido");
      return false;
    }

    $userByEmail = null;
    $InstByEmail = null;

    if(get_class($this)=="User"){
      if(!$this->cod_user){
        $userByEmail = $this->find("email = :email", "email={$this->email}")->count();
      }
      else{
        $userByEmail = $this->find("email = :email AND cod_user != :id", "email={$this->email}&id={$this->cod_user}")->count();
      }

      if($userByEmail){
        $this->fail = new Exception("O e-mail informado já está em uso");
        return false;
      }
      return true;
    }
    else{
      if(!$this->cod_inst){
        $InstByEmail = $this->find("email = :email", "email={$this->email}")->count();
      }
      else{
        $InstByEmail = $this->find("email = :email AND cod_inst != :id", "email={$this->email}&id={$this->cod_inst}")->count();
      }

      if($InstByEmail){
        $this->fail = new Exception("O e-mail informado já está em uso");
        return false;
      }
      return true;
    }
  }
    

  public function validatePass($object):bool{

    if(empty($object->passwd) || strlen($object->passwd)<5){
      $object->fail = new Exception("informe uma senha com pelo menos 5 caracteres");

      return false;
    }
    
    return true;
  }

}