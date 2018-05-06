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
                '<link href="./vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">',
                '<link href="./public/css/admin/style.css" rel="stylesheet">',
                '<link href="./public/css/admin/themes/all-themes.css" rel="stylesheet">'];
   
   $jsFiles = ['<script src="./vendor/components/jquery/jquery.min.js"></script>',
               '<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>',
               '<script src="./vendor/bootstrap-select/bootstrap-select/dist/js/bootstrap-select.js"></script>',
               '<script src="./vendor/grimmlink/jquery-slimscroll/jquery.slimscroll.js"></script>',
               '<script src="./vendor/node-waves/waves.js"></script>',
               '<script src="./vendor/jquery-datatable/jquery.dataTables.js"></script>',
               '<script src="./vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>',
               '<script src="./vendor/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>',
               '<script src="./vendor/jquery-datatable/extensions/export/buttons.flash.min.js"></script>',
               '<script src="./vendor/jquery-datatable/extensions/export/jszip.min.js"></script>',
               '<script src="./vendor/jquery-datatable/extensions/export/pdfmake.min.js"></script>',
               '<script src="./vendor/jquery-datatable/extensions/export/vfs_fonts.js"></script>',
               '<script src="./vendor/jquery-datatable/extensions/export/buttons.html5.min.js"></script>',
               '<script src="./vendor/jquery-datatable/extensions/export/buttons.print.min.js"></script>',
               '<script src="./public/js/admin/admin.js"></script>',
               '<script src="./public/js/admin/jquery-datatable.js"></script>',
               '<script src="./public/js/admin/demo.js"></script>'];
   ?>
<?php ob_start(); ?>
<section class="content">
   <div class="container-fluid">
      <!-- Basic Examples -->
      <div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>
                     Utilisateurs enregistrés
                  </h2>
                  <ul class="header-dropdown m-r--5">
                     <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                           <li><a href="javascript:void(0);">Action</a></li>
                           <li><a href="javascript:void(0);">Another action</a></li>
                           <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <div class="body">
                  <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                           <tr>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($users as $user)
                              {
                              ?>
                           <tr>
                              <td><?= $user->surname() ?></td>
                              <td><?= $user->name() ?></td>
                              <td><?= $user->email() ?></td>
                              <td><?= $user->role() ?></td>
                              <td>
                                 <ul class="header-dropdown m-r--5 dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                       <li><a href="index.php?action=adminUserEdit&id=<?= $user->idUser() ?>">Editer</a></li>
                                       <li><a href="index.php?action=adminUserDelete&id=<?= $user->idUser() ?>">Supprimer</a></li>
                                    </ul>
                                 </ul>
                              </td>
                           </tr>
                           <?php
                              }
                              ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- #END# Basic Examples -->
   </div>
</section>
</body>
<?php
   $content = ob_get_clean();
   require('template/adminTemplate.php');
   ?>