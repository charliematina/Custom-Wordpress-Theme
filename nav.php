<nav>
	<div class="navbar-item-wrapper">
		<div class="navbar-logo-wrapper">
			<?php
				if ( function_exists('the_custom_logo')) {
				    the_custom_logo();
				} else{
					the_title();
				}
			?>
		</div>
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
		<div class="mobile-navbar-logo">
			<?php
				if ( function_exists('the_custom_logo')) {
				    the_custom_logo();
				}
			?>
		</div>
		<div class="mobile-navbar-icon">
			<i class="material-icons">menu</i>
		</div>
		<div class="mobile-navbar-menu">
			<?php wp_nav_menu(array('theme_location'=>'primary-nav')); ?>
		</div>
	</div>
</nav>
