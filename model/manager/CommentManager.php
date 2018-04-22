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

  public function getTitlePostsComments()
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT comments.*,posts.title FROM comments JOIN posts ON comments.post = posts.idPost');
    $req->execute(array(
    'post' => $post));
    $result = $req->fetch();

    $req->closeCursor();
    return $result;
  }

  public function getAllComments()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT idCmt, content, author, post, DATE_FORMAT(addDateTime, \'%d/%m/%Y à %Hh%i %ssec\') AS addDateTimeFr, state FROM comments ORDER BY addDateTimeFr DESC');
    $comment = [];
    foreach($req->fetchAll() as $row)
    {
    $commentModel = new CommentModel($row);
    $comment[] = $commentModel;
    }
    $req->closeCursor();
    return $comment;
  }

  public function getComments($idPost)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT idCmt, content, author, post, DATE_FORMAT(addDateTime, \'%d/%m/%Y à %Hh%i\') AS addDateTimeFr, state FROM comments WHERE post = :post ORDER BY addDateTimeFr ASC');
    $req->execute(array(
      ':post' => $idPost));
    $comment = [];
    foreach($req->fetchAll() as $row)
    {
    $commentModel = new CommentModel($row);
    $comment[] = $commentModel;
    }
    $req->closeCursor();
    return $comment;
  }
}
