<?php

require('controller/BlogController.php');
require('controller/UserController.php');

class Router
{
    public function routerReq()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listPosts') {
                if (isset($_GET['page']) && $_GET['page'] > 0) {
                    session_start();
                    $controller = new BlogController();
                    $controller->listPosts();
                } else {
                    header("Location: index.php?action=listPosts&page=1");
                }
            } elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (isset($_GET['state'])) {
                        if ($_GET['state'] == 'error' || $_GET['state'] == 'success') {
                            $controller = new BlogController();
                            $controller->post();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        $controller = new BlogController();
                        $controller->post();
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'signup_view') {
                session_start();
                if (!isset($_SESSION['user'])) {
                    if (isset($_GET['state'])) {
                        if ($_GET['state'] == 'success' || $_GET['state'] == 'error' || $_GET['state'] == 'error_email_already_use') {
                            require("view/signupView.php");
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        require("view/signupView.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'signup') {
                session_start();
                if (!isset($_SESSION['user']) && !isset($_SESSION['role'])) {
                    $controller = new UserController();
                    $controller->signup();
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'signin_view') {
                session_start();
                if (!isset($_SESSION['user'])) {
                    if (isset($_GET['state'])) {
                        if ($_GET['state'] == 'success' || $_GET['state'] == 'error') {
                            require("view/signinView.php");
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        require("view/signinView.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'signin') {
                session_start();
                if (!isset($_SESSION['user']) && !isset($_SESSION['role'])) {
                    $controller = new UserController();
                    $controller->signin();
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'deconnection') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    $controller = new UserController();
                    $controller->deconnection();
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'forgot_password_view') {
                session_start();
                if (!isset($_SESSION['user'])) {
                    if (isset($_GET['state'])) {
                        if ($_GET['state'] == 'success' || $_GET['state'] == 'error' || $_GET['state'] == 'unknown_error') {
                            require("view/forgotPasswordView.php");
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        require("view/forgotPasswordView.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'forgotPassword') {
                session_start();
                if (!isset($_SESSION['user']) && !isset($_SESSION['role'])) {
                    $controller = new UserController();
                    $controller->forgotPassword();
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'my_account') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if (isset($_GET['state'])) {
                        if ($_GET['state'] == 'success') {
                            $controller = new UserController();
                            $controller->account();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        $controller = new UserController();
                        $controller->account();
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminBlogPostsList') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['page']) && $_GET['page'] > 0) {
                            $controller = new BlogController();
                            $controller->blogPostsList();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminBlogPostEdit') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $controller = new BlogController();
                            $controller->blogPostEdit();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("location: index.php");
                }
            } elseif ($_GET['action'] == 'adminBlogPostUpdate') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $controller = new BlogController();
                            $controller->blogPostUpdate();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminBlogPostDelete') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $controller = new BlogController();
                            $controller->blogPostDelete();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminBlogPostNewEdit') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        $controller = new BlogController();
                        $controller->blogPostNewEdit();
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminCreateNewPost') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        $controller = new BlogController();
                        $controller->blogPostAdd();
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminUsersList') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        $controller = new UserController();
                        $controller->usersList();
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminCommentsList') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        $controller = new BlogController();
                        $controller->commentsList();
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminUserEdit') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $controller = new UserController();
                            $controller->userEdit();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminUserDelete') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $controller = new UserController();
                            $controller->userDelete();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'adminCommentState') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if (isset($_GET['state']) && $_GET['state'] == 0 || $_GET['state'] == 1) {
                                $controller = new BlogController();
                                $controller->setCommentState();
                            } else {
                                header("Location: index.php");
                            }
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'newComment') {
                session_start();
                $post = $_GET['idPost'];
                if (isset($_SESSION['user'])) {
                    if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
                        $controller = new BlogController();
                        $controller->addComment();
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php?action=post&id=$post&state=error");
                }
            } elseif ($_GET['action'] == 'userUpdate') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Administrateur') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $controller = new UserController();
                            $controller->userUpdate();
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            } elseif ($_GET['action'] == 'updateAccount') {
                session_start();
                if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
                    $controller = new UserController();
                    $controller->updateAccount();
                } else {
                    header("Location: index.php");
                }
            }
        } else {
            require('view/HomeView.php');
        }
    }   
}
