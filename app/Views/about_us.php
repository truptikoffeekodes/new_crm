<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


<div class="video-container">
    <video playsinline autoplay muted loop>
        <source src="<?=ASSETS;?>video/AboutUs.mp4" type="video/webm">
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

<div class="about-us">
    <div class="row">
        <div class="about-title">
            <h1>Who We Are</h1>
        </div>
    </div>
    <div class="row">
        <div class="about-left">
            <!-- <h2>We'Re <br>
                Specialized In Intellectual Process To Tech & Non-Tech concepts from Start-Up, pre-seed & then Seed
                Level To project ‘a’ till fortune 500!</h2> -->
            <h2 style="padding:20px;">
            THE INTELLECTUAL THOUGHT PROCESSOR OF START-UP TO FORTUNE 500! EVERY THOUGHT IS REVOLUTIONARY IF IT IS SOLUTION-ORIENTED.
            </h2>
        </div>
        <div class="about-right">
            <div class="map">
                <div class="box">
                    <div class="img">
                        <img src="<?=ASSETS;?>images/map.png" alt="hover effect">
                        <img src="<?=ASSETS;?>images/maporignal12.png" alt="hover effect">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
$(".box").on({
    mouseover: function() {
        $(this).find("img:nth-child(1)").stop().animate({
            opacity: 0
        }, 600);
        $(this).find("img:nth-child(2)").stop().animate({
            opacity: 1
        }, 600);
    },
    mouseout: function() {
        $(this).find("img:nth-child(1)").stop().animate({
            opacity: 1
        }, 600);
        $(this).find("img:nth-child(2)").stop().animate({
            opacity: 0
        }, 600);
    }
});
</script>
<?= $this->endSection() ?>