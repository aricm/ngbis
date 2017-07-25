</main>

<div class="container-fluid bg-texture footer-video">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-lg-5 col-md-12 col-sm-12 footer-video-text">
                <h4 class="mb-3"><strong>Watch Our Video</strong></h4>
                <p>At BiS, we understand that your documents are the heart of your business, and we don't want you to miss a beat.</p>
                <p>Storage is important; but quick, easy access to your records is absolutely critical.</p>
                <p>Document management is time-consuming. Instead of focusing on their primary responsibilities and tasks, your employees may be wasting valuable time hunting down files and organizing overdue purge projects.</p>
                <p>
                    <a href="<?php echo home_url(); ?>/about/record-control-experts/" class="btn btn-primary">LEARN MORE <i class="fa fa-caret-right"></i></a>
                </p>
            </div>
            <div class="col col-12 col-lg-7 col-md-12 col-sm-12 embed-responsive embed-responsive-16by9 footer-video-player">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pEjOKBjLPDI?rel=0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div class="footer-tagline">
    BiS will take excellent care of your important documents.
</div>

<div class="container-fluid text-center footer-contact">
    <div class="container">
        <h4>Contact Us!</h4>
        <?php echo do_shortcode( '[contact-form-7 id="4" title="Footer Contact Us" html_class="footer-form"]' ); ?>
    </div>
</div>

<div class="container subfooter-container">
    <div class="row">
        <div class="col col-12 col-sm-12 col-lg-6 footer-logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo2.png" alt=""></a>
        </div>
        <div class="col col-12 col-sm-12 col-lg-6 d-flex flex-column justify-content-between">
            <div class="social-phone-container">
                <div class="row footer-info">
                    <div class="col"><a href="tel:5137213453">Call (513) 721-FILE</a><br>
                    <a href="tel:5137213453">(513) 721-3453</a></div>

                    <div class="col">2201 Spring Grove Ave.<br>
                    Cincinnati, OH 45214</div>
                </div>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/BIS.Inc" target="_blank"><i class="fa fa-fw fa-facebook"></i></a>
                <a href="https://twitter.com/721file" target="_blank"><i class="fa fa-fw fa-twitter"></i></a>
                <a href="https://www.youtube.com/user/721File" target="_blank"><i class="fa fa-fw fa-youtube"></i></a>
                <a href="https://www.linkedin.com/company/business-information-solutions-inc" target="_blank"><i class="fa fa-fw fa-linkedin"></i></a>
                <a href="https://plus.google.com/108312288827231568420/posts" target="_blank"><i class="fa fa-fw fa-google-plus"></i></a>
                <a href="<?php echo home_url(); ?>/blog"><i class="fa fa-fw fa-rss"></i></a>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid site-footer">
    <div class="container flex-footer">
        <div class="copyright">Copyright&copy; <?php echo date("Y"); ?>. All Rights Reserved <span class="pipe">|</span> <span class="copyright-links"><a href="<?php echo home_url(); ?>/privacy">Privacy Statement</a></span>
        </div>
        <div class="netgain-seo">
            Website Designed by <img src="<?php bloginfo('template_url'); ?>/img/netgain-logo-sm.png" alt="">
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<div id="closeNav" class="close-nav hidden-xl-up">Close <i class="fa fa-times"></i></button>
<script>
    jQuery(document).on("scroll", function() {
        if
      (jQuery(document).scrollTop() > 25){
          jQuery("body").addClass("sticky-header");
        }
        else
        {
            jQuery("body").removeClass("sticky-header");
        }
    });

    jQuery('#navToggle, #closeNav').on('click', function() {
        jQuery('#mainNav').toggleClass('open');
        jQuery('#closeNav').toggleClass('open');
        jQuery('body').toggleClass('no-scroll');
    });
</script>
</body>
</html>
