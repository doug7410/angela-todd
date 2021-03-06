<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Awesome Photography/Portfolio Template - Home Version 1</title>
  <meta name="description"
        content="Awesome Photography/Portfolio Template is built with Bootstrap Framework and 100% mobile responsive.">
  <meta name="keywords" content="portfolio template, photography template, creative, bootstrap, html5/css5">
  <meta name="author" content="JLP Media">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Stylesheet
  ================================================== -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/responsiveness.css">
  <link href="{{ asset('css/angie.css') }}" rel="stylesheet">


  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

  <script type="text/javascript" src="js/modernizr.custom.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<div id="app">
  <app-init :sliders="{{ json_encode($sliders->toArray()) }}"></app-init>

  @if(Auth::check())
    <nav class="admin-bar">
      <ul>
        <li>
          <a href="#mainImageSloder" data-toggle="modal">Edit main image slider</a>
        </li>
        <li><a href="#">Edit vision</a></li>
        <li><a href="#">Edit portfolio</a></li>
        <li><a href="#">Edit About</a></li>
        <li><a href="#">Edit Contact Info</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
    </nav>
    <modal heading="Edit Main Image Slider">
      <image-form :images="sliders"></image-form>
    </modal>
  @endif

  <!-- Navigation
  ================================================== -->
  <nav class="navbar navbar-default navbar-fixed-top @if(Auth::check()) with-admin-bar @endif">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a> <!-- Your logo here-->
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          @if(Auth::check())
            <li>
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          @else
            <li><a class="page-scroll" href="{{ route('login') }}">Log In</a></li>
          @endif

          <li><a class="page-scroll" href="#banner">Home</a></li>
          <li><a class="page-scroll" href="#vision">Vision</a></li>
          <li><a class="page-scroll" href="#portfolio">Portfolio</a></li>
          <li><a class="page-scroll" href="#about">About</a></li>
          <li><a class="page-scroll" href="#footer">Contact</a></li>
          <li><a href="blog.html">Blog</a></li>
        </ul>
      </div><!-- End navbar-collapse -->
    </div><!-- End container -->
  </nav>

  <!-- Header/Homepage/Carousel
  ================================================== -->
<!--  <carousel :sliders="sliders" class="@if(Auth::check()) with-admin-bar @endif"></carousel>-->
<carousel>
  <div class="slide"
       v-for="slide in {{ json_encode($sliders->toArray()) }}"
       :style="{backgroundImage: 'url(storage/sliders/'+ slide.image +')'}"
  ></div>
</carousel>

  <!-- Vision/Mission
  ================================================== -->
  <section id="vision">
