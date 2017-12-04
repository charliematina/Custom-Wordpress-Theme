<?php
	/*
		Template Name: Contact Form Template
	*/
 ?>
 <?php get_header(); ?>
 <div class="page-master-container">
 		<div class="main-content contact-page-wrapper">
			<div class="page-detail-wrapper">
				<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<h2 class="page-title"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					<?php endwhile; wp_reset_query(); ?>
				<?php endif; ?>
			</div>
			<div class="contact-form-wrapper">
				<form class="contact-form" action="#" method="post">
					<div class="form-fields">
						<div class="form-input">
							<input id="name-field" class="input-field" type="text" name="name" placeholder="YOUR NAME">
							<div class="form-error"></div>
						</div>
						<div class="form-input">
							<input id="email-field" class="input-field" type="email" name="email" placeholder="YOUR EMAIL">
							<div class="form-error"></div>
						</div>
						<div class="form-input">
							<input id="number-field" class="input-field" type="number" name="number" placeholder="YOUR NUMBER">
							<div class="form-error"></div>
						</div>
						<div class="form-input">
							<textarea id="textarea-field" class="input-field" type="text" name="enquiry" placeholder="YOUR ENQUIRY"></textarea>
							<div class="form-error"></div>
						</div>
					</div>
					<a id="contact-submit-button" class="button" type="" name="button" href=""><div>SUBMIT</div></a>
				</form>
			</div>
 		</div>
 	</div>
 <?php get_footer(); ?>
