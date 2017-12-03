<?php
	/*
		Template Name: Project Gallery Template
	*/
 ?>
 <?php get_header(); ?>
 <div class="page-master-container">
	 <div class="main-content contact-page-wrapper">
		 <div class="page-detail-wrapper">
			 <?php if(have_posts()): ?>
				 <?php while(have_posts()): the_post(); ?>
					 <h2 class="page-title"><?php the_title(); ?></h2>
					 <?php the_content(); ?>
				 <?php endwhile; wp_reset_query(); ?>
			 <?php endif; ?>
		 </div>
			 <!-- Projects start here -->
			 <div class="flex-row projects-container">
				 <?php $args = array( 'post_type' => 'project', 'posts_per_page' => 6, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 ); ?>
				 <?php $loop = new WP_Query( $args ); ?>
				 <?php if($loop->have_posts()): ?>
					 <?php while($loop->have_posts()): $loop->the_post(); ?>
						 <?php include('partials/projects.php'); ?>
					 <?php endwhile; ?>
					 <div class="pageNavigation">
						 <?php
							 previous_posts_link( "<span class='pagination prev-page'>Prev</span>" );
							 next_posts_link( "<span class='pagination next-page'>Next</span>", $loop->max_num_pages );
						 ?>
					 </div>
				 <?php endif; ?>
			 </div>
		 </div>
	 </div>
 </div>
 <?php include('footer.php') ?>
