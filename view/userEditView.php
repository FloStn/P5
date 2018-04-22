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
             '<link href="./vendor/drmonty/animate.css/css/animate.css" rel="stylesheet">',
             '<link href="/P5/vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">',
             '<link href="./public/css/admin/style.css" rel="stylesheet">',
             '<link href="./public/css/admin/themes/all-themes.css" rel="stylesheet">',
             '<link rel="stylesheet" href="./vendor/bootstrap-select/bootstrap-select/dist/css/bootstrap-select.min.css">'];

             $jsFiles = ['<script src="./vendor/components/jquery/jquery.min.js"></script>',
                        	'<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>',
                        	'<script src="./vendor/bootstrap-select/bootstrap-select/dist/js/bootstrap-select.js"></script>',
                         '<script src="./vendor/grimmlink/jquery-slimscroll/jquery.slimscroll.js"></script>',
                          '<script src="./vendor/node-waves/waves.js"></script>',
                          '<script src="/P5/vendor/editable-table/mindmup-editabletable.js"></script>',
                        '<script src="./public/js/admin/admin.js"></script>',
                        '<script src="./public/js/admin/editable-table.js"></script>',
                        '<script src="./public/js/admin/demo.js"></script>'];
?>

<?php ob_start(); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edition d'un utilisateur
                                <small>Modifiez les informations ci-dessous.</small>
                            </h2>
                        </div>
                        <div class="body">
                          <form name="user-edit" id="userEdit" action="index.php?action=userUpdate&id=<?= $editUser->idUser() ?>" method="POST">
                            <div class="col-sm-2">
                              <div class="form-group">
                                <div class="form-line">
                                  <input type="text" class="form-control" name="surname" placeholder="<?= $editUser->surname() ?>">
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <div class="form-line">
                                  <input type="text" class="form-control" name="name" placeholder="<?= $editUser->name() ?>">
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <div class="form-line">
                                  <input type="text" class="form-control" name="email" placeholder="<?= $editUser->email() ?>">
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <div class="form-line">
                                  <select class="form-control show-tick" name="role">
                                    <?php
                                    if ($editUser->role() == 'Administrateur')
                                    {
                                    ?>
                                      <option value="1" selected>Administrateur</option>
                                      <option value="0">Utilisateur</option>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                      <option value="0" selected>Utilisateur</option>
                                      <option value="1">Administrateur</option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <center><button type="submit" class="btn bg-teal waves-effect">Enregistrer les modifications</button></center>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  	<?php
  	$content = ob_get_clean();
  	require('template/adminTemplate.php');
  	?>
