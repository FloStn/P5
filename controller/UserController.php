<?php

require_once('model/manager/UserManager.php');

class UserController
{
 public function signup()
{
  if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']))
  {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(!empty($name) && !empty($surname) && !empty($email) && !empty($password))
    {
      $userManager = new UserManager();

      if(empty($userManager->checkIfEmailExist($email)))
      {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->signUp($name, $surname, $email, $password_hash);
        header("Location: index.php?action=signup_view&state=success");
      }
      else
      {
        header("Location: index.php?action=signup_view&state=error_email_already_use");
      }
    }
    else
    {
      header("Location: index.php?action=signup_view&state=error");
    }
  }
  else
  {
    header("Location: index.php?action=signup_view&state=error");
  }
}

public function signin()
{
  if(isset($_POST['email']) && isset($_POST['password']))
  {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(!empty($email) && !empty($password))
    {
      $userManager = new UserManager();
      $infosConnection = $userManager->getUserByEmail($email);

      if(!empty($infosConnection))
      {
        $isPasswordCorrect = password_verify($password, $infosConnection->password());

        if($isPasswordCorrect)
        {
          $user = $infosConnection;
          $_SESSION['user'] = $user->idUser();
          $_SESSION['role'] = $user->role();
          header("Location: index.php");
        }
        else
        {
          header("Location: index.php?action=signin_view&state=error");
        }
      }
      else
      {
        header("Location: index.php?action=signin_view&state=error");
      }
    }
    else
    {
      header("Location: index.php?action=signin_view&state=error");
    }
  }
  else
  {
    header("Location: index.php?action=signin_view&state=error");
  }
}

public function deconnection()
{
  session_unset('user');
  session_unset('role');
  session_destroy();
  header("Location: index.php");
}

public function forgotPassword()
{
  if(isset($_POST['email']) && !empty($_POST['email']))
  {
    $email = htmlspecialchars($_POST['email']);
    $userManager = new UserManager();
    $user = $userManager->getUserByEmail($email);
    if(!empty($user))
    {
      $from_email = 'flo.stein9578@yahoo.fr';
      $name = $user->name();
      $size_password = 12;
      require("helper/password_gen.php");
      $new_password = genPassword($size_password);
      $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    
      $emailTo = $email;
      $subject = 'Réinitialisation de votre mot de passe - Blog Projet 5 OpenClassrooms.';
      $body = "Bonjour $name, \n\nVoici votre nouveau mot de passe : $new_password \n\nSi celui-ci ne vous convient pas, vous pouvez le modifier dans vos paramètres de compte. \n\nA bientôt !";
      $headers = 'From: '.$from_email."\r\n" .
                 'Reply-To: '.$from_email."\r\n";
      
      if (mail($emailTo, $subject, $body, $headers))
      {
        $userManager->setPassword($new_password_hash, $user->idUser());
        header("Location: index.php?action=forgot_password_view&state=success");
      }
      else
      {
        header("Location: index.php?action=forgot_password_view&state=unknown_error");
      }
    }
    else
    {
      header("Location: index.php?action=forgot_password_view&state=error");
    }
  }
  else
  {
    header("Location: index.php?action=forgot_password_view&state=error");
  }
}

public function account()
{
  $userManager = new UserManager();
  $user = $userManager->getUser($_SESSION['user']);
  require("./view/accountView.php");
}

public function updateAccount()
{
  $userManager = new UserManager();
  $user = $_SESSION['user'];
  
  if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name']))
  {
    $sizeMax = 2097152;
    $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if($_FILES['avatar']['size'] <= $sizeMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $validExtensions))
      {
        $path = "./public/images/avatars/".$_SESSION['user'].".".$extensionUpload;
        $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

        if($result)
        {
          $userManager->setAvatar($path, $user);
        }
        else
        {
          header("Refresh: 3; url=index.php?action=my_account");
          throw new Exception("Un problème est survenu lors de l'importation de l'image.");
          exit();
        }
      }
      else
      {
        header("Refresh: 3; url=index.php?action=my_account");
        throw new Exception("L'image doit être de type jpg, jpeg, png ou gif.");
        exit();
      }
    }
    else
    {
      header("Refresh: 3; url=index.php?action=my_account");
      throw new Exception("La taille de l'image doit être inférieure à 2 MO.");
      exit();
    }
  }
  
  if(isset($_POST['name']) && !empty($_POST['name']))
  {
    $name = htmlspecialchars($_POST['name']);
    if(is_string($name) && strlen($name) <= 30)
    {
      $userManager->setName($name, $user);
    }
    else
    {
      header("Refresh: 3; url=index.php?action=my_account");
      throw new Exception("Votre prénom est trop long... =(");
      exit();
    }
  }

  if(isset($_POST['surname']) && !empty($_POST['surname']))
  {
    $surname = htmlspecialchars($_POST['surname']);
    if(is_string($surname) && strlen($surname) <= 30)
    {
      $userManager->setSurname($surname, $user);
    }
    else
    {
      header("Refresh: 3; url=index.php?action=my_account");
      throw new Exception("Votre nom est trop long... =(");
      exit();
    }
  }
  
  if(isset($_POST['email']) && !empty($_POST['email']))
  {
    $email = htmlspecialchars($_POST['email']);
    if (is_string($email) && strlen($email) <= 30)
    {
      $userManager->setEmail($email, $user);
    }
    else
    {
      header("Refresh: 3; url=index.php?action=my_account");
      throw new Exception("Votre email est trop long... =(");
      exit();
    }
  }
  
  if(isset($_POST['new_password']) && !empty($_POST['new_password']) && isset($_POST['confirm_password']) && !empty($_POST['confirm_password']))
  {
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    if(is_string($new_password) && strlen($new_password) <= 30 && is_string($confirm_password) && strlen($confirm_password) <= 30)
    {
      if($new_password == $confirm_password)
      {
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $userManager->setPassword($password_hash, $user);
      }
      else
      {
        header("Refresh: 3; url=index.php?action=my_account");
        throw new Exception("Le mots de passe ne concordent pas.");
        exit();
      }
    }
    else
    {
      header("Refresh: 3; url=index.php?action=my_account");
      throw new Exception("Le mot de passe ne doit pas dépasser 30 caractères.");
      exit();
    }
  }
  
  header("Location: index.php?action=my_account&state=success");
}

