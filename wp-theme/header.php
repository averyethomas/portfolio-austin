<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--CSS-->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css">
    <?php wp_head(); ?>
    <!--FONT AWESOME-->
    <script src="https://use.fontawesome.com/879fcc8444.js"></script>
    <!--GOOGLE ANALYTICS-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-98584676-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-98584676-3');
    </script>

</head>
<body ng-app="angularApp" ng-controller="mainCtrl" ng-class="{'navOpen' : navToggle}">
    <nav>
      <div class="container">
        <h1>Austin <a href="<?php echo get_site_url(); ?>" ><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.gif" /></a> Thomas</h1>
        <ul ng-class="{'navOpen' : navToggle}">
           <?php main_nav(); ?>
        </ul>
      </div>
    </nav>