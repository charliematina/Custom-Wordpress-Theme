<?php get_header(); ?>
<?php define( 'WP_USE_THEMES', false ); get_header(); ?>
	<div class="landing-page-content">
		<?php include ('partials/featured_projects.php'); ?>
	</div>
	<div class="landing-page-bottom-nav">
		<?php my_social_icons_output() ?>
		<div class="go-down-btn">
			<i class="material-icons">arrow_downward</i>
		</div>
	</div>
	<div class="master-container">
		<div class="main-content">
			<div class="projects-wrapper">
				<div class="page-title">
					<h2><?= get_theme_mod('homepage_header', __('PROJECTS')) ?></h2>
				</div>
				<!-- Projects start here -->
				<div class="flex-row projects-container">
					<?php $args = array( 'post_type' => 'project', 'posts_per_page' => 3); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<?php if($loop->have_posts()): ?>
						<?php while($loop->have_posts()): $loop->the_post(); ?>
							<?php include('partials/projects.php'); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('footer.php') ?>
