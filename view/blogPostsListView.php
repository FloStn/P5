<?php
$title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
$preloader = false;
$homeBanner = false;
$navbar = false;
$footer = false;
$scrollup = false;

$cssFiles = ['<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">',
             '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">',
             '<link href="./vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">',
             '<link href="./vendor/node-waves/waves.css" rel="stylesheet">',
             '<link href="./vendor/drmonty/animate.css/css/animate.css" rel="stylesheet" />',
             '<link href="./vendor/waitme/waitMe.min.css" rel="stylesheet">',
             '<link href="./public/css/admin/style.css" rel="stylesheet">',
             '<link href="./public/css/admin/themes/all-themes.css" rel="stylesheet">'];

             $jsFiles = ['<script src="./vendor/components/jquery/jquery.min.js"></script>',
                        	'<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>',
                        	'<script src="./vendor/bootstrap-select/bootstrap-select/dist/js/bootstrap-select.js"></script>',
                         '<script src="./vendor/grimmlink/jquery-slimscroll/jquery.slimscroll.js"></script>',
                          '<script src="./vendor/node-waves/waves.js"></script>',
                          '<script src="./vendor/waitme/waitMe.js"></script>',
                        '<script src="./public/js/admin/admin.js"></script>',
                        '<script src="./public/js/admin/colored.js"></script>',
                        '<script src="./public/js/admin/demo.js"></script>'];
?>

<?php ob_start(); ?>
    <section class="content">
        <div class="container-fluid">
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a class="btn bg-teal waves-effect" href="index.php?action=adminBlogPostNewEdit">Rédiger un article</a>
              </div>
          </div>

          <br>

            <!-- Basic Example -->
            <div class="row clearfix">
              <?php
              foreach($posts as $post)
              {
              ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-teal">
                            <h2>
                                <?= $post->title() ?>
                                <small>
                                Publié par
                                <b>
                                <?php
                                $usr = $userManager->getUser($post->author());
                                ?>
                                <?= $usr->name() ?>
                                <?= $usr->surname() ?>
                                </b>
                                le <?= $post->addDateTimeFr() ?>.
                                <br>
                                <?php
                                 if(!empty($post->lastModifDateTimeFr()))
                                 {
                                ?>
                                Dernière modification le <?= $post->lastModifDateTimeFr() ?>.
                                <?php
                                 }
                                ?>
                                </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="index.php?action=adminBlogPostEdit&id=<?= $post->idPost() ?>">Editer</a></li>
                                        <li><a href="index.php?action=adminBlogPostDelete&id=<?= $post->idPost() ?>">Supprimer</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <img src="<?= $post->img() ?>" class="img-fluid" width="100%" />
                            <blockquote> <?= substr($post->chapo(), 0, 120) ?>... </blockquote>
                            <?= substr($post->content(), 0, 500) ?>...
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
        </div>

        <!-- Pagination -->
        <div class="card">
          <center>
            <ul class="pagination">
              <?php
            for($i=1;$i<=$totalPages;$i++)
            {   
                if( $i == $currentPage)
                {
           ?>
           <li class="active"><a href="index.php?action=adminBlogPostsList&page=<?= $i ?>"><?= $i ?></a></li>
          <?php
                }
                else
                {
                    ?>
                    <li><a class="waves-effect" href="index.php?action=adminBlogPostsList&page=<?= $i ?>"><?= $i ?></a></li>
                    <?php
                }
          }
          ?>
          </ul>
        </center>
      </div>

    </section>
  </body>

  	<?php
  	$content = ob_get_clean();
  	require('template/adminTemplate.php');
  	?>
