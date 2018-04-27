<?php

require_once('model/manager/UserManager.php');

function signUp()
{
  if(!isset($_SESSION['user']))
  {
    if(isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['email']) AND isset($_POST['password']))
    {
      $name = htmlspecialchars($_POST['name']);
      $surname = htmlspecialchars($_POST['surname']);
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);

      if(!empty($name) AND !empty($surname) AND !empty($email) AND !empty($password))
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
  else
  {
    header("Location: index.php");
  }
}

function signIn()
{
  session_start();
  if(!isset($_SESSION['user']))
  {
    if(isset($_POST['email']) AND isset($_POST['password']))
    {
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);

      if(!empty($email) AND !empty($password))
      {
        $userManager = new UserManager();
        $infosConnection = $userManager->getUserByEmail($email);

        if(!empty($infosConnection))
        {
          $isPasswordCorrect = password_verify($password, $infosConnection->password());

          if($isPasswordCorrect)
          {
            $user = $infosConnection;
            session_start();
            $_SESSION['user'] = $user->idUser();
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
  else
  {
    header("Location: index.php");
  }
}

function deconnection()
{
  session_start();
  session_unset('user');
  session_destroy();
}

function forgotPassword()
{
  session_start();
  if(!isset($_SESSION['user']))
  {
    if(isset($_POST['email']) AND !empty($_POST['email']))
    {
      $email = htmlspecialchars($_POST['email']);
      $userManager = new UserManager();
      $user = $userManager->getUserByEmail($email);
      if(!empty($user))
      {
        $from_email = 'flo.stein9578@yahoo.fr';
        $name = $user->name();
        $size_password = 12;
        $new_password = $userManager->genPassword($size_password);
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
  else
  {
    header("Location: index.php?action=forgot_password_view&state=error");
  }
}

function getInfos()
{
  session_start();
  //session_regenerate_id();
  $userManager = new UserManager();
  $user = $userManager->getUser($_SESSION['user']);
  require("./view/accountView.php");
}

function updateAccount()
{
  session_start();
  $userManager = new UserManager();
  //$user = $userManager->getUser($_SESSION['user']);
  $user = $_SESSION['user'];
  //$userModel = new UserModel($user);

  if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
  {
    $tailleMax = 2097152;
    $extensionsValides = array('jpg');
    if($_FILES['avatar']['size'] <= $tailleMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
        $chemin = "./public/images/avatars/".$_SESSION['user'].".".$extensionUpload;
        $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat)
         {
           $userManager->setAvatar($chemin, $user);
         }
      }
    }
  }

  if(isset($_POST['name']))
  {
    $name = $_POST['name'];
    if(is_string($name) && strlen($name) <= 30)
    {
      $userManager->setName($name, $user);
    }
  }

  if(isset($_POST['email']))
  {
    $email = $_POST['email'];
    if (is_string($email) && strlen($email) <= 30)
    {
      $userManager->setEmail($email, $user);
    }
  }

  if(isset($_POST['new_password']) && isset($_POST['confirm_password']))
  {
    if(is_string($_POST['new_password']) && strlen($_POST['new_password']) <= 30 && is_string($_POST['confirm_password']) && strlen($_POST['confirm_password']) <= 30)
    {
      if($_POST['new_password'] == $_POST['confirm_password'])
      {
        $password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $userManager->setPassword($password_hash, $user);
      }
    }
  }
}
