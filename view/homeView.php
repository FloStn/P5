<?php
   session_start();
   $title = 'Florian STEIN - Projet 5 - DA PHP/Symfony OpenClassrooms';
   $preloader = true;
   $homeBanner = true;
   $navbar = true;
   $footer = true;
   $scrollup = true;
   $anchor = '#about';
   
   $cssFiles = ['<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css">',
                '<link href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">',
                '<link href="./vendor/fortawesome/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">',
                '<link href="./vendor/drmonty/animate.css/css/animate.min.css" rel="stylesheet">',
                '<link href="./vendor/dimsemenov/magnific-popup/dist/magnific-popup.css" rel="stylesheet">',
                '<link href="./public/css/blog/style.css" rel="stylesheet" media="screen">',
                '<link href="./public/css/blog/responsive.css" rel="stylesheet">'];
   
   $jsFiles = ['<script src="./public/js/blog/jquery.js"></script>',
               '<script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>',
               '<script src="./public/js/blog/jquery.stellar.min.js"></script>',
               '<script src="./public/js/blog/jquery.sticky.js"></script>',
               '<script src="./public/js/blog/smoothscroll.js"></script>',
               '<script src="./public/js/blog/wow.min.js"></script>',
               '<script src="./public/js/blog/jquery.countTo.js"></script>',
               '<script src="./public/js/blog/jquery.inview.min.js"></script>',
               '<script src="./public/js/blog/jquery.easypiechart.js"></script>',
               '<script src="./public/js/blog/jquery.shuffle.min.js"></script>',
               '<script src="./public/js/blog/jquery.magnific-popup.min.js"></script>',
               '<script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>',
               '<script src="./public/js/blog/jquery.fitvids.js"></script>',
               '<script src="./public/js/blog/scripts.js"></script>'];
   ?>
<?php ob_start(); ?>
<body>
   <!-- About Section -->
   <section id="about" class="about-section section-padding">
      <div class="container">
         <h2 class="section-title wow fadeInUp">A propos de moi</h2>
         <div class="row">
            <div class="col-md-4 col-md-push-8">
               <div class="biography">
                  <div class="myphoto">
                     <img class="full" src="public/images/home/myphoto.jpg" alt="">
                  </div>
                  <ul>
                     <li><strong>Nom:</strong> Stein</li>
                     <li><strong>Prénom:</strong> Florian</li>
                     <li><strong>Date de naissance:</strong> 22 Décembre 1995</li>
                     <li><strong>Email:</strong> flo.stein9578@gmail.com</li>
                  </ul>
               </div>
            </div>
            <!-- col-md-4 -->
            <div class="col-md-8 col-md-pull-3">
               <div class="short-info wow fadeInUp">
                  <h3>Compétences</h3>
                  <ul class="list-check">
                     <li>HTML5/CSS3</li>
                     <li>Wordpress</li>
                     <li>PHP</li>
                     <li>Symfony 3</li>
                  </ul>
               </div>
               <div class="download-button">
                  <a class="btn btn-info btn-lg" href="#contact"><i class="fa fa-paper-plane"></i>Me contacter</a>
                  <a class="btn btn-primary btn-lg" href="documents/C.V Florian STEIN.pdf"><i class="fa fa-download"></i>Voir mon C.V</a>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
   </section>
   <!-- End About Section -->
   <!-- Hire Section -->
   <section class="hire-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
      <div class="hire-section-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h2>Me contacter</h2>
               </div>
               <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container -->
      </div>
      <!-- /.hire-section-bg -->
   </section>
   <!-- End Hire Section -->
   <!-- Contact Section -->
   <section id="contact" class="contact-section section-padding">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-push-3">
               <div class="contact-form">
                  <form name="contact-form" id="contactForm" action="helper/contact.php" method="POST">
                     <div class="form-group">
                        <label for="surname">Nom*</label>
                        <input type="text" name="surname" class="form-control" id="name" required>
                     </div>
                     <div class="form-group">
                        <label for="name">Prénom*</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                     </div>
                     <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                     </div>
                     <div class="form-group">
                        <label for="message">Message*</label>
                        <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
                     </div>
                     <p>*champs requis.</p>
                     <center><button type="submit" name="submit" class="btn btn-primary">Envoyer</button></center>
                  </form>
               </div>
               <!-- /.contact-form -->
            </div>
            <!-- /.col-md-6 -->
         </div>
      </div>
      <!-- /.row -->
      </div><!-- /.container -->
   </section>
   <!-- End Contact Section -->
</body>
<?php
   $content = ob_get_clean();
   require('template/blogTemplate.php');
   ?>