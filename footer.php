<?php wp_footer(); ?>
	<footer>
		<div class="full-footer footer-content-wrapper">
			<div class="full-footer-top footer-section">
			</div>
			<div class="footer-section full-footer-mdl">
				<?php my_social_icons_output() ?>
			</div>
			<div class="footer-section full-footer-btm">
				<div class="theme-by"><a href="https://charlie.matina.yoobee.net.nz/charliematina/">Theme</a>
				</div>
				<div class="footer-copyright"><p><?= get_theme_mod('footer_text', __('©2017 ExampleSite, Inc.')) ?></div>
				<div class="footer-to-top-btn"><i class="material-icons">arrow_upward</i></div>
			</div>
		</div>
		<div class="mobile-footer">
			<div class="footer-content-wrapper">
				<?php my_social_icons_output() ?>
				<div class="footer-to-top-btn">
					<i class="material-icons">arrow_upward</i>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
