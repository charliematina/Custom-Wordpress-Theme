<?php get_header(); ?>
<div class="page-master-container">
	<?php if(have_posts()): ?>
		<?php if(has_post_thumbnail()): ?>
   			<div class="main-content split-page">
			<div class="page-detail-wrapper service-page-wrapper">
		<?php else: ?>
			<div class="main-content  service-no-image">
			<div class="page-detail-wrapper">
		<?php endif; ?>
	<?php endif; ?>
			<!-- <div class="page-detail-wrapper service-page-wrapper"> -->
			   <?php if(have_posts()): ?>
				   <?php while(have_posts()): the_post(); ?>
					   <h2 class="page-title"><?php the_title(); ?></h2>
					   <?php the_content(); ?>
				   <?php endwhile; wp_reset_query(); ?>
			   <?php endif; ?>
				<div class="button get-in-touch-btn">GET IN TOUCH</div>
				<div class="hidden-form">
					<?php include('partials/contact_form.php') ?>
				</div>
		   </div>
		   <?php if(have_posts()): ?>
			   <?php if(has_post_thumbnail()): ?>
				   <div class="service-image-wrapper">
				   		<?php the_post_thumbnail(); ?>
				   </div>
			   <?php endif; ?>
		   <?php endif; ?>
	   </div>
   </div>
<?php get_footer(); ?>
