<?php get_header(); ?>
<div class="page-master-container">
		<div class="main-content">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<div class="single-team-member-image">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="single-team-page-details">
						<h2 class="single-team-page-title"><?php the_title(); ?></h2>
						<p class="sub-header"><?= get_post_meta($post->ID, 'jobRole', true); ?></p>
						<div class="single-team-member-content">
							<?= the_content(); ?>
						</div>
					</div>
		  		<?php endwhile; ?>
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
