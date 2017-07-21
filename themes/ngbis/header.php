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
        <div class="container flex-header">
            <div class="header-logo">
                <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></a>
            </div>
            <div class="header-right">
                <div class="header-info">
                    <div class="header-phone"><a href="tel:5137213453">Call (513) 721-FILE</a></div>
                    <div class="header-address">2201 Spring Grove Ave., Cincinnati, OH 45214</div>
                </div>
                <div class="header-nav-container">

                    <a href="javascript:void(0);" id="navToggle" class="nav-toggle hidden-xl-up"><i class="fa fa-bars"></i></a>

                    <nav id="mainNav" class="main-nav" role="navigation">
                        <button type="button btn btn-warning" class="close-nav">Close <i class="fa fa-times"></i></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>

                        <a href="/contact" class="btn btn-primary nav-call-to-action">Work With Us</a>
                        </ul>
                    </nav><!-- #site-navigation -->
                </div>
            </div>

        </div>
    </header>

    <main>
