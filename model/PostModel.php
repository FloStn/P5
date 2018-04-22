<?php

class PostModel
{
  private $_idPost;
  private $_img;
  private $_title;
  private $_chapo;
  private $_content;
  private $_author;
  private $_addDateTimeFr;
  private $_lastModifDateTimeFr;
  private $_lastModifAuthor;

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

  public function idPost()
  {
    return $this->_idPost;
  }

  public function img()
  {
    return $this->_img;
  }

  public function title()
  {
    return $this->_title;
  }

  public function chapo()
  {
    return $this->_chapo;
  }

  public function content()
  {
    return $this->_content;
  }

  public function author()
  {
    return $this->_author;
  }

  public function addDateTimeFr()
  {
    return $this->_addDateTimeFr;
  }
  public function lastModifDateTimeFr()
  {
    return $this->_lastModifDateTimeFr;
  }

  public function lastModifAuthor()
  {
    return $this->_lastModifAuthor;
  }

  public function setIdPost($idPost)
  {
    $this->_idPost = (int) $idPost;
  }

  public function setImg($img)
  {
    if (is_string($img) && strlen($img) <= 45)
    {
    $this->_img = $img;
    }
  }

  public function setTitle($title)
  {
    if (is_string($title) && strlen($title) <= 60)
    {
      $this->_title = $title;
    }
  }

  public function setChapo($chapo)
  {
    if (is_string($chapo))
    {
      $this->_chapo = $chapo;
    }
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

  public function setAddDateTimeFr($addDateTimeFr)
  {
    $this->_addDateTimeFr = $addDateTimeFr;
  }

  public function setLastModifDateTimeFr($lastModifDateTimeFr)
  {
    $this->_lastModifDateTimeFr = $lastModifDateTimeFr;
  }

  public function setLastModifAuthor($lastModifAuthor)
  {
    $this->_lastModifAuthor = (int) $lastModifAuthor;
  }
}
