<?php 
global $base_url, $base_root;

$node_author = user_load($node->uid);

$img_url = '';
if(isset($node->field_image)){

	$img_uri = @$node->field_image['und'][0]['uri'];

	$img_url = file_create_url($img_uri);

	$img_uri_1 = @$node->field_image['und'][1]['uri'];

}
?>
<?php if($page) { ?>
<div class="col-md-8">
	<div class="portfolioAjaxImage">
		<div class="portfolio_slide">
			<?php
				foreach($node->field_images['und'] as $key => $value) {
					$image_uri = $node->field_images['und'][$key]['uri'];
					$image_url = file_create_url($image_uri);
			?>
				<div class="item">
					<a href="<?php print $image_url; ?>" data-gal="prettyPhoto">
						<img src="<?php print $image_url; ?>" alt="<?php print $title.' - '.$key; ?>">
					</a>
				</div>
            <?php
            	} 
            ?>
		</div>
	</div>
</div>
<div class="col-md-4">
	<h3><?php print $title; ?></h3>
	<div class="hr hr_small">
		<span class="hr_inner"></span>
	</div>
	<div class="portfolioContent">
		<p class="portfolioDescription"><?php print $node->field_description['und'][0]['value']; ?></p>
		<p><?php print render($content['body']); ?></p>
		<ul class="portfolioAjaxMetaList">
			<li><strong><?php print t('Categoría :');?></strong> <?php print strip_tags(render($content['field_portfolios_categories']),'<a>');?></li>
		</ul>
		<br>
		<a href="<?php print $node->field_launch_project['und'][0]['value']; ?>" class="btn btn-deep"><?php print t('Conocer más')?></a>
	</div>
</div>

<?php } else { ?>

<?php } ?>
