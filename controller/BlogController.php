<?php

require_once('model/manager/PostManager.php');
require_once('model/manager/CommentManager.php');
require_once('model/manager/UserManager.php');

class BlogController
{
public function listPosts()
{
  $postManager = new PostManager();
  $_GET['page'] = intval($_GET['page']);
  $currentPage = $_GET['page'];
  $postsByPage = 10;
  $totalPosts = $postManager->getPostsCount();
  
  $totalPages = ceil($totalPosts/$postsByPage);
  if($_GET['page'] <= $totalPages)
  {
    $start = ($currentPage-1)*$postsByPage;
    $posts = $postManager->getPosts($start, $postsByPage);
    require('view/blogHomeView.php');
  }
  else
  {
    header("Location: index.php");
  }
}

public function post()
{
  $postManager = new PostManager();
  $commentManager = new CommentManager();
  $userManager = new UserManager();

  $_GET['id'] = intval($_GET['id']);
  $post = $postManager->getPost($_GET['id']);
  if(!empty($post))
  {
    $author = $userManager->getUser($post->author());
    $comments = $commentManager->getComments($_GET['id']);
    require('view/blogPostView.php');
  }
  else
  {
    header("Location: index.php");
  }
}

public function addComment()
{
    $content = htmlspecialchars($_POST['comment']);
    if(!empty($content))
    {
      $commentManager = new CommentManager();
      $author = $_SESSION['user'];
      $post = intval($_GET['idPost']);
      $commentManager->add($content, $author, $post);
      header("Location: index.php?action=post&id=$post&state=success");
    }
    else
    {
      header("Location: index.php");
    }
}

public function blogPostsList()
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

public function blogPostEdit()
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

public function blogPostUpdate()
{
  $postManager = new PostManager();
  $post = intval($_GET['id']);
  $title = $_POST['title'];
  $chapo = $_POST['chapo'];
  $content = $_POST['content'];
  $image = $_FILES['image'];

  if(isset($_FILES['image']) && !empty($_FILES['image']['name']))
  {
    $sizeMax = 2000000;
    $extensionsValides = array('jpg');
    if($_FILES['image']['size'] <= $sizeMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
        $path = "./public/images/blog/posts/".$post.".".$extensionUpload;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $path);

        include("helper/resize_img.php");
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
        throw new Exception("L'extension du fichier n'est pas valide. Seule une image de format JPG est autorisée.");
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

public function blogPostNewEdit()
{
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  require('view/blogPostNewView.php');
}

public function blogPostAdd()
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
    $sizeMax = 2000000;
    $extensionsValides = array('jpg');
    if($_FILES['image']['size'] <= $sizeMax)
    {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides))
      {
        $path = "./public/images/blog/posts/".$post->idPost().".".$extensionUpload;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $path);

        include("helper/resize_img.php");
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
        throw new Exception("L'extension du fichier n'est pas valide. Seule une image de format JPG est autorisée.");
      }
    }
    else
    {
      throw new Exception("Le poids de l'image doit être inférieur à 2 MO.");
    }
  }

  header("Location: index.php?action=adminBlogPostsList&page=1");
}

public function blogPostDelete()
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

public function commentsList()
{
  $commentManager = new CommentManager();
  $userManager = new UserManager();
  $admin = $userManager->getUser($_SESSION['user']);
  $comments = $commentManager->getAllComments();

  require('view/commentsListView.php');
}

public function setCommentState()
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
}
