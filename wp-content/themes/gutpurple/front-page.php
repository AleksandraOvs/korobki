<?php
get_header();
?>

<main id="primary" class="site-main">

    <?php the_content() ?>

    <?php get_template_part('template-parts/faq-block') ?>

</main>

<?php get_footer(); ?>