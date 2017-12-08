<?php get_header(); ?>
<div class="page-master-container">
	   <div class="main-content">
		   <div class="page-detail-wrapper">
			   <?php if(have_posts()): ?>
				   <?php while(have_posts()): the_post(); ?>
					   <h2 class="page-title"><?php the_title(); ?></h2>
					   <?php the_content(); ?>
				   <?php endwhile; wp_reset_query(); ?>
			   <?php endif; ?>
		   </div>

	   </div>
   </div>
<?php get_footer(); ?>
