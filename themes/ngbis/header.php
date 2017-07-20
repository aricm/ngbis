<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="container-fluid site-header" id="siteHeader">
        <div class="container d-flex justify-content-between">
            <div class="header-logo">
                <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></a>
            </div>
            <div class="header-right d-flex flex-column justify-content-between">
                <div class="header-info">
                    phone/address
                </div>
                <div class="header-nav-container hidden-lg-down">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
                    </nav><!-- #site-navigation -->
                </div>
            </div>

        </div>
    </header>

    <main>
