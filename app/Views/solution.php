<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
    
    <div class="video-container">
        <video playsinline autoplay muted loop>
            <source src="<?=ASSETS;?>video/solution.mp4" type="video/webm">
        </video>
    </div>

    <!--<div id="navbar_top" class="header-item-center">-->
    <!--    <nav class="navbar navbar-default navbar-trans navbar-expand-lg">-->
    <!--        <div class="container-fluid">-->
    <!--            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"-->
    <!--                data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"-->
    <!--                aria-label="Toggle navigation"> <span></span> <span></span> <span></span> </button>-->
    <!--            <a class="navbar-brand text-brand" href="index.html"><img src="images/logo.png" alt=""></a>-->
    <!--            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">-->
    <!--                <ul class="navbar-nav">-->
    <!--                    <li class="nav-item"> <a class="nav-link" href="about-us.html" title="ABOUT US"> About Us </a>-->
    <!--                    </li>-->

    <!--                    <li class="nav-item"> <a class="nav-link" href="solution.html" title="Solutions "> Solutions-->
    <!--                        </a></li>-->
    <!--                    <li class="nav-item"> <a class="nav-link" href="testimonials.html" title="Testimonial ">-->
    <!--                            Testimonial</a></li>-->
    <!--                    <li class="nav-item"> <a class="nav-link" href="current-opening.html"-->
    <!--                            title="Currrent Open Position "> Currrent-->
    <!--                            Open Position</a></li>-->
    <!--                    <li class="nav-item desk">-->
    <!--                        <div class="right-section">-->
    <!--                            <a href="lets-talk.html" class="talk">-->
    <!--                                <img src="images/talk.png" alt="">-->
    <!--                            </a>-->
    <!--                        </div>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="right-section mob">-->
    <!--            <a href="lets-talk.html" class="talk">-->
    <!--                <img src="images/talk.png" alt="">-->
    <!--            </a>-->
    <!--        </div>-->
    <!--    </nav>-->
    <!--</div>-->

    <div class="solution">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">

                    <div class="solution-box">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="sloution-text">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i> -<br>
                                    HAVE A SAVIOR OF TIME, WHICH  REPLICATES MULTIPLE OPPORTUNITIES BEFORE THE ESTIMATED TIMELINE.<br>
                                    - <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="sloution-text">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i> -<br>
                                    GET INTRODUCED TO DESIRED WORKFORCE WITHIN COMPETITIVE MARKET.<br>
                                    - <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="sloution-text">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i> -<br>
                                    OVERVIEW OF THE CURRENT STATE TO IMPLEMENT THE NEXT STEP!<br>
                                    - <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
<?= $this->endsection() ?>

<?= $this->section('scripts')?>
   
    <script>
    //alert("dshvgsd");
        $(".solution .owl-carousel").owlCarousel({
            loop: true,
            dots: false,
            margin: 5,
            responsiveClass: true,
            autoplay: true,
            smartSpeed: 400,
            responsiveClass: true,
            navText: ['<i class="fa fa-long-arrow-left" aria-hidden="true"></i>', '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'],
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            navigation: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 1,
                    nav: true,
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true,
                },
            },
        });

    </script>
<?= $this->endsection() ?>