
<?=$this->extend(THEME . 'template')?>

<?=$this->section('content')?>

<!-- <div class="video-container">
        <video playsinline autoplay muted loop poster="<?=ASSETS;?>video/presentation.mp4">
            <source type="video/mp4" src="<?=ASSETS;?>video/presentation.mp4">
            <source src="<?=ASSETS;?>video/presentation.mp4" type="video/webm">
        </video>
    </div> -->
    <div class="video-container">
        <video playsinline autoplay muted loop>
            <source src="<?=ASSETS;?>video/presentation.mp4" type="video/webm">
        </video>
    </div>
    

    <!--<div class="banner-carousel banner-carousel-1 m-0">-->
    <!--    <div class="banner-carousel-item bnr" data-animation-in="slideOutRight">-->
    <!--        <div class="slider-content text-center">-->
    <!--            <div class="h-100">-->
    <!--                <div class="row align-items-center h-100">-->
    <!--                    <div class="col-md-12">-->
                         
    <!--                        <div class="banner-left">-->
    <!--                            <h1>Experience<br>the<br>quality</h1>-->
    <!--                        </div>-->
                           
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="banner-carousel-item bnr">-->
    <!--        <div class="slider-content text-center">-->
    <!--            <div class="h-100">-->
    <!--                <div class="row align-items-center h-100">-->
    <!--                    <div class="col-md-12">-->
                          
    <!--                        <div class="banner-left">-->
    <!--                            <h1>Experience<br>the<br>quality</h1>-->

    <!--                        </div>-->
                          
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
        <!-- <div class="banner-carousel-item">
    <!--        <div class="slider-content text-center">-->
    <!--            <div class="container h-100">-->
    <!--                <div class="row align-items-center h-100">-->
    <!--                    <div class="col-md-12">-->
    <!--                        <h3 class="slide-sub-title" data-animation-in="slideInLeft">recruitment</h3>-->
                           
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div> -->
    <!--</div>-->
    <?= $this->endSection() ?>