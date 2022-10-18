<!DOCTYPE html>
<html lang="id">

<head>
    <title><?= $title ?></title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="google-site-verification" content="iLda95GiFK6u0WejtruUR-w2Jn1896HYLZlvx47pfDY" />
    <meta name="msvalidate.01" content="C14A10C7D9B006DF9076A5C1667D4B31" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gethelp Situs donasi dan galang dana online. Mari berbagi kebahagiaan dengan berdonasi di gethelp"/>
    <meta name="keywords" content="Situs donasi dan galang dana online,donasi online,gethelpid,galang dana online,gethelp,donasi,indonesia,makassar"/>
    <meta name="copyright" content="gethelpid"/>
    <meta name="author" content="gethelpid"/>
    <meta name="robots" content="index, follow, max-image-preview:large"/>
	<meta name="theme-color" content="#ffffff" />
	<meta name="application-name" content="gethelpid" />
	<!-- For Facebook -->
	<meta property="og:site_name" content="gethelpid" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= base_url('assets/img/frontend/slide1_1080.jpg') ?>" />
    <meta property="og:url" content="https://gethelpid.com/" />
    <meta property="og:description" content="Situs donasi dan galang dana online. Mari berbagi kebahagiaan dengan berdonasi di gethelp" />
	<link rel="canonical" href="https://gethelpid.com"/>
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico') ?>" type="image/x-icon">
    <link rel="alternate" hreflang="id" expr:href="https://gethelpid.com/"/>
    <link rel="icon" href="<?= base_url('assets/img/favicon.ico') ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/apple-touch-icon.png') ?>" type="image/x-icon">
     <!-- Jquery Library File-->
    <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script async src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <!-- Fontawesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- Bootstrap 4 CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <!-- Custom CSS File-->
    <?php if ($css != 'css2' && $css != 'summernote' && $css != 'donate') { ?>
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev1.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev2.min.css') ?>">
    <?php } elseif ($css == 'donate') { ?>
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev1.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev2.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style_frontend2.css') ?>">
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-85myPC57TxX7q4qH"></script>
       
    <?php } elseif ($css == 'summernote') {  ?>
        <link rel="stylesheet" href="<?= base_url('assets/summernote/')  ?>summernote-bs4.css">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev1.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev2.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style_frontend.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style_frontend2.css') ?>">
    <?php } else { ?>
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev1.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/uidev2.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style_frontend.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style_frontend2.css') ?>">
    <?php } ?>
    <!-- Custom JS FIle-->
    <script async src="<?= base_url('assets/js/uidev.js') ?>"></script>
    <!-- Responsive CSS File-->
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.min.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/img/profile/') ?>default.jpeg">
    <!--<link rel="manifest" href="<?= base_url('manifest.json') ?>">-->
    

 <!--Global site tag (gtag.js) - Google Analytics -->
  <!--  <script async src="https://www.googletagmanager.com/gtag/js?id=G-KSGY45ZWW0"></script>-->
  <!--  <script>-->
  <!--window.dataLayer = window.dataLayer || [];-->
  <!--function gtag(){dataLayer.push(arguments);}-->
  <!--gtag('js', new Date());-->

  <!--gtag('config', 'G-KSGY45ZWW0');-->
  <!--  </script>-->

</head>

<body>