<?php
    get_header();
?>
<div class="page-mast">
    <img src="<?php echo home_url(); ?>/wp-content/uploads/2017/07/mast-history.jpg" alt="">
</div>

<div class="contact-bar">
    Control the Security of Managing Your Business Records <a href="<?php echo home_url(); ?>/contact" class="btn btn-primary">Work With Us</a>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col col-12 col-md-9 blog-post-content">

            <?php while ( have_posts() ) : the_post(); ?>

            <div class="blog-post-title">
                <h1><?php the_title(); ?></h1>
                <i class="fa fa-calendar"></i>
                <small class="text-muted"><em><?php the_date(); ?></em></small>
            </div>
            <article class="blog-post-body">
                <?php the_content(); ?>
            </article>

            <?php endwhile; // End of the loop. ?>

        </div>

        <div class="col col-12 col-md-3">

            <div class="blog-sidebar">
                <?php dynamic_sidebar( 'page_sidebar_1' ); ?>
            </div>

        </div>
    </div>
</div>

<?php
    get_footer();
