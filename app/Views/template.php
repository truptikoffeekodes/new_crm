<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <title>EPATRIOTCRM </title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=ASSETS;?>images/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=ASSETS;?>images/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=ASSETS;?>images/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=ASSETS;?>images/favicon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=ASSETS;?>images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=ASSETS;?>images/favicon.png">
    <link rel="manifest" href="<?=ASSETS;?>images/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/favicon.png">
    <meta name="theme-color" content="#ffffff">
    <!--Boostrap Core Css Start-->
    <!-- <link href="<?=ASSETS;?>css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?=ASSETS;?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=ASSETS;?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?=ASSETS;?>css/ionicon.min.css">
    <link rel="stylesheet" href="<?=ASSETS;?>css/feathericon.min.css">
    <!--Boostrap Core Css end-->
    <!--Google Font Css Start-->

    <link rel="preconnect" href="<?=ASSETS;?>https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--Google Font Css end-->
    <!--External Core Css start-->
    <link href="<?=ASSETS;?>css/default.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS;?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS;?>css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS;?>css/animate.min.css" rel="stylesheet" />
    <link href="<?=ASSETS;?>css/slider.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=ASSETS;?>plugins/bootstrap/bootstrap.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="<?=ASSETS;?>plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="<?=ASSETS;?>plugins/slick/slick.css">
     <!-- <link rel="stylesheet" href="<?=ASSETS;?>plugins/summernote/summernote.css"> -->
    <!-- <link rel="stylesheet" href="<?=ASSETS;?>plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?=ASSETS;?>plugins/summernote/summernote-lite.css"> -->
    <!-- <link rel="stylesheet" href="<?=ASSETS;?>plugins/slick/slick-theme.css"> -->

    <link rel="stylesheet" href="<?=ASSETS;?>plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="<?=ASSETS;?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=ASSETS;?>css/owl.theme.default.min.css">


    <link rel="stylesheet" type="text/css" href="<?=ASSETS;?>plugins/sweet-alert/sweetalert2.min.css">
</head>
<!--<div class="video-container">-->
<!--        <video playsinline autoplay muted loop poster="<?=ASSETS;?>video/presentation.mp4">-->
<!--            <source type="video/mp4" src="<?=ASSETS;?>video/presentation.mp4">-->
<!--            <source src="<?=ASSETS;?>video/presentation.mp4" type="video/webm">-->
<!--        </video>-->
<!--    </div>-->


    <?= $this->include(THEME . 'block/Navbar')?>

<?= $this->renderSection('content')?>


    <?= $this->include(THEME . 'block/scripts')?>
</body>
<?= $this->renderSection('scripts')?>

</html>