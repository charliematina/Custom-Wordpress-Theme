<?php get_header(); ?>
<div class="page-master-container">
		<div class="main-content">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<div class="project-page-details">
					  <h2 class="project-page-title"><?php the_title(); ?></h2>
					  <span class="page-date"><?php the_date(); ?></span>
					</div>
					<div class="project-page-content-container">
						<?= the_content(); ?>
						<!-- <?php the_terms( $post->ID, 'tag', 'Categories: ', ' / ' ); ?> -->
					</div>
		  		<?php endwhile; ?>
		  		<?php if( is_singular('project') ) { ?>
					<div class="pageNavigation">
						<?php
							previous_post_link(  "<span class='pagination prev-page'>".'%link', 'NEXT <i class="fa fa-long-arrow-right" aria-hidden="true"></i> '."</span>" );
							next_post_link( "<span class='pagination next-page'>".'%link', '<i class="fa fa-long-arrow-left" aria-hidden="true"></i> PREV'."</span>" );
						?>
					</div>
				<?php } ?>
		  <?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
