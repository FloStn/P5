<?php

require_once("Manager.php");
require_once("model/PostModel.php");

class PostManager extends Manager
{
  public function setTitle($post, $title)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET title = :title WHERE idPost = :post');
    $req->execute(array(
      'title' => $title,
      'post' => $post));

    $req->closeCursor();
  }

  public function setChapo($post, $chapo)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET chapo = :chapo WHERE idPost = :post');
    $req->execute(array(
      'chapo' => $chapo,
      'post' => $post));

    $req->closeCursor();
  }

  public function setContent($post, $content)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET content = :content WHERE idPost = :post');
    $req->execute(array(
      'content' => $content,
      'post' => $post));

    $req->closeCursor();
  }

  public function setImg($post, $image)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET img = :image WHERE idPost = :post');
    $req->execute(array(
    'image' => $image,
    'post' => $post));

    $req->closeCursor();
  }

  public function setLastModifDateTime($post)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET lastModifDateTime = NOW() WHERE idPost = :post');
    $req->execute(array(
    'post' => $post));

    $req->closeCursor();
  }

  public function postCreate($title, $chapo, $content, $author, $img)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO posts(title, chapo, content, author, img, addDateTime) VALUES(:title, :chapo, :content, :author, :img, NOW())');
    $req->execute(array(
    ':title' => $title,
    ':chapo' => $chapo,
    ':content' => $content,
    ':author' => $author,
    ':img' => $img));

    $req->closeCursor();
  }

  public function getId($title)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idPost FROM posts WHERE title = :title');
    $req->execute(array(
      ':title' => $title));
    $idPost = $req->fetch();

    return $idPost;
  }

  public function getPostByTitle($title)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idPost, img, title, chapo, author, content, DATE_FORMAT(addDateTime, \'%d/%m/%Y à %Hh%i\') AS addDateTimeFr, DATE_FORMAT(lastModifDateTime, \'%d/%m/%Y à %Hh%i\') AS lastModifDateTimeFr FROM posts WHERE title = :title');
    $req->execute(array(
      ':title' => $title));
    $post = $req->fetch();
    $postModel = new PostModel($post);

    return $postModel;
  }

  public function postDelete($post)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM posts WHERE idPost = :post');
    $req->execute(array(
      'post' => $post));

    $req->closeCursor();
  }

  public function getPostsNumber()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT idPost FROM posts');
    $row_number = $req->rowCount();

    $req->closeCursor();
    return $row_number;
  }

  public function getPosts($start, $postsByPage)
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT idPost, title, chapo, content, author, img, DATE_FORMAT(addDateTime, \'%d/%m/%Y à %Hh%i\') AS addDateTimeFr, DATE_FORMAT(lastModifDateTime, \'%d/%m/%Y à %Hh%i\') AS lastModifDateTimeFr FROM posts ORDER BY idPost DESC LIMIT '.$start.','.$postsByPage);
    $post = [];
    foreach($req->fetchAll() as $row)
    {
    $postModel = new PostModel($row);
    $post[] = $postModel;
    }
    $req->closeCursor();
    return $post;
  }

  public function getPost($idPost)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idPost, img, title, chapo, author, content, DATE_FORMAT(addDateTime, \'%d/%m/%Y à %Hh%i\') AS addDateTimeFr, DATE_FORMAT(lastModifDateTime, \'%d/%m/%Y à %Hh%i\') AS lastModifDateTimeFr FROM posts WHERE idPost = ?');
    $req->execute(array($idPost));
    $post = $req->fetch();
    $postModel = new PostModel($post);

    return $postModel;
  }
}
