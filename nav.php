<nav>
	<div class="navbar-item-wrapper">
		<!-- <div class="navbar-logo-wrapper"> -->
		<?php
			if ( has_custom_logo()) {
				?><div class="navbar-logo-wrapper"><?php the_custom_logo(); ?></div><?php
			} elseif (!has_custom_logo()) {
				?><div class="site-title-logo"><h2><a href="<?= home_url(); ?>"><?php blogInfo(); ?></a></h2></div><?php
			}
		?>
		<!-- </div> -->
		<div class="navbar-menu">
			<?php wp_nav_menu(array('theme_location'=>'primary-nav')); ?>
		</div>
		<div class="nav-bar-menu-icon">
			<div id="hamburger-wrapper" class="nav-bar-menu-icon">
				<div class="burger-line top"></div>
				<div class="burger-line mdl"></div>
			</div>
		</div>
	</div>
	<div class="mobile-navbar-wrapper">
		<?php
			if ( has_custom_logo()) {
				?><div class="navbar-logo-wrapper"><?php the_custom_logo(); ?></div><?php
			} elseif (!has_custom_logo()) {
				?><div class="site-title-logo"><h2><a href="<?= home_url(); ?>"><?php blogInfo(); ?></a></h2></div><?php
			}
		?>
		<div class="mobile-navbar-icon">
			<i class="material-icons">menu</i>
		</div>
		<div class="mobile-navbar-menu">
			<?php wp_nav_menu(array('theme_location'=>'primary-nav')); ?>
		</div>
	</div>
</nav>
