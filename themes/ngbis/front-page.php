<?php
    get_header();
?>
	<?php echo do_shortcode('[smartslider3 slider=2]'); ?>

	<div class="contact-bar">
		Control the Security of Managing Your Business Records <a href="/contact" class="btn btn-primary">Work With Us</a>
	</div>

    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // End of the loop. ?>

<?php
    get_footer();
