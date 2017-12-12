
<!-- arg = array(
 post_type = projects
 id = getThememod('deatured 21')
) -->

<div class="featured-projects">
	<div id="feature-slide-show">
			<?php if(!get_theme_mod('featured_project_1')){ ?>
				<div class="slide-wrapper slide" data-slide="1" id="slide-1">
					<a href="#">
						<div class="featured-project-image">
							<img src="<?= get_template_directory_uri() . '/images/sliderplaceholder.jpg';?>" alt="featured project">
						</div>
						<div class="featured-project-description">
							<h2>PROJECT TITLE</h2>
							<p>A Sub Heading</p>
						</div>
					</a>
				</div>
			<?php }?>
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
		<?php } else{
		}} ?>
	</div>
	<div id="mobile-feature-slide-show">
		<?php if(!get_theme_mod('featured_project_mobile_1')){ ?>
			<div class="mobile-slide-wrapper slide" data-slide="1" id="mobile-slide-1">
				<a href="#">
				<div class="featured-project-image">
					<img src="<?= get_template_directory_uri() . '/images/mobileslide.jpg';?>" alt="featured project">
				</div>
				<div style="color: white;" class="featured-project-description">
					<h2>PROJECT TITLE</h2>
					<p>Sub Title</p>
				</div>
				</a>
			</div>
		<?php } ?>
		<?php for ($i=1; $i <= 3; $i++) {
			if(get_theme_mod('featured_project_mobile_'.$i)){ ?>
				<div class="mobile-slide-wrapper slide" data-slide="<?= $i ?>" id="mobile-slide-<?= $i ?>">
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
			<?php }?>
		<?php } ?>
	</div>
</div>
<div class="featured-buttons-wrapper">
			<?php for ($i=1; $i <= 3; $i++) { ?>
				<?php if(get_theme_mod('featured_project_'.$i)){ ?>
					<?php if(get_theme_mod('featured_project_2') || get_theme_mod('featured_project_3') ){ ?>
					<div><i id="feature-slide-btn-<?= $i ?>" class="fa fa-circle slide-btn feature-button<?=$i==1?' active-slide-btn':'';?>" data-feature="<?= $i ?>" aria-hidden="true"></i></div>
					<?php } ?>
				<?php } else{} ?>
			<?php } ?>
</div>
<div class="mobile-featured-buttons-wrapper">
			<?php for ($i=1; $i <= 3; $i++) { ?>
				<?php if(get_theme_mod('featured_project_mobile_'.$i)){ ?>
					<?php if(get_theme_mod('featured_project_mobile_2') || get_theme_mod('featured_project_mobile_3') ){ ?>
				<div><i id="mobile-feature-slide-btn-<?= $i ?>" class="fa fa-circle slide-btn feature-button<?=$i==1?' active-slide-btn':'';?>" data-feature="<?= $i ?>" aria-hidden="true"></i></div>
				<?php } ?>
			<?php } else{} ?>
		<?php } ?>
		<?php if(!get_theme_mod('featured_project_mobile_2') && !get_theme_mod('featured_project_mobile_3')){ ?>
			<div style="width: 100%; text-align: center;"><i id="mobile-down-btn" class="material-icons">arrow_downward</i></div>
		<?php } ?>
</div>
