<?php

class Validator
{

    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function getField($field)
    {
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }

    public function isUniq($field, $db, $table, $errorMsg)
    {
        $record = $db->query("SELECT id FROM $table WHERE $field = ?",[$this->getField($field)])->fetch();

        if ($record){
         $this->errors[$field] = $errorMsg;
       }
    }

    public function isEmail($field, $errorMsg = false)
    {
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    public function isConfirmed($field, $field2, $errorMsg)
    {
        if(empty($this->getField($field)) || $this->getField($field) != $this->getField($field2)){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isValid()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function userValid($email,$password,$db)
    {
      if (!empty([$this->getField($email)]) && !empty([$this->getField($password)]) ) {

        $email = $this->getField($email);

        $user = $db->query("SELECT * FROM users WHERE (email = :email) AND confirmed_at IS NOT NULL",['email' => $email])->fetch();
      }

      if( password_verify($this->getField($password), $user->password)){

        $res = $user;
    }
    else {

        $res = false;
    }

    return $res;

  }

}
