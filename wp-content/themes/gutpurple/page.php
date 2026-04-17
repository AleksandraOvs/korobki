<?php
get_header();
?>

<main id="primary" class="site-main">

	<div id="ajax-content" data-page-id="<?php echo get_the_ID(); ?>"></div>

	<?php get_template_part('template-parts/faq-block') ?>

	<?php
	$seo_text = carbon_get_post_meta(get_the_ID(), 'seo_text');

	if (!empty($seo_text)) {
		echo '<div class="container">';
		echo $seo_text;
		echo '</div>';
	}
	?>

</main>

<?php get_footer(); ?>