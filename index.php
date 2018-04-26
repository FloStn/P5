<?php

require('controller/BlogController.php');
require('controller/UserController.php');
require('controller/AdminController.php');
require('controller/ViewController.php');

try
{
  if (isset($_GET['action']))
  {
    if ($_GET['action'] == 'listPosts')
    {
      //if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0)
      //{

      //}
      //else
      //{
         
      //}
      listPosts();
    }
    elseif ($_GET['action'] == 'post')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        post();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'signup_view')
    {
      require("view/signUpView.php");
    }
    elseif ($_GET['action'] == 'signup')
    {
      signUp();
    }
    elseif ($_GET['action'] == 'signin_view')
    {
      require("view/signInView.php");
    }
    elseif ($_GET['action'] == 'signin')
    {
      signIn();
    }
    elseif ($_GET['action'] == 'deconnection')
    {
      deconnection();
    }
    elseif ($_GET['action'] == 'forgot_password_view')
    {
      if (isset($_GET['state']))
      {
        if ($_GET['state'] == 'success' || $_GET['state'] == 'error' || $_GET['state'] == 'unknown_error')
        {
          require("view/forgotPasswordView.php");
        }
        else
        {
          throw new Exception('Etat inconnu');
        }
      }
      else
      {
        require("view/forgotPasswordView.php");
      }
    }
    elseif ($_GET['action'] == 'forgotPassword')
    {
      forgotPassword();
    }
    elseif ($_GET['action'] == 'personnal_space')
    {
      getInfos();
    }
    elseif ($_GET['action'] == 'adminBlogPostsList')
    {
      getBlogPostsList();
    }
    elseif ($_GET['action'] == 'adminBlogPostEdit')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        blogPostEdit();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'adminBlogPostUpdate')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        blogPostUpdate();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'adminBlogPostDelete')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        blogPostDelete();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'adminBlogPostNewEdit')
    {
        blogPostNewEdit();
    }
    elseif ($_GET['action'] == 'adminCreateNewPost')
    {
        addPost();
    }
    elseif ($_GET['action'] == 'adminUsersList')
    {
      getUsersList();
    }
    elseif ($_GET['action'] == 'adminCommentsList')
    {
      getCommentsList();
    }
    elseif ($_GET['action'] == 'adminUserEdit')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        userEdit();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'adminUserDelete')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        userDelete();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'adminCommentState')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        if (isset($_GET['state']) && $_GET['state'] == 0 || $_GET['state'] == 1)
        {
          setCommentState();
        }
        else
        {
          throw new Exception('Aucun identifiant envoyé');
        }
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'newComment')
    {
      if (isset($_GET['idPost']) && $_GET['idPost'] > 0)
      {
        addComment();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'userUpdate')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        userUpdate();
      }
      else
      {
        throw new Exception('Aucun identifiant envoyé');
      }
    }
    elseif ($_GET['action'] == 'updateAccount')
    {
      updateAccount();
    }
  }
  else
  {
    require('view/HomeView.php');
  }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
