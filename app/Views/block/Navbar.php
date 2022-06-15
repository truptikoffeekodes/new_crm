<div id="navbar_top" class="header-item-center">
        <nav class="navbar navbar-default navbar-trans navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
                    aria-label="Toggle navigation"> <span></span> <span></span> <span></span> </button>
                <a class="navbar-brand text-brand" href="<?= url('Home')?>"><img src="<?=ASSETS;?>images/logo.png" alt=""></a>
                <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a class="nav-link" href="<?= url('Home/about_us')?>" title="ABOUT US"> About Us </a>
                        </li>

                        <li class="nav-item"> <a class="nav-link" href="<?= url('Home/solution')?>" title="Solutions "> Solutions
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= url('Home/testimonial')?>" title="Testimonial ">
                                Testimonial</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= url('Home/current_opening')?>"
                                title="Currrent Open Position "> Currrent
                                Open Position</a></li>
                        <li class="nav-item desk">
                            <div class="right-section">
                                <a href="<?= url('Home/lets_talk')?>" class="talk">
                                    <img src="<?=ASSETS;?>images/talk.png" alt="">
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-section mob">
                <a href="<?= url('Home/lets_talk')?>" class="talk">
                    <img src="<?=ASSETS;?>images/talk.png" alt="">
                </a>
            </div>
        </nav>
    </div>