<?php
require_once('model/manager/AdminManager.php');
require_once('model/manager/UserManager.php');
require_once('model/manager/CommentManager.php');

function getUsersList()
{
  $adminManager = new AdminManager();
  $userManager = new UserManager();

  $users = $adminManager->getUsersList();
  $admin = $userManager->getUser($_SESSION['user']);

  require('view/usersListView.php');
}

function getBlogPostsList()
{
  $postManager = new PostManager();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  
  $_GET['page'] = intval($_GET['page']);
  $currentPage = $_GET['page'];
  $postsByPage = 10;
  $totalPosts = $postManager->getPostsCount();
  
  $totalPages = ceil($totalPosts/$postsByPage);
  if($_GET['page'] <= $totalPages)
  {
    $start = ($currentPage-1)*$postsByPage;
    $posts = $postManager->getPosts($start, $postsByPage);
    require('view/blogPostsListView.php');
  }
  else
  {
    header("Location: index.php");
  }
}

function blogPostEdit()
{
  $postManager = new PostManager();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $_GET['id'] = intval($_GET['id']);
  $post = $postManager->getPost($_GET['id']);
  if(!empty($post))
  {
    require('view/blogPostEditView.php');
  }
  else
  {
    header("Location: index.php");
  }
}

function resize_img($file, $width, $height)
{
  global $error;
  $size = getimagesize($file);

  if($size)
  {
    if($size['mime'] == 'image/jpg' || $size['mime'] == 'image/jpeg' || $size['mime'] == 'image/png' || $size['mime'] == 'image/gif')
    {
      //OUVERTURE DE L'IMAGE ORIGINALE
      $img_big = imagecreatefromjpeg($file); // On ouvre l'image d'origine
      $img_new = imagecreate($width, $height);

      //CREATION DE LA MINIATURE
      $img_small = imagecreatetruecolor($width, $height) or $img_small = imagecreate($width, $height);

			//COPIE DE L'IMAGE REDIMENSIONNEE
      imagecopyresized($img_small, $img_big, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
      imagejpeg($img_small, $file);
    }
  }
}

function blogPostUpdate()
{
  session_start();
  $postManager = new PostManager();
  $userManager = new UserManager();
  $post = intval($_GET['id']);
  $title = $_POST['title'];
  $chapo = $_POST['chapo'];
  $content = $_POST['content'];
  $image = $_FILES['image'];

  if(isset($_FILES['image']) && !empty($_FILES['image']['name']))
  {
    $sizeMax = 2097152;
    $extensionsValides = array('jpg');
    if($_FILES['image']['size'] <= $sizeMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
        $path = "./public/images/blog/posts/img-".$post.".".$extensionUpload;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $path);

        resize_img($path, 1920, 1086);

         if($result)
         {
           $postManager->setImg($post, $path);
         }
         else
         {
          throw new Exception("Un problème a été rencontré pendant l'importation de l'image.");
         }
      }
      else
      {
        throw new Exception("L'extension du fichier n'est pas valide. Seule une image de format JPG, JPEG, PNG ou GIF est autorisée.");
      }
    }
    else
    {
      throw new Exception("Le poids de l'image doit être inférieur à 2 MO.");
    }
  }

  if(isset($title) && !empty($title))
  {
    $postManager->setTitle($post, $title);
  }

  if(isset($chapo) && !empty($chapo))
  {
    $postManager->setChapo($post, $chapo);
  }

  if(isset($content) && !empty($content))
  {
    $postManager->setContent($post, $content);
  }
  
  $postManager->setLastModifDateTime($post);
  header("Location: index.php?action=adminBlogPostsList&page=1");
}

function blogPostNewEdit()
{
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  require('view/blogPostNewView.php');
}

function addPost()
{
  $postManager = new PostManager();
  $title = $_POST['title'];
  $chapo = $_POST['chapo'];
  $content = $_POST['content'];
  $author = $_SESSION['user'];
  $img = "./public/images/blog/posts/default.jpg";

  if(isset($title) && isset($chapo) && isset($content) && !empty($title) && !empty($chapo) && !empty($content))
  {
    $postManager->postCreate($title, $chapo, $content, $author, $img);
    $post = $postManager->getPostByTitle($title);
  }
  else
  {
    throw new Exception("Tous les champs doivent être remplis.");
    exit();
  }

  if(isset($_FILES['image']) && !empty($_FILES['image']['name']))
  {
    $sizeMax = 2097152;
    $extensionsValides = array('jpg');
    if($_FILES['image']['size'] <= $sizeMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
        $path = "./public/images/blog/posts/".$post->idPost().".".$extensionUpload;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $path);

        resize_img($path, 1920, 1086);

        if($result)
        {
          $postManager->setImg($post->idPost(), $path);
        }
        else
        {
          throw new Exception("Un problème a été rencontré pendant l'importation de l'image.");
        }
      }
      else
      {
        throw new Exception("L'extension du fichier n'est pas valide. Seule une image de format JPG, JPEG, PNG ou GIF est autorisée.");
      }
    }
    else
    {
      throw new Exception("Le poids de l'image doit être inférieur à 2 MO.");
    }
  }

  header("Location: index.php?action=adminBlogPostsList&page=1");
}

function blogPostDelete()
{
  $postManager = new PostManager();
  $commentManager = new CommentManager();
  $idPost = intval($_GET['id']);
  $post = $postManager->getPost($idPost);
  if(!empty($post))
  {
    $commentManager->commentsDeleteByPost($idPost);
    $postManager->postDelete($idPost);
    header("Location: index.php?action=adminBlogPostsList&page=1");
  }
  else
  {
    header("Location: index.php");
  }
}

function getCommentsList()
{
  $commentManager = new CommentManager();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $comments = $commentManager->getAllComments();

  require('view/commentsListView.php');
}

function userEdit()
{
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $editUser = $userManager->getUser($_GET['id']);

  require('view/userEditView.php');
}

function userUpdate()
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

function userDelete()
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

function setCommentState()
{
  $commentManager = new CommentManager();
  $idCmt = intval($_GET['id']);
  $state = intval($_GET['state']);

  if(!empty($commentManager->getComment($idCmt)))
  {
    $commentManager->setState($idCmt, $state);
    header("Location: index.php?action=adminCommentsList");
  }
  else
  {
    header("Location: index.php?action=adminCommentsList");
  }
}