<!--    <div id="carousel-example-generic" class="carousel slide @if(Auth::check()) with-admin-bar @endif" data-ride="carousel">-->
<!--      <!-- Indicators -->-->
<!--      <ol class="carousel-indicators">-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--      </ol>-->
<!---->
<!--      <!-- Wrapper for slides -->-->
<!--      <div class="carousel-inner">-->
<!--        <div class="item active">-->
<!--          <div class="dark-overlay vision">-->
<!--            <div class="vision-border centered wow">-->
<!--              <h4>Design To Showcase</h4>-->
<!--              <h2>Photography</h2>-->
<!--              <h6>The need to capture the moment and freeze it for life.</h6>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--          <div class="dark-overlay vision">-->
<!--            <div class="vision-border centered wow">-->
<!--              <h4>Capture The Moment</h4>-->
<!--              <h2>Photography</h2>-->
<!--              <h6>Quality photography that preserves treasured memories.</h6>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--          <div class="dark-overlay vision">-->
<!--            <div class="vision-border centered wow">-->
<!--              <h4>Still-life Images</h4>-->
<!--              <h2>Photography</h2>-->
<!--              <h6>Take alot of photos not war.</h6>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!---->
<!--    </div>-->
    <!-- Portfolio Title -->
    <div class="light-overlay ptitle">
      <h2>Just Cool Things</h2>
      <h5>Recent pictures I’ve taken. Check them out!</h5>
    </div>
  </section>

  <!-- Portfolio Section
  ================================================== -->
  <section id="portfolio" class="grid @if(Auth::check()) with-admin-bar @endif">

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="1s"> <!-- Portfolio 1 -->
      <img src="http://placehold.it/400x400" alt="01_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Youtube</h2>
        <p>This is a Modal with Youtube video embeded in the portfolio.</p>
        <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">View more</a> <!-- Larger image popup -->
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 1 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="2s"> <!-- Portfolio 2 -->
      <img src="http://placehold.it/400x400" alt="02_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Slider</h2>
        <p>This is a Modal with carousel or image slider in the portfolio.</p>
        <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">View more</a><!-- Larger image popup -->
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 2 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="3s"> <!-- Portfolio 3 -->
      <img src="http://placehold.it/400x400" alt="03_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Image</h2>
        <p>This modal featured a single image only.</p>
        <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">View more</a>
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 3 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="4s"> <!-- Portfolio 4 -->
      <img src="http://placehold.it/400x400" alt="04_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Landscapes</h2>
        <p>Paris is the only city in the world where starving to death is still considered an art.</p>
        <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">View more</a>
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 4 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="5s"> <!-- Portfolio 5 -->
      <img src="http://placehold.it/400x400" alt="05_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Mountains</h2>
        <p>Look deep into nature, and then you will understand everything better.</p>
        <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">View more</a>
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 5 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="6s"> <!-- Portfolio 6 -->
      <img src="http://placehold.it/400x400" alt="06_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Techno</h2>
        <p>What new technology does is create new opportunities to do a job that customers want done.</p>
        <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">View more</a>
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 6 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="1s"> <!-- Portfolio 7 -->
      <img src="http://placehold.it/400x400" alt="07_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Taxi</h2>
        <p>I m a terrible singer, but it helps when I have to call a taxi.</p>
        <a href="#portfolioModal7" class="portfolio-link" data-toggle="modal">View more</a>
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 7 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="2s"> <!-- Portfolio 8 -->
      <img src="http://placehold.it/400x400" alt="08_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Getaway</h2>
        <p>He who does not get fun and enjoyment out of every day, needs to reorganize his life. </p>
        <a href="#portfolioModal8" class="portfolio-link" data-toggle="modal">View more</a>
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 8 -->

    <figure class="effect-portfolio wow fadeIn" data-wow-duration="3s"> <!-- Portfolio 9 -->
      <img src="http://placehold.it/400x400" alt="09_img"/> <!-- Your image here -->
      <figcaption> <!-- Caption -->
        <h2>Signboard</h2>
        <p>There is only one way to happiness and that is to cease worrying about things which are beyond the power of our
          will.</p>
        <a href="#portfolioModal9" class="portfolio-link" data-toggle="modal">View more</a>
      </figcaption> <!-- End caption -->
    </figure> <!-- End portfolio 9 -->

  </section> <!-- End Portfolio Section -->

  <!-- Portfolio Modals -->
  <!-- Use the modals below to showcase details about your portfolio projects! -->

  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Youtube Video</h2>
              <div class="videoWrapper">
                <iframe src="http://www.youtube.com/embed/aZpV2Cor0rE" allowfullscreen></iframe>
                <!-- Your Youtube URL Here -->
              </div>
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Slider Image</h2>

              <div id="slider" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                  <span class="fa fa-caret-left fa-2x"></span>
                </a>
                <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                  <span class="fa fa-caret-right fa-2x"></span>
                </a>
              </div>

              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Image Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 3 -->
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Single Image</h2>
              <img class="img-responsive" src="http://placehold.it/550x400" alt="Image">
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 4 -->
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Paris</h2>
              <img class="img-responsive" src="http://placehold.it/550x400" alt="Image">
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 5 -->
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Mountains</h2>
              <div id="slider2" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/550x400" alt="...">
                  </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#slider2" role="button" data-slide="prev">
                  <span class="fa fa-caret-left fa-2x"></span>
                </a>
                <a class="right carousel-control" href="#slider2" role="button" data-slide="next">
                  <span class="fa fa-caret-right fa-2x"></span>
                </a>
              </div>
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 6 -->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Technology</h2>
              <img class="img-responsive" src="http://placehold.it/550x400" alt="Image">
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 7 -->
  <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Freedom</h2>
              <img class="img-responsive" src="http://placehold.it/550x400" alt="Image">
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 8 -->
  <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Freedom</h2>
              <img class="img-responsive" src="http://placehold.it/550x400" alt="Image">
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p>
                <strong>Want these theme for your portfolio?</strong> You can download 60 of them for free, courtesy of
                jlpmedia.com, or you can purchase the 1500 icon set <a href="#">here</a>.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 9 -->
  <div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2>Freedom</h2>
              <img class="img-responsive" src="http://placehold.it/550x400" alt="Image">
              <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita
                beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
              <p><strong>Want these theme for your portfolio?</strong> You can download this theme here for only $10,
                courtesy of jlpmedia.com. Awesome Photography/Portfolio Template is a bootstrap based awesome photography
                portfolio template. Creatively designed to present your artwork beautifully and clean. Catch more visitors
                and potential clients by using Solstice Photography/Portfolio Template to showcase your photography and
                crafts. This is mobile responsive template, very easy to use and well-documented codes.</p>
              <ul class="list-inline">
                <li>Date: August 2014</li>
                <li>Client: Tarsier Graphics</li>
                <li>Category: Graphic Design</li>
              </ul>
              <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Call-To-Action Section
  ================================================== -->
  <section id="subscribe" >
    <div class="container">
      <div class="row">
        <div class="col-md-8 wow fadeIn" data-wow-delay="0.2s">
          <p><span>For more photos and to get them weekly via email. Click to...</span></p>
        </div>
        <div class="col-md-4 wow fadeIn" data-wow-delay="0.4s">
          <a class="page-scroll" href="#footer"><span class="btn right">SUBSCRIBE</span></a> <!-- Subscribe button -->
        </div>
      </div>
    </div>
  </section>

  <!-- About Section
  ================================================== -->
  <section id="about" class="@if(Auth::check()) with-admin-bar @endif"> <!-- Start about -->
    <div class="about-content wow fadeIn" data-wow-delay="2s">
      <div class="container"> <!-- Container -->
        <h2>Lian Plameras</h2> <!-- Your name or agency name here -->
        <div class="about-text">
          <p class="large">NY, New York</p> <!-- Your address -->
          <p class="small">www.awesomephotography.com</p> <!-- Your website -->
          <br>
          <p class="large">I love. Music. Dogs. Biking. Coffee.</p> <!-- Tell more about you -->
          <p class="atext">Velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et
            accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait
            nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
            tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor
            in hendrerit in. vulputate.</p>
        </div>
      </div>
    </div> <!-- End container -->
  </section> <!-- End about -->

  <!-- Footer Section
  ================================================== -->
  <section id="footer"> <!-- Start footer -->
    <div class="container"> <!-- Container -->
      <a href="#"><img src="img/07_footer-logo.png" alt="footer-logo"></a>
      <br>
      <br>
      <!-- Buttons -->
      <a id="show" class="btn wow" data-wow-delay="0.6s"><h2>WORK w/ ME</h2></a>
      <!-- Button to click toggle contact form -->
      <br>
      <p>liampalm@awesomephotography.com</p> <!-- Your email add here -->
      <p>www.awesomephotography.com</p> <!-- Any other information here -->
    </div> <!-- End container -->
  </section> <!-- End footer -->

  <!-- Toggle Contact Section
  ================================================== -->
  <section id="contact" class="@if(Auth::check()) with-admin-bar @endif">  <!-- Start contact -->
    <div class="container"> <!-- Container -->
      <form name="sentMessage" id="contactForm" novalidate>  <!-- Contact form -->
        <div class="row">
          <div class="col-md-6"> <!-- 6 column grid left form -->
            <div class="form-group"> <!-- Your name input -->
              <input type="text" autocomplete="off" class="form-control" placeholder="Your Name *" id="name" required
                     data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group"> <!-- Your email input -->
              <input type="email" autocomplete="off" class="form-control" placeholder="Your Email *" id="email" required
                     data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group"> <!-- Your phone no. input -->
              <input type="tel" autocomplete="off" class="form-control" placeholder="Your Phone *" id="phone" required
                     data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div> <!-- End 6 column grid left form -->
          <div class="col-md-6"> <!-- 6 column grid right form-->
            <div class="form-group"> <!-- Your message input -->
              <textarea class="form-control" placeholder="Your Message *" id="message" required
                        data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div> <!-- End 6 column grid right form-->
          <div class="clearfix"></div>
          <div class="col-lg-12 text-center">
            <div id="success"></div>
            <button type="submit" class="btn btn-send">Send Message</button> <!-- Send button -->
          </div>
        </div>
      </form> <!-- End contact form -->
    </div> <!-- End container -->
  </section> <!-- Start contact -->

  <!-- Social Media Section
  ================================================== -->
  <section id="socials">
    <div class="container wow" data-wow-delay="0.4s">
      <p>To get the latest update of me and my works</p>
      <p> >> <span class="follow"> Follow Me </span> &lt;&lt; </p>
      <ol class="social">
        <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li> <!-- Change # with your facebook link -->
        <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li> <!-- Change # with your twitter link -->
        <li><a href="#"><i class="fa fa-behance fa-2x"></i></a></li> <!-- Change # with your behance link -->
        <li><a href="#"><i class="fa fa-dribbble fa-2x"></i></a></li> <!-- Change # with your dribbble link -->
        <li><a href="#"><i class="fa fa-flickr fa-2x"></i></a></li> <!-- Change # with your flickr link -->
        <li><a href="#"><i class="fa fa-google-plus fa-2x"></i></a></li> <!-- Change # with your googleplus link -->
        <li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li> <!-- Change # with your instagram link -->
      </ol>
    </div>
  </section>

  <div id="footer-nav">  <!-- Copyright notice on the bottom -->
  <span>© 2014 Awesome Phtography. All Rights Reserved.</span>
</div>
</div>


<!-- jQuery / JavaScript plugins
================================================== -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/bootstrap.js"></script>

<script src="js/wow.min.js"></script><!-- Content Animation -->
<script type="text/javascript" src="js/SmoothScroll.js"></script> <!-- Smooth scrolling page-->
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/cbpAnimatedHeader.js"></script>
<script type="text/javascript" src="js/classie.js"></script>

<!-- Parallax Effects-->
<script src="js/skrollr.js"></script>
<script src="js/imagesloaded.js"></script>

<!-- Contact page-->
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="js/contact.js"></script>

<!-- My Custom Plugin JavaScript -->
<script type="text/javascript" src="js/main.js"></script>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>