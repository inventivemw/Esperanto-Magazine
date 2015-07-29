<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
  <head>
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
  	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/screen.css"/>
    <!-- Webfonts -->
    <script type="text/javascript" src="//use.typekit.net/xgw3vui.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <meta name="google-site-verification" content="K5a0YkP5ijgBW7csFzU7yn6Ns1ysJ6Ys_1HgMGGeWBY" />
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <!-- Navigation -->
    	<nav>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
            <?php 
              $defaults = array(
                'container'       => 'ul',
                'menu_class'      => 'nav navbar-nav',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
              );
              wp_nav_menu($defaults);
            ?>
        </div>
  	 </nav>
     <!-- END Navigation -->
    </header>
