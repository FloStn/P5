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
  $postsByPage = 4;
  $totalPosts = $postManager->getPostsNumber();
  
  $totalPages = ceil($totalPosts/$postsByPage);
  if($_GET['page'] <= $totalPages)
  {
    $start = ($currentPage-1)*$postsByPage;
  }

  $posts = $postManager->getPosts($start, $postsByPage);

  require('view/blogHomeView.php');
}

function post()
{
  session_start();
  $postManager = new PostManager();
  $commentManager = new CommentManager();
  $userManager = new UserManager();

  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);
  //$user = $userManager->getUser($_SESSION['user']);
  require('./view/blogPostView.php');
}

function addComment()
{
  session_start();
  $commentManager = new CommentManager();
  $content = $_POST['comment'];
  $author = $_SESSION['user'];
  $post = $_GET['idPost'];
  $commentManager->add($content, $author, $post);
}
