<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="IAMX, One Page Responsive HTML Resume Template">
      <meta name="keywords" content="onepage, resume, CV HTML template, personal Vcard, html resume, free resume template, free HTML template, free bootstrap template, personal portfolio, free html portfolio">
      <meta name="author" content="http://trendytheme.net/">
      <title><?= $title ?></title>
      <?php
         foreach($cssFiles as $row)
         {
           echo $row;
         }
         ?>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="shortcut icon" href="public/images/home/ico/favicon.png">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/images/home/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/images/home/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/images/home/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="public/images/home/ico/apple-touch-icon-57-precomposed.png">
   </head>
   <body class="theme-teal">
      <!-- Page Loader -->
      <div class="page-loader-wrapper">
         <div class="loader">
            <div class="preloader">
               <div class="spinner-layer pl-red">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
            </div>
            <p>Please wait...</p>
         </div>
      </div>
      <!-- #END# Page Loader -->
      <!-- Top Bar -->
      <nav class="navbar">
         <div class="container-fluid">
            <div class="navbar-header">
               <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
               <a href="javascript:void(0);" class="bars"></a>
               <a class="navbar-brand" href="index.php?action=adminUsersList">ADMINISTRATION DU BLOG</a>
            </div>
         </div>
      </nav>
      <!-- #Top Bar -->
      <section>
         <!-- Left Sidebar -->
         <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
               <div class="image">
                  <img src="<?= $admin->avatar() ?>" width="48" height="48" alt="User" />
               </div>
               <div class="info-container">
                  <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $admin->surname() ?>  <?= $admin->name() ?></div>
                  <div class="email"><?= $admin->email() ?></div>
               </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
               <ul class="list">
                  <li class="active">
                     <a href="index.php">
                     <i class="material-icons">arrow_back</i>
                     <span>Retourner sur le blog</span>
                     </a>
                  </li>
                  <li>
                     <a href="index.php?action=adminUsersList">
                     <i class="material-icons">supervisor_account</i>
                     <span>Gérer les utilisateurs</span>
                     </a>
                  </li>
                  <li>
                     <a href="index.php?action=adminBlogPostsList&page=1">
                     <i class="material-icons">assignment</i>
                     <span>Gérer les articles</span>
                     </a>
                  </li>
                  <li>
                     <a href="index.php?action=adminCommentsList">
                     <i class="material-icons">comment</i>
                     <span>Gérer les commentaires</span>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
               <div class="copyright text-center">
                  Projet n°5 de Florian STEIN
                  <br>
                  Parcours DA PHP/Symfony
                  <br>
                  <a href="http://openclassrooms.com">OpenClassrooms</a>
               </div>
            </div>
            <!-- #Footer -->
         </aside>
         <!-- #END# Left Sidebar -->
         <!-- Right Sidebar -->
         <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
               <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
               <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
               <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                  <ul class="demo-choose-skin">
                     <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                     </li>
                     <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                     </li>
                     <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                     </li>
                     <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                     </li>
                     <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                     </li>
                     <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                     </li>
                     <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                     </li>
                     <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                     </li>
                     <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                     </li>
                     <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                     </li>
                     <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                     </li>
                     <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                     </li>
                     <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                     </li>
                     <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                     </li>
                     <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                     </li>
                     <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                     </li>
                     <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                     </li>
                     <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                     </li>
                     <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                     </li>
                     <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                     </li>
                  </ul>
               </div>
               <div role="tabpanel" class="tab-pane fade" id="settings">
                  <div class="demo-settings">
                     <p>GENERAL SETTINGS</p>
                     <ul class="setting-list">
                        <li>
                           <span>Report Panel Usage</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                        <li>
                           <span>Email Redirect</span>
                           <div class="switch">
                              <label><input type="checkbox"><span class="lever"></span></label>
                           </div>
                        </li>
                     </ul>
                     <p>SYSTEM SETTINGS</p>
                     <ul class="setting-list">
                        <li>
                           <span>Notifications</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                        <li>
                           <span>Auto Updates</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                     </ul>
                     <p>ACCOUNT SETTINGS</p>
                     <ul class="setting-list">
                        <li>
                           <span>Offline</span>
                           <div class="switch">
                              <label><input type="checkbox"><span class="lever"></span></label>
                           </div>
                        </li>
                        <li>
                           <span>Location Permission</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </aside>
         <!-- #END# Right Sidebar -->
      </section>
      <?= $content ?>
      <!-- Javascript files -->
      <?php
         foreach($jsFiles as $row)
         {
         	echo $row;
         }
         ?>
   </body>
</html>