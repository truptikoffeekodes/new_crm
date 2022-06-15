<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

    
    <section class="current-open" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="checkout-form-centre">
                    <div class="checkout-login-step">
                        <h1 style="font-size: 40px;font-weight: 800;">Current Opennings</h1>
                    </div>
                </div>
            </div>
            <div class="open-box">
                <div class="row">
                    <?php 
                    foreach($current_openning as $row)
                    {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                      
                        <a href="<?= url('Home/apply_for_job/'.$row['id'])?>" class="current-details">
                        <?php
                        if(strlen($row['title'])>27)
                        {
                            $title = substr ($row['title'], 0, 27)."...";
                          
                        }
                        else
                        {
                           $title= $row['title'];
                        }
                        if(strlen($row['location'])>30)
                        {
                            $location = substr ($row['location'], 0, 30)."...";
                          
                        }
                        else
                        {
                           $location= $row['location'];
                        }
                        ?>
                            <p><?=$title;?></p>
                            <span><?=$location;?></span>
                        </a>
                  
                    </div>
                    <?php
                    }
                    ?>
                    <!--<div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">-->
                    <!--    <a href="radio-enquiry.html" class="current-details">-->
                    <!--        <p>RADIO FREQUENCY</p>-->
                    <!--        <span>United States</span>-->
                    <!--    </a>-->
                    <!--</div>-->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                        <div class="current-details">
                            <p>Affiliate Business Development Manager
                                (Arabic/Eng) - Remote</p>
                            <a href="current-opening-details.html">Middle East (Remote)</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                        <div class="current-details">
                            <p>Affiliate Business Development Manager
                                (Arabic/Eng) - Remote</p>
                            <a href="current-opening-details.html">Middle East (Remote)</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                        <div class="current-details">
                            <p>Affiliate Business Development Manager
                                (Arabic/Eng) - Remote</p>
                            <a href="current-opening-details.html">Middle East (Remote)</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                        <div class="current-details">
                            <p>Affiliate Business Development Manager
                                (Arabic/Eng) - Remote</p>
                            <a href="current-opening-details.html">Middle East (Remote)</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                        <div class="current-details">
                            <p>Affiliate Business Development Manager
                                (Arabic/Eng) - Remote</p>
                            <a href="current-opening-details.html">Middle East (Remote)</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                        <div class="current-details">
                            <p>Affiliate Business Development Manager
                                (Arabic/Eng) - Remote</p>
                            <a href="current-opening-details.html">Middle East (Remote)</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4">
                        <div class="current-details">
                            <p>Affiliate Business Development Manager
                                (Arabic/Eng) - Remote</p>
                            <a href="current-opening-details.html">Middle East (Remote)</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <?= $this->endSection() ?>