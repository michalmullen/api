<?php

require_once(__DIR__ . '/Model.php');

class User extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = $id";
        return $this->row($sql);
    }

    //returns count or user data based off bool
    public function loginUser($email, $password, $bool)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        if ($bool) {
            return $this->row($sql);
        } else {
            return $this->count($sql);
        }
    }

    public function getUserId($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        return $this->row($sql);
    }

    public function updateUserEmail($id, $email)
    {
        $sql = "UPDATE `user` SET `email` = '$email' WHERE `user`.`id` = $id";
        return $this->execute($sql);
    }

    public function saveUser($email, $pass)
    {
        $sql = "INSERT INTO `user` (`id`, `email`, `password`) VALUES (NULL, '$email', '$pass');";
        $this->execute($sql);
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM `user` WHERE `user`.`id` = $id";
        return $this->row($sql);
    }
}