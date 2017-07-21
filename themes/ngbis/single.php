<?php
    get_header();
?>
<div class="page-mast">
    <img src="/wp-content/uploads/2017/07/mast-backup.png" alt="">
</div>

<div class="contact-bar">
    Control the Security of Managing Your Business Records <a href="/contact" class="btn btn-primary">Work With Us</a>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col col-lg-9 col-md-12 blog-post-content">
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="blog-post-title">
                    <h1><?php the_title(); ?></h1>
                    <i class="fa fa-calendar"></i>
                    <small class="text-muted"><em><?php the_date(); ?></em></small>
                </div>

                <?php the_content(); ?>

            <?php endwhile; // End of the loop. ?>
        </div>

        <div class="col col-lg-3 hidden-md-down">
            <div class="blog-sidebar">
                <a class="btn btn-block btn-secondary" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><i class="fa fa-long-arrow-left"></i> Back to blog</a>

                <?php dynamic_sidebar( 'page_sidebar_1' ); ?>
            </div>


        </div>
    </div>
</div>

<?php
    get_footer();
