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
      listPosts();
    }
    elseif ($_GET['action'] == 'post')
    {
      if (isset($_GET['id']) && $_GET['id'] > 0)
      {
        if (isset($_GET['state']))
        {
          if ($_GET['state'] == 'error' || $_GET['state'] == 'success')
          {
            post();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          post();
        }
      }
      else
      {
        header("Location: index.php");
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
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          if(isset($_GET['page']) && $_GET['page'] > 0)
          {
            getBlogPostsList();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminBlogPostEdit')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            blogPostEdit();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminBlogPostUpdate')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            blogPostUpdate();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminBlogPostDelete')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            blogPostDelete();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminBlogPostNewEdit')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          blogPostNewEdit();
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminCreateNewPost')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          addPost();
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminUsersList')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          getUsersList();
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminCommentsList')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          getCommentsList();
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminUserEdit')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            userEdit();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
      }
    }
    elseif ($_GET['action'] == 'adminUserDelete')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            userDelete();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
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
      session_start();
      if (isset($_SESSION['user']))
      {
        if (isset($_GET['idPost']) && $_GET['idPost'] > 0)
        {
          addComment();
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        $post = intval($_GET['idPost']);
        header("Location: index.php?action=post&id=$post&state=error");
      }
    }
    elseif ($_GET['action'] == 'userUpdate')
    {
      session_start();
      if (isset($_SESSION['user']) && isset($_SESSION['role']))
      {
        if ($_SESSION['role'] == 'Administrateur')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            userUpdate();
          }
          else
          {
            header("Location: index.php");
          }
        }
        else
        {
          header("Location: index.php");
        }
      }
      else
      {
        header("Location: index.php");
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
