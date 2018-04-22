<?php

require_once("Manager.php");
require_once("model/UserModel.php");

class UserManager extends Manager
{
  public function getUser($idUser)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idUser, name, surname, email, password, avatar, role FROM users WHERE idUser = :idUser');
    $req->execute(array(
      'idUser' => $idUser));
    $user = $req->fetch();
    $userModel = new UserModel($user);

    $req->closeCursor();

    return $userModel;
  }

  public function userDelete($user)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM users WHERE idUser = :user');
    $req->execute(array(
      'user' => $user));

    $req->closeCursor();
  }

  public function signUp($name, $surname, $email, $pass)
  {
    $role = 0;
    $avatar = "./public/images/avatars/default.jpg";
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO users(name, surname, email, password, role, avatar) VALUES(:name, :surname, :email, :pass, :role, :avatar)');
    $req->execute(array(
    ':name' => $name,
    ':surname' => $surname,
    ':email' => $email,
    ':pass' => $pass,
    ':role' => $role,
    ':avatar' => $avatar));

    $req->closeCursor();
  }

  public function signIn($email, $pass)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idUser, password FROM users WHERE email = :email');
    $req->execute(array(
        'email' => $email));
    $result = $req->fetch();
    $req->closeCursor();

    return $result;
  }

  public function setAvatar($avatar, $user)
  {
     $db = $this->dbConnect();
     $req = $db->prepare('UPDATE users SET avatar = :avatar WHERE idUser = :user');
     $req->execute(array(
     'avatar' => $avatar,
     'user' => $user));

     $req->closeCursor();
  }

  public function getAvatar($user)
  {
     $db = $this->dbConnect();
     $req = $db->prepare('SELECT avatar FROM users WHERE idUser = :user');
     $req->execute(array(
     'user' => $user));
     $result = $req->fetch();
     $req->closeCursor();

     return $result;
  }

  public function setSurname($surname, $user)
  {
     $db = $this->dbConnect();
     $req = $db->prepare('UPDATE users SET surname = :surname WHERE idUser = :user');
     $req->execute(array(
     'surname' => $surname,
     'user' => $user));

     $req->closeCursor();
  }

  public function setName($name, $user)
  {
     $db = $this->dbConnect();
     $req = $db->prepare('UPDATE users SET name = :name WHERE idUser = :user');
     $req->execute(array(
     'name' => $name,
     'user' => $user));

     $req->closeCursor();
  }

  public function setEmail($email, $user)
  {
     $db = $this->dbConnect();
     $req = $db->prepare('UPDATE users SET email = :email WHERE idUser = :user');
     $req->execute(array(
     'email' => $email,
     'user' => $user));

     $req->closeCursor();
  }

  public function setPassword($password, $user)
  {
     $db = $this->dbConnect();
     $req = $db->prepare('UPDATE users SET password = :password WHERE idUser = :user');
     $req->execute(array(
     'password' => $password,
     'user' => $user));

     $req->closeCursor();
  }

  public function setRole($role, $user)
  {
     $db = $this->dbConnect();
     $req = $db->prepare('UPDATE users SET role = :role WHERE idUser = :user');
     $req->execute(array(
     'role' => $role,
     'user' => $user));

     $req->closeCursor();
  }
}
