<?php

require_once("Manager.php");
require_once("model/CommentModel.php");

class CommentManager extends Manager
{
  public function add($content, $author, $post)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO comments(content, author, post, addDateTime, state) VALUES(:content, :author, :post, NOW(), 0)');
    $req->execute(array(
      ':content' => $content,
      ':author' => $author,
      ':post' => $post));

    $req->closeCursor();
  }

  public function commentsDeleteByUser($user)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE author = :user');
    $req->execute(array(
      'user' => $user));

    $req->closeCursor();
  }

  public function commentsDeleteByPost($post)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE post = :post');
    $req->execute(array(
      'post' => $post));

    $req->closeCursor();
  }

  public function setState($comment, $state)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE comments SET state = :state WHERE idCmt = :comment');
    $req->execute(array(
      ':state' => $state,
      ':comment' => $comment));

    $req->closeCursor();
  }

  public function getAllComments()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT comments.idCmt, comments.content, comments.author, comments.post, DATE_FORMAT(comments.addDateTime, \'%d/%m/%Y à %Hh%i\') AS addDateTimeFr, comments.state, users.name, users.surname, posts.title FROM comments JOIN users ON comments.author = users.idUser JOIN posts ON comments.post = posts.idPost ORDER BY addDateTimeFr DESC');
    
    $comments = [];
    foreach($req->fetchAll() as $row)
    {
      $commentModel = new CommentModel($row);
      $userModel = new UserModel($row);
      $postModel = new PostModel($row);
      $commentModel->setAuthorModel($userModel);
      $commentModel->setTitleModel($postModel);
      $comments[] = $commentModel;
    }
    $req->closeCursor();
    return $comments;
  }

  public function getComments($idPost)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idCmt, content, author, post, DATE_FORMAT(addDateTime, \'%d/%m/%Y à %Hh%i\') AS addDateTimeFr, state, users.name, users.surname, users.avatar FROM comments JOIN users ON comments.author = users.idUser WHERE post = :post ORDER BY addDateTimeFr DESC');
    $req->execute(array(
      ':post' => $idPost));
    $comment = [];
    foreach($req->fetchAll() as $row)
    {
      $commentModel = new CommentModel($row);
      $userModel = new UserModel($row);
      $commentModel->setAuthorModel($userModel);
      $commentModel->setAvatarModel($userModel);
      $comment[] = $commentModel;
    }
    $req->closeCursor();
    return $comment;
  }

  public function getComment($idComment)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idCmt, content, author, post, DATE_FORMAT(addDateTime, \'%d/%m/%Y à %Hh%i\') AS addDateTimeFr, state, users.name, users.surname, users.avatar FROM comments JOIN users ON comments.author = users.idUser WHERE idCmt = :comment ORDER BY addDateTimeFr DESC');
    $req->execute(array(
      ':comment' => $idComment));

    if($req->rowCount() > 0)
    {
      $comment = $req->fetch();
      $commentModel = new CommentModel($comment);
      $req->closeCursor();
      return $commentModel;
    }
    else
    {
      $req->closeCursor();
      return;
    }
  }

  public function getAuthorModel($comment)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT comments.*,users.name, users.surname FROM comments JOIN users ON comments.author = users.idUser WHERE comments.idCmt = ?');
    $req->execute(array(
    'comment' => $comment));
    $post = $req->fetch();

    $commentModel = new CommentModel($comment);
    $userModel = new UserModel($comment);
    $commentModel->setAuthorModel($userModel);
    $req->closeCursor();
    return $commentModel;
  }
}