public function usersList()
{
  $userManager = new UserManager();

  $users = $userManager->getUsersList();
  $admin = $userManager->getUser($_SESSION['user']);

  require('view/usersListView.php');
}

public function userEdit()
{
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $editUser = $userManager->getUser($_GET['id']);

  require('view/userEditView.php');
}

public function userUpdate()
{
  $userManager = new UserManager();
  $idUser = intval($_GET['id']);
  $updateUser = $userManager->getUser($_GET['id']);

  $surname = htmlspecialchars($_POST['surname']);
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $role = htmlspecialchars($_POST['role']);

  if(isset($surname))
  {
    if(!empty($surname))
    {
      if($surname != $updateUser->surname())
      {
        $userManager->setSurname($surname, $idUser);
      }
    }
  }

  if(isset($name))
  {
    if(!empty($name))
    {
      if($name != $updateUser->name())
      {
        $userManager->setName($name, $idUser);
      }
    }
  }
  if(isset($email))
  {
    if(!empty($email))
    {
      if($email != $updateUser->email())
      {
        $userManager->setEmail($email, $idUser);
      }
    }
  }
  if(isset($role))
  {
    if($role == 0 || $role == 1)
    {
      if($role == 0)
      {
        $role_str = "Utilisateur";
      }
      else
      {
        $role_str = "Administrateur";
      }

      if($role_str != $updateUser->role())
      {
        $userManager->setRole($role, $idUser);
      }
    }
  }

  header("Location: index.php?action=adminUsersList");
}

public function userDelete()
{
  $userManager = new UserManager();
  $commentManager = new CommentManager();
  $idUser = intval($_GET['id']);

  if(!empty($userManager->getUser($idUser)))
  {
    $commentManager->commentsDeleteByUser($idUser);
    $userManager->userDelete($idUser);
    header("Location: index.php?action=adminUsersList");
  }
  else
  {
    header("Location: index.php?action=adminUsersList");
  }
}
}
