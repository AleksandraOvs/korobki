<?php
get_header();
?>

<main id="primary" class="site-main">

	<?php
	$current_post_id = get_queried_object_id();

	/**
	 * =========================
	 * GET TEMPLATE ID
	 * =========================
	 */
	$template_meta = carbon_get_post_meta($current_post_id, 'template_page');

	$template_id = 0;

	if (!empty($template_meta)) {
		$first = $template_meta[0] ?? null;

		if (is_array($first) && isset($first['id'])) {
			$template_id = (int) $first['id'];
		} elseif (is_numeric($first)) {
			$template_id = (int) $first;
		}
	}

	/**
	 * =========================
	 * RENDER TEMPLATE (CARBON SECTIONS)
	 * =========================
	 */
	if ($template_id) {

		echo '<div class="page-template">';

		// ALL TEMPLATE
		get_template_part('template-parts/custom-template', null, [
			'id' => $template_id
		]);

		echo '</div>';
	}

	/**
	 * =========================
	 * PAGE CONTENT (SEO TEXT)
	 * =========================
	 */
	echo '<div class="container page-content">';

	while (have_posts()) : the_post();
		the_content();
	endwhile;

	echo '</div>';
	?>

</main>

<?php get_footer(); ?>