 <?php get_header(); ?>
 <div class="page-master-container project-master">
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
			 <div class="flex-row projects-container project-page">
				 <?php $args = array( 'post_type' => 'project', 'posts_per_page' => 2, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 ); ?>
				 <?php $loop = new WP_Query( $args ); ?>
				 <?php if($loop->have_posts()): ?>
					 <?php while($loop->have_posts()): $loop->the_post(); ?>
						 <div class="col project-thumb-wrapper">
						 	<a class="project-thumb-link" href="<?= get_permalink()?>">
						 		<div class="project-thumb-overlay"></div>
						 		<div class="project-thumb-image">
						 			<?php if (has_post_thumbnail() ): ?>
						 				<!-- <?php the_post_thumbnail(); ?> -->
						 				<img src="<?= the_post_thumbnail_url(); ?>" alt="test">
						 			<?php else: ?>
						 				<h2><?php  the_title(); ?></h2>
						 			<?php endif; ?>
						 		</div>
						 		<div class="project-thumb-description">
						 			<p class="project-thumb-title"><?php  the_title(); ?></p>
						 			<p class="project-thumb-date"><?=  get_the_date(); ?></p>
						 		</div>
						 	</a>
						 </div>
					 <?php endwhile; ?>
					 <div class="pageNavigation">
						 <?php
							 previous_posts_link( "<span class='pagination prev-page'>Prev</span>",$loop->max_num_pages );
							 next_posts_link( "<span class='pagination next-page'>Next</span>", $loop->max_num_pages );
						 ?>
					 </div>
				 <?php endif; ?>
			 </div>
		 </div>
	 </div>
 </div>
 <?php include('footer.php') ?>
