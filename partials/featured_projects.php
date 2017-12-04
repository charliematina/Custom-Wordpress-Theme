<div class="featured-projects">
	<div id="feature-slide-show">

		<?php for ($i=1; $i <= 3; $i++) {
			if(get_theme_mod('featured_project_'.$i)){ ?>
				<div class="slide-wrapper slide" data-slide="<?= $i ?>" id="slide-<?= $i ?>">
					<a href="<?= get_theme_mod('featured_project_link_'.$i) ?>">
					<div class="featured-project-image">
						<img src="<?= get_theme_mod('featured_project_'.$i)?>" alt="featured project">
					</div>
					<div class="featured-project-description">
						<h2><?= get_theme_mod('featured_project_title_'.$i)?></h2>
						<p><?= get_theme_mod('featured_project_subheader_'.$i)?></p>
					</div>
					</a>
				</div>
		<?php } } ?>
	</div>
	<div id="mobile-feature-slide-show">
		<?php for ($i=1; $i <= 3; $i++) { ?>
				<div class="mobile-slide-wrapper slide" data-slide="<?= $i ?>" id="slide-<?= $i ?>">
					<a href="<?= get_theme_mod('featured_project_link_mobile_'.$i) ?>">
					<div class="featured-project-image">
						<img src="<?= get_theme_mod('featured_project_mobile_'.$i)?>" alt="featured project">
					</div>
					<div class="featured-project-description">
						<h2><?= get_theme_mod('featured_project_title_mobile_'.$i)?></h2>
						<p><?= get_theme_mod('featured_project_subheader_mobile_'.$i)?></p>
					</div>
					</a>
				</div>
		<?php } ?>
	</div>
</div>
<div class="featured-buttons-wrapper">
			<?php for ($i=1; $i <= 3; $i++) { ?>
				<?php if(get_theme_mod('featured_project_'.$i)): ?>
				<div><i id="feature-slide-btn-<?= $i ?>" class="fa fa-circle slide-btn feature-button<?=$i==1?' active-slide-btn':'';?>" data-feature="<?= $i ?>" aria-hidden="true"></i></div>
				<?php endif; ?>
			<?php } ?>
</div>
<div class="mobile-featured-buttons-wrapper">
	<i id="feature-slide-btn-1"class="fa fa-circle feature-button" aria-hidden="true" data-feature="1"></i>
	<i id="feature-slide-btn-2"class="fa fa-circle feature-button" aria-hidden="true" data-feature="2"></i>
	<i id="feature-slide-btn-3"class="fa fa-circle feature-button" aria-hidden="true" data-feature="3"></i>
</div>
