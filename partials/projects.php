<div class="col project-thumb-wrapper">
	<a class="project-thumb-link" href="<?= get_permalink()?>">
		<div class="project-thumb-overlay"></div>
		<div class="project-thumb-image">
			<?php if (has_post_thumbnail() ): ?>
				<!-- <?php the_post_thumbnail(); ?> -->
				<img data-src="<?= the_post_thumbnail_url(); ?>" src="" alt="test">
			<?php else: ?>
				<?php  the_title(); ?>
			<?php endif; ?>
		</div>
		<div class="project-thumb-description">
			<p class="project-thumb-title"><?php  the_title(); ?></p>
			<p class="project-thumb-date"><?=  get_the_date(); ?></p>
		</div>
	</a>
</div>
