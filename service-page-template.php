<?php
	/*
		Template Name: Service List Template
	*/
 ?>
 <?php get_header(); ?>
 <div class="page-master-container">
 		<div class="main-content split-page">
			<div class="page-detail-wrapper">
				<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<h2 class="page-title"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					<?php endwhile; wp_reset_query(); ?>
				<?php endif; ?>
			</div>
			<div class="service-list-container">
				<?php $args = array( 'post_type' => 'service', 'posts_per_page' => 99, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 ); ?>
				<?php $loop = new WP_Query( $args ); ?>
				<?php if($loop->have_posts()): ?>
					<?php while($loop->have_posts()): $loop->the_post(); ?>
						<a href="<?= get_permalink(); ?>">
							<div class="service-list-item">
								<?php the_title(); ?>
							</div>
						</a>
	 		  		<?php endwhile; ?>
				<?php endif; ?>
			</div>
 		</div>
 	</div>
 <?php get_footer(); ?>
