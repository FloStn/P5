<?php

require_once('model/manager/PostManager.php');
require_once('model/manager/CommentManager.php');
require_once('model/manager/UserManager.php');

function listPosts()
{
  session_start();
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

function post()
{
  session_start();
  $postManager = new PostManager();
  $commentManager = new CommentManager();
  $userManager = new UserManager();

  $_GET['id'] = intval($_GET['id']);
  $totalPosts = $postManager->getPostsCount();
  if($_GET['id'] <= $totalPosts)
  {
    $post = $postManager->getPost($_GET['id']);
    $author = $userManager->getUser($post->author());
    $comments = $commentManager->getComments($_GET['id']);
    require('view/blogPostView.php');
  }
  else
  {
    header("Location: index.php");
  }
}

function addComment()
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
