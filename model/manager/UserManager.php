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

  public function checkIfEmailExist($email)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT email FROM users WHERE email = :email');
    $req->execute(array(
      ':email' => $email));
    $result = $req->rowCount();
    if($result > 0)
    {
      $req->closeCursor();
      return 1;
    }
    else
    {
      $req->closeCursor();
      return;
    }
  }

  public function getUserByEmail($email)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idUser, name, surname, email, password, avatar, role FROM users WHERE email = :email');
    $req->execute(array(
      'email' => $email));
    if($req->rowCount() > 0)
    {
      $user = $req->fetch();
      $userModel = new UserModel($user);
      $req->closeCursor();
      return $userModel;
    }
    else
    {
      $req->closeCursor();
      return;
    }
  }

  public function genPassword($size)
  {
    // Initialisation des caractères utilisables
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    $password = "";

    for($i=0;$i<$size;$i++)
    {
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }
		
    return $password;
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
