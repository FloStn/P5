<?php

require('controller/BlogController.php');
require('controller/UserController.php');
require('controller/AdminController.php');

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
      session_start();
      if (!isset($_SESSION['user']))
      {
        if (isset($_GET['state']))
        {
          if ($_GET['state'] == 'success' || $_GET['state'] == 'error' || $_GET['state'] == 'error_email_already_use')
          {
            require("view/signupView.php");
          }
          else
          {
            header("Location: index.php");
            exit();
          }
        }
        else
        {
        require("view/signUpView.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'signup')
    {
      session_start();
      if (!isset($_SESSION['user']))
      {
        signUp();
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'signin_view')
    {
      session_start();
      if (!isset($_SESSION['user']))
      {
        if (isset($_GET['state']))
        {
          if ($_GET['state'] == 'success' || $_GET['state'] == 'error')
          {
            require("view/signinView.php");
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          require("view/signinView.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'signin')
    {
      session_start();
      if (!isset($_SESSION['user']))
      {
      signIn();
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'deconnection')
    {
      session_start();
      if (isset($_SESSION['user']))
      {
        deconnection();
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'forgot_password_view')
    {
      session_start();
      if (!isset($_SESSION['user']))
      {
        if (isset($_GET['state']))
        {
          if ($_GET['state'] == 'success' || $_GET['state'] == 'error' || $_GET['state'] == 'unknown_error')
          {
            require("view/forgotPasswordView.php");
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          require("view/forgotPasswordView.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'forgotPassword')
    {
      session_start();
      if (!isset($_SESSION['user']))
      {
        forgotPassword();
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'my_account')
    {
      session_start();
      if (isset($_SESSION['user']))
      {
        if (isset($_GET['state']))
        {
          if ($_GET['state'] == 'success')
          {
            getInfos();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          getInfos();
        }
      }
      else
      {
        header("Location: index.php");
      }
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
      session_start();
      if (isset($_SESSION['user']))
      {
        updateAccount();
      }
      else
      {
        header("Location: index.php");
      }
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
