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

  public function validateEmail($object):bool{
    
    if(!filter_var($object->email,FILTER_VALIDATE_EMAIL) || empty($object->email)){
      $object->fail = new Exception("Informe um email válido");
      return false;
    }

    $instExist = (new Institution())->find("email= :e","e={$object->email}")->count();
    $userExist = (new User())->find("email= :e","e={$object->email}")->count();

    if($instExist || $userExist){
      $object->fail = new Exception("email já está em uso");
      
      return false;
    }

    return true;
  }

  public function validatePass($object):bool{

    if(empty($object->passwd) || strlen($object->passwd)<5){
      $object->fail = new Exception("informe uma senha com pelo menos 5 caracteres");

      return false;
    }
    
    return true;
  }

}