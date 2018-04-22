<?php

require_once("Manager.php");
require_once("model/UserModel.php");

class AdminManager extends Manager
{
  public function getUsersList()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT idUser, name, surname, email, role FROM users ORDER BY idUser ASC');
    $user = [];
    foreach($req->fetchAll() as $row)
    {
    $userModel = new UserModel($row);
    $user[] = $userModel;
    }
    $req->closeCursor();
    return $user;
  }
}
