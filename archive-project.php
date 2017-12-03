<?php get_header(); ?>
	<?php if(have_posts()): ?>
	  <?php while(have_posts()): the_post(); ?>
		  <?php the_title(); ?>
	  <?php endwhile; ?>
  <?php endif; ?>
  <p class="info-content"><?php the_content(); ?></p>
<?php get_footer(); ?>
