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
            '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>',
            '<script src="./public/js/blog/scripts.js"></script>'];
?>

<?php ob_start(); ?>

  <body>
    <!-- About Section -->
    <section id="about" class="about-section section-padding">
      <div class="container">
        <h2 class="section-title wow fadeInUp">About Me</h2>

        <div class="row">

          <div class="col-md-4 col-md-push-8">
            <div class="biography">
              <div class="myphoto">
                <img class="full" src="public/images/home/myphoto.jpg" alt="">
              </div>
              <ul>
                <li><strong>Name:</strong> John Doe</li>
                <li><strong>Date of birth:</strong> 05 Dec 1993</li>
                <li><strong>Address:</strong> 239/2 Awesome Street, USA</li>
                <li><strong>Nationality:</strong> American</li>
                <li><strong>Phone:</strong> (000) 1234 56789</li>
                <li><strong>Email:</strong> yourmail@iamx.com</li>
              </ul>
            </div>
          </div> <!-- col-md-4 -->

          <div class="col-md-8 col-md-pull-4">
            <div class="short-info wow fadeInUp">
              <h3>Objective</h3>
              <p>An opportunity to work and upgrade oneself, as well as being involved in an organization that believes in gaining a competitive edge and giving back to the community. I'm presently expanding my solid experience in UI / UX design. I focus on using my interpersonal skills to build good user experience and create a strong interest in my employers. I hope to develop skills in motion design and my knowledge of the Web, and become an honest asset to the business. As an individual, I'm self-confident you’ll find me creative, funny and naturally passionate. I’m a forward thinker, which others may find inspiring when working as a team.</p>
            </div>

            <div class="short-info wow fadeInUp">
              <h3>What I Do ?</h3>
              <p>I have been working as a web interface designer since. I have a love of clean, elegant styling, and I have lots of experience in the production of CSS3 and HTML5 for modern websites. I loving creating awesome as per my clients’ need. I think user experience when I try to craft something for my clients. Making a design awesome.</p>

              <ul class="list-check">
                <li>User Experience Design</li>
                <li>Interface Design</li>
                <li>Product Design</li>
                <li>Branding Design</li>
                <li>Digital Painting</li>
                <li>Video Editing</li>
              </ul>
            </div>

            <div class="my-signature">
              <img src="public/images/home/sign.png" alt="">
            </div>

            <div class="download-button">
              <a class="btn btn-info btn-lg" href="#contact"><i class="fa fa-paper-plane"></i>Send me message</a>
              <a class="btn btn-primary btn-lg" href="#"><i class="fa fa-download"></i>download my cv</a>
            </div>
          </div>

        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </section><!-- End About Section -->


    <!-- Resume Section -->
    <section id="resume" class="resume-section section-padding">
        <div class="container">
            <h2 class="section-title wow fadeInUp">Resume</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="resume-title">
                        <h3>Education</h3>
                    </div>
                    <div class="resume">
                        <ul class="timeline">
                            <li>
                                <div class="posted-date">
                                    <span class="month">2007-2011</span>
                                </div><!-- /posted-date -->

                                <div class="timeline-panel wow fadeInUp">
                                    <div class="timeline-content">
                                        <div class="timeline-heading">
                                            <h3>Bachelor degree certificate</h3>
                                            <span>BA(Hons) in UI Engineering, Arts University, Pabna, USA</span>
                                        </div><!-- /timeline-heading -->

                                        <div class="timeline-body">
                                            <p>I have completed UI Engineering degree from ABC University, Boston, USA at feel the charm of existence in this spot, which was creat.</p>
                                        </div><!-- /timeline-body -->
                                    </div> <!-- /timeline-content -->
                                </div><!-- /timeline-panel -->
                            </li>

                            <li class="timeline-inverted">
                                <div class="posted-date">
                                    <span class="month">2004-2006</span>
                                </div><!-- /posted-date -->

                                <div class="timeline-panel wow fadeInUp">
                                    <div class="timeline-content">
                                        <div class="timeline-heading">
                                            <h3>Higher Secondary certificate</h3>
                                            <span>Typography Arts, FA College, New York, USA</span>
                                        </div><!-- /timeline-heading -->

                                        <div class="timeline-body">
                                            <p>From this college of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend.</p>
                                        </div><!-- /timeline-body -->
                                    </div> <!-- /timeline-content -->
                                </div> <!-- /timeline-panel -->
                            </li>

                            <li>
                                <div class="posted-date">
                                  <span class="month">2000-2003</span>
                                </div><!-- /posted-date -->

                                <div class="timeline-panel wow fadeInUp">
                                    <div class="timeline-content">
                                        <div class="timeline-heading">
                                            <h3>Secondary school certificate</h3>
                                            <span>Creative Arts, Julius Jr. school, USA</span>
                                        </div><!-- /timeline-heading -->

                                        <div class="timeline-body">
                                            <p>I was awesome at arts, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy.</p>
                                        </div><!-- /timeline-body -->
                                    </div> <!-- /timeline-content -->
                                </div><!-- /timeline-panel -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="resume-title">
                        <h3>Experience</h3>
                    </div>
                    <div class="resume">
                        <ul class="timeline">
                            <li class="timeline-inverted">
                                <div class="posted-date">
                                  <span class="month">2011-2013</span>
                                </div><!-- /posted-date -->

                                <div class="timeline-panel wow fadeInUp">
                                    <div class="timeline-content">
                                        <div class="timeline-heading">
                                            <h3>Junior ui designer</h3>
                                            <span>XYZ Design Home, One Street, Boston</span>
                                        </div><!-- /timeline-heading -->

                                        <div class="timeline-body">
                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend.</p>
                                        </div><!-- /timeline-body -->
                                    </div> <!-- /timeline-content -->
                                </div> <!-- /timeline-panel -->
                            </li>

                            <li>
                                <div class="posted-date">
                                  <span class="month">2013-2015</span>
                                </div><!-- /posted-date -->

                                <div class="timeline-panel wow fadeInUp">
                                    <div class="timeline-content">
                                        <div class="timeline-heading">
                                            <h3>Lead UX Consultant</h3>
                                            <span>Lucky8 Designing Firm, California</span>
                                        </div><!-- /timeline-heading -->

                                        <div class="timeline-body">
                                            <p>Completely provide access to seamless manufactured products before functionalized synergy. Progressively redefine competitive.</p>
                                        </div><!-- /timeline-body -->
                                    </div> <!-- /timeline-content -->
                                </div><!-- /timeline-panel -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /row -->
        </div><!-- /.container -->
    </section><!-- End Resume Section -->


    <!-- Skills Section -->
    <section id="skills" class="skills-section section-padding">
      <div class="container">
        <h2 class="section-title wow fadeInUp">Skills</h2>

        <div class="row">
          <div class="col-md-6">
            <div class="skill-progress">
              <div class="skill-title"><h3>UX Design</h3></div>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" ><span>95%</span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.skill-progress -->

            <div class="skill-progress">
              <div class="skill-title"><h3>Visual Design</h3></div>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" ><span>80%</span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.skill-progress -->
            <div class="skill-progress">
              <div class="skill-title"><h3>Business Design</h3></div>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" ><span>75%</span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.skill-progress -->
          </div><!-- /.col-md-6 -->

          <div class="col-md-6">
            <div class="skill-progress">
              <div class="skill-title"><h3>Branding Design</h3></div>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" ><span>95%</span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.skill-progress -->
            <div class="skill-progress">
              <div class="skill-title"><h3>Motion Graphic</h3></div>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" ><span>80%</span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.skill-progress -->
            <div class="skill-progress">
              <div class="skill-title"><h3>Flyers Designing</h3></div>
              <div class="progress">
                <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" ><span>75%</span>
                </div>
              </div><!-- /.progress -->
            </div><!-- /.skill-progress -->
          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

        <div class="skill-chart text-center">
          <h3>More skills</h3>
        </div>

        <div class="row more-skill text-center">
          <div class="col-xs-12 col-sm-4 col-md-2">
              <div class="chart" data-percent="91" data-color="e74c3c">
                    <span class="percent"></span>
                    <div class="chart-text">
                      <span>leadership</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
              <div class="chart" data-percent="23" data-color="2ecc71">
                    <span class="percent"></span>
                    <div class="chart-text">
                      <span>Creativity</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
              <div class="chart" data-percent="68" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                      <span>Management</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
              <div class="chart" data-percent="68" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                      <span>Branding</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
              <div class="chart" data-percent="68" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                      <span>Marketing</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2">
              <div class="chart" data-percent="68" data-color="3498db">
                    <span class="percent"></span>
                    <div class="chart-text">
                      <span>Motivation</span>
                    </div>
                </div>
            </div>
        </div>

      </div><!-- /.container -->
    </section><!-- End Skills Section -->


    <!-- Works Section -->
    <section id="works" class="works-section section-padding">
      <div class="container">
        <h2 class="section-title wow fadeInUp">Works</h2>

        <ul class="list-inline" id="filter">
            <li><a class="active" data-group="all">All</a></li>
            <li><a data-group="design">Design</a></li>
            <li><a data-group="web">Web</a></li>
            <li><a data-group="interface">Interface</a></li>
            <li><a data-group="identety">Identity</a></li>
        </ul>

        <div class="row">
          <div id="grid">
            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "interface"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-1.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-1.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->


            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "web"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-2.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-2.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->
            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "interface"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-3.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-3.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->
            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "design"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-4.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-4.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->
            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "design"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-5.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-5.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->
            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "design"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-6.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-6.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->
            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "identety", "web"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-7.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-7.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->
            <div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all", "design"]'>
              <div class="portfolio-bg">
                <div class="portfolio">
                  <div class="tt-overlay"></div>
                  <div class="links">
                    <a class="image-link" href="public/images/home/works/portfolio-8.jpg"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </div><!-- /.links -->
                  <img src="public/images/home/works/portfolio-8.jpg" alt="image">
                  <div class="portfolio-info">
                    <h3>Portfolio Title</h3>
                  </div><!-- /.portfolio-info -->
                </div><!-- /.portfolio -->
              </div><!-- /.portfolio-bg -->
            </div><!-- /.portfolio-item -->
          </div><!-- /#grid -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- End Works Section -->


    <!-- Facts Section -->
    <section id="facts" class="facts-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
      <div class="tt-overlay-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="count-wrap">
                <div class="col-sm-3 col-xs-6">
                  <i class="fa fa-flask"></i>
                  <h3 class="timer">7</h3>
                  <p>Years of Experience</p>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <i class="fa fa-thumbs-up"></i>
                  <h3 class="timer">651</h3>
                  <p>Projects Done</p>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <i class="fa fa-users"></i>
                  <h3 class="timer">251</h3>
                  <p>Happy Clients</p>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <i class="fa fa-trophy"></i>
                  <h3 class="timer">5</h3>
                  <p>Awards Won</p>
                </div>
              </div><!-- /count-wrap -->
            </div><!-- /.col-md-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div>
    </section> <!-- End Facts Section -->


    <!-- Blog Section -->
    <section id="blog" class="latest-blog-section section-padding">
      <div class="container">
        <h2 class="section-title wow fadeInUp">Latest Post</h2>

        <div class="row">
          <div class="col-sm-4">
            <article class="blog-post-wrapper">
              <div class="figure">
                <div class="post-thumbnail">
                  <a href="#"><img src="public/images/home/blog/01.jpg" class="img-responsive " alt=""></a>
                </div>
                  <i class="fa fa-file-photo-o"></i>
              </div><!-- /.figure -->
              <header class="entry-header">
                <div class="post-meta">
                  <span class="the-category">
                    <a href="#">Print Design,</a> <a href="#">Photoshop</a>
                  </span>
                </div>
                <h2 class="entry-title"><a href="#" rel="">Common fonts used for newspaper template design</a></h2>
                <hr>
                <div class="entry-meta">
                  <ul class="list-inline">
                    <li>
                      <span class="the-author">
                        <a href="#">Admin</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-time">
                        <a href="#">06 Jan 2015</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-share">
                        <a href="#" title="share">30</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-comments">
                        <a href="#" title="">05</a>
                      </span>
                    </li>
                  </ul>
                </div><!-- .entry-meta -->
              </header><!-- .entry-header -->
            </article>
          </div><!-- /.col-sm-4 -->
          <div class="col-sm-4">
            <article class="blog-post-wrapper">
              <div class="figure">
                <div class="post-thumbnail">
                  <a href="#"><img src="public/images/home/blog/02.jpg" class="img-responsive " alt=""></a>
                </div>
                  <i class="fa fa-file-video-o"></i>
              </div><!-- /.figure -->
              <header class="entry-header">
                <div class="post-meta">
                  <span class="the-category">
                    <a href="#">Print Design,</a> <a href="#">Photoshop</a>
                  </span>
                </div>
                <h2 class="entry-title"><a href="#" rel="">What is the style of font called that is typically</a></h2>
                <hr>
                <div class="entry-meta">
                  <ul class="list-inline">
                    <li>
                      <span class="the-author">
                        <a href="#">Admin</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-time">
                        <a href="#">06 Jan 2015</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-share">
                        <a href="#" title="share">30</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-comments">
                        <a href="#" title="">05</a>
                      </span>
                    </li>
                  </ul>
                </div><!-- .entry-meta -->
              </header><!-- .entry-header -->
            </article>
          </div><!-- /.col-sm-4 -->
          <div class="col-sm-4">
            <article class="blog-post-wrapper">
              <div class="figure">
                <div class="post-thumbnail">
                  <a href="#"><img src="public/images/home/blog/03.jpg" class="img-responsive " alt=""></a>
                </div>
                  <i class="fa fa-quote-left"></i>
              </div><!-- /.figure -->
              <header class="entry-header">
                <div class="post-meta">
                  <span class="the-category">
                    <a href="#">Print Design,</a> <a href="#">Photoshop</a>
                  </span>
                </div>
                <h2 class="entry-title"><a href="#" rel="">How to create a print ready brochure using photoshop</a></h2>
                <hr>
                <div class="entry-meta">
                  <ul class="list-inline">
                    <li>
                      <span class="the-author">
                        <a href="#">Admin</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-time">
                        <a href="#">06 Jan 2015</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-share">
                        <a href="#" title="share">30</a>
                      </span>
                    </li>
                    <li>
                      <span class="the-comments">
                        <a href="#" title="">05</a>
                      </span>
                    </li>
                  </ul>
                </div><!-- .entry-meta -->
              </header><!-- .entry-header -->
            </article>
          </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
        <div class="blog-more text-center">
          <a href="#" class="btn btn-primary">View More</a>
        </div>

      </div><!-- /.container -->
    </section><!-- End Blog Section -->


    <!-- Hire Section -->
    <section class="hire-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2">
      <div class="hire-section-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>I'm available for freelance project</h2>
              <a href="#" class="btn btn-default">Get Hired</a>
            </div><!-- /.col-md-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.hire-section-bg -->
    </section><!-- End Hire Section -->



    <!-- Contact Section -->
    <section id="contact" class="contact-section section-padding">
      <div class="container">
        <h2 class="section-title wow fadeInUp">Get in touch</h2>

        <div class="row">
          <div class="col-md-6">
            <div class="contact-form">
              <strong>Send me a message</strong>
              <form name="contact-form" id="contactForm" action="sendemail.php" method="POST">

                <div class="form-group">
                  <label for="surname">Nom</label>
                  <input type="text" name="surname" class="form-control" id="name" required="">
                </div>

                <div class="form-group">
                  <label for="name">Prénom</label>
                  <input type="text" name="name" class="form-control" id="name" required="">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required="">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
              </form>
            </div><!-- /.contact-form -->
          </div><!-- /.col-md-6 -->

          <div class="col-md-6">
            <div class="row center-xs">
              <div class="col-sm-6">
                <i class="fa fa-map-marker"></i>
                <address>
                  <strong>Address/Street</strong>
                  239/2 Awesome Street,<br>
                  Boston, USA<br>
                </address>
              </div>

              <div class="col-sm-6">
                <i class="fa fa-mobile"></i>
                <div class="contact-number">
                  <strong>Phone Number</strong>
                  (001) 0123 111222<br>
                  (001) 0123 333444
                </div>
              </div>
            </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="location-map">
                <div id="mapCanvas" class="map-canvas"></div>
              </div>
            </div>
          </div>

          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- End Contact Section -->
  </body>

  <?php
  $content = ob_get_clean();
  require('template/blogTemplate.php');
  ?>