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
  if(isset($_SESSION['user']))
  {
    session_unset('user');
    session_destroy();
    header("Location: index.php");
  }
  else
  {
    header("Location: index.php");
  }
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
  if(isset($_SESSION['user']))
  {
    $userManager = new UserManager();
    $user = $userManager->getUser($_SESSION['user']);
    require("./view/accountView.php");
  }
  else
  {
    header("Location: index.php");
  }
}

function updateAccount()
{
  if(isset($_SESSION['user']))
  {
    $userManager = new UserManager();
    $user = $_SESSION['user'];
  
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
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
  
    if(isset($_POST['name']) AND !empty($_POST['name']))
    {
      $name = htmlspecialchars($_POST['name']);
      if(is_string($name) AND strlen($name) <= 30)
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

    if(isset($_POST['surname']) AND !empty($_POST['surname']))
    {
      $surname = htmlspecialchars($_POST['surname']);
      if(is_string($surname) AND strlen($surname) <= 30)
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
  
    if(isset($_POST['email']) AND !empty($_POST['email']))
    {
      $email = htmlspecialchars($_POST['email']);
      if (is_string($email) AND strlen($email) <= 30)
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
  
    if(isset($_POST['new_password']) AND !empty($_POST['new_password']) AND isset($_POST['confirm_password']) AND !empty($_POST['confirm_password']))
    {
      $new_password = htmlspecialchars($_POST['new_password']);
      $confirm_password = htmlspecialchars($_POST['confirm_password']);

      if(is_string($new_password) AND strlen($new_password) <= 30 AND is_string($confirm_password) AND strlen($confirm_password) <= 30)
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
  }
  else
  {
    header("Location: index.php");
  }
  header("Location: index.php?action=my_account&state=success");
}
