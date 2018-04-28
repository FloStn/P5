<?php
require_once('model/manager/AdminManager.php');
require_once('model/manager/UserManager.php');
require_once('model/manager/CommentManager.php');

function getUsersList()
{
  session_start();
  $adminManager = new AdminManager();
  $userManager = new UserManager();
  $users = $adminManager->getUsersList();
  $admin = $userManager->getUser($_SESSION['user']);

  require('view/usersListView.php');
}

function getBlogPostsList()
{
  session_start();
  $postManager = new PostManager();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  
  $_GET['page'] = intval($_GET['page']);
  $currentPage = $_GET['page'];
  $postsByPage = 6;
  $totalPosts = $postManager->getPostsNumber();
  
  $totalPages = ceil($totalPosts/$postsByPage);
  if($_GET['page'] <= $totalPages)
  {
    $start = ($currentPage-1)*$postsByPage;
  }

  $posts = $postManager->getPosts($start, $postsByPage);

  require('view/blogPostsListView.php');
}

function blogPostEdit()
{
  session_start();
  $postManager = new PostManager();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $post = $postManager->getPost($_GET['id']);
  require('view/blogPostEditView.php');
}

function blogPostUpdate()
{
  session_start();
  $postManager = new PostManager();
  $userManager = new UserManager();
  $post = $_GET['id'];
  $title = $_POST['title'];
  $chapo = $_POST['chapo'];
  $content = $_POST['content'];
  $image = $_FILES['image'];

  if(isset($_FILES['image']) AND !empty($_FILES['image']['name']))
  {
    $tailleMax = 2097152;
    $extensionsValides = array('jpg');
    if($_FILES['image']['size'] <= $tailleMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
        $chemin = "./public/images/blog/posts/img-".$post.".".$extensionUpload;
        $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);

        // PAGE REDIMENSION.PHP

        redimensionner_image($chemin, 1920, 1086);

         if($resultat)
         {
           $postManager->setImg($post, $chemin);
         }
      }
    }
  }
  $postManager->setTitle($post, $title);
  $postManager->setChapo($post, $chapo);
  $postManager->setContent($post, $content);
  $postManager->setLastModifDateTime($post);
}

function blogPostNewEdit()
{
  session_start();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  require('view/blogPostNewView.php');
}

function addPost()
{
  session_start();
  $postManager = new PostManager();
  $title = $_POST['title'];
  $chapo = $_POST['chapo'];
  $content = $_POST['content'];
  $author = $_SESSION['user'];
  $img = "./public/images/blog/posts/default.jpg";

  $postManager->postCreate($title, $chapo, $content, $author, $img);
  $post = $postManager->getPostByTitle($title);

  if(isset($_FILES['image']) AND !empty($_FILES['image']['name']))
  {
    $tailleMax = 2097152;
    $extensionsValides = array('jpg');
    if($_FILES['image']['size'] <= $tailleMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
        $chemin = "./public/images/blog/posts/".$post->idPost().".".$extensionUpload;
        $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);

        // PAGE REDIMENSION.PHP

        redimensionner_image($chemin, 1920, 1086);

        if($resultat)
        {
          $postManager->setImg($post->idPost(), $chemin);
        }
     }
   }
  }
  /*else
  {
    $postManager->setImg($post, $img);
  }*/

}

function blogPostDelete()
{
  session_start();
  $postManager = new PostManager();
  $commentManager = new CommentManager();
  $idPost = $_GET['id'];
  $commentManager->commentsDeleteByPost($idPost);
  $postManager->postDelete($idPost);
}

function getCommentsList()
{
  session_start();
  $commentManager = new CommentManager();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $comments = $commentManager->getAllComments();
  /*$postManager = new PostManager();
  foreach($comments->title() as $row)
  {
    $postManager->
  }*/
  require('view/commentsListView.php');
}

function userEdit()
{
  session_start();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $editUser = $userManager->getUser($_GET['id']);

  require('view/userEditView.php');
}

function userUpdate()
{
  session_start();
  $userManager = new UserManager();
  $idUser = $_GET['id'];
  $updateUser = $userManager->getUser($_GET['id']);

  if(isset($_POST['surname']))
  {
    if(!empty($_POST['surname']))
    {
      if($_POST['surname'] != $updateUser->surname())
      {
        $surname = $_POST['surname'];
        $userManager->setSurname($surname, $idUser);
      }
    }
  }
  if(isset($_POST['name']))
  {
    if(!empty($_POST['name']))
    {
      if($_POST['name'] != $updateUser->name())
      {
        $name = $_POST['name'];
        $userManager->setName($name, $idUser);
      }
    }
  }
  if(isset($_POST['email']))
  {
    if(!empty($_POST['email']))
    {
      if($_POST['email'] != $updateUser->email())
      {
        $email = $_POST['email'];
        $userManager->setEmail($email, $idUser);
      }
    }
  }
  if(isset($_POST['role']))
  {
    if($_POST['role'] == 0 || $_POST['role'] == 1)
    {
      if($_POST['role'] == 0)
      {
        $role = "Utilisateur";
      }
      else
      {
        $role = "Administrateur";
      }
      if($role != $updateUser->role())
      {
      $role = $_POST['role'];
      $userManager->setRole($role, $idUser);
      }
    }
  }
}

function userDelete()
{
  session_start();
  $userManager = new UserManager();
  $commentManager = new CommentManager();
  $idUser = $_GET['id'];
  $commentManager->commentsDeleteByUser($idUser);
  $userManager->userDelete($idUser);
}

function setCommentState()
{
  session_start();
  $commentManager = new CommentManager();
  $idCmt = $_GET['id'];
  $state = $_GET['state'];
  $commentManager->setState($idCmt, $state);
  header('Location: http://127.0.0.1/Blog/index.php?action=adminCommentsList');
}
