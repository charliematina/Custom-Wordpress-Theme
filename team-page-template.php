<?php
	/*
		Template Name: Team Page
	*/
 ?>

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
			<?php $args = array( 'post_type' => 'team_member', 'posts_per_page' => 99, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 ); ?>
			<?php $loop = new WP_Query( $args ); ?>
			<?php if($loop->have_posts()): ?>
				<?php while($loop->have_posts()): $loop->the_post(); ?>
					<div class="team-member-wrapper">
						<a href="<?= get_permalink(); ?>">
							<div class="team-member-image">
		 						<?php the_post_thumbnail(); ?>
		 					</div>
		 					<div class="team-page-details">
								<h2 class="team-page-title"><?php the_title(); ?></h2>
		 						<p class="sub-header"><?= get_post_meta($post->ID, 'jobRole', true); ?></p>
		 					</div>
						</a>
						<p class="team-member-description"><?= get_the_excerpt(); ?></p>
					</div>
 		  		<?php endwhile; ?>
			<?php endif; ?>
 			<?php if(have_posts()): ?>
 		  		<?php if( is_singular('project') ) { ?>
 					<div class="pageNavigation">
 						<?php
 							previous_post_link(  "<span class='pagination prev-page'>%link</span>" );
 							next_post_link( "<span class='pagination next-page'>%link</span>" );
 						?>
 					</div>
 				<?php } ?>
 		  <?php endif; ?>
 		</div>
 	</div>
 <?php get_footer(); ?>
