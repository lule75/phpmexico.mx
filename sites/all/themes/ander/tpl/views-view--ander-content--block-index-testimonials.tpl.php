<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div class="parallax_over">
	<div class=" testimonials_heading">
		<div class="container"  data-animation-target="17">
			<div class="row">
				<?php print $header; ?>
				<div class="col-xs-8 col-xs-offset-2">
					<div id="testimonials_slide">
						<?php print $rows; ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

