<?php

class CommentModel
{
  private $_idCmt;
  private $_content;
  private $_author;
  private $_post;
  private $_addDateTime;
  private $_state;
  private $_authorModel;
  private $_titleModel;
  private $_avatarModel;

  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  public function idCmt()
  {
    return $this->_idCmt;
  }

  public function content()
  {
    return $this->_content;
  }

  public function author()
  {
    return $this->_author;
  }

  public function post()
  {
    return $this->_post;
  }

  public function addDateTimeFr()
  {
    return $this->_addDateTime;
  }

  public function state()
  {
    if ($this->_state == '0')
    {
      $this->_state = 'En attente de validation';
      return $this->_state;
    }
    else
    {
      $this->_state = 'Validé';
      return $this->_state;
    }
  }

  public function authorModel()
  {
    return $this->_authorModel;
  }

  public function titleModel()
  {
    return $this->_titleModel;
  }

  public function avatarModel()
  {
    return $this->_avatarModel;
  }

  public function setIdCmt($idCmt)
  {
    $this->_idCmt = (int) $idCmt;
  }

  public function setContent($content)
  {
    if (is_string($content))
    {
    $this->_content = $content;
    }
  }

  public function setAuthor($author)
  {
      $this->_author = (int) $author;
  }

  public function setPost($post)
  {
      $this->_post = (int) $post;
  }

  public function setAddDateTimeFr($addDateTime)
  {
      $this->_addDateTime = $addDateTime;
  }

  public function setState($state)
  {
    $this->_state = (int) $state;
  }

  public function setAuthorModel($authorModel)
  {
    $this->_authorModel = $authorModel;
  }

  public function setTitleModel($titleModel)
  {
    $this->_titleModel = $titleModel;
  }

  public function setAvatarModel($avatarModel)
  {
    $this->_avatarModel = $avatarModel;
  }
}
