<?php
function render_template($template_id)
{
    // HERO
    $hero_title    = carbon_get_post_meta($template_id, 'hero_title');
    $hero_subtitle = carbon_get_post_meta($template_id, 'hero_subtitle');
    $hero_bg       = carbon_get_post_meta($template_id, 'hero_bg');
    $hero_btn_link = carbon_get_post_meta($template_id, 'hero_btn_link');
    $hero_btn_text = carbon_get_post_meta($template_id, 'hero_btn_text');

    if ($hero_title || $hero_subtitle) {
        get_template_part('template-parts/blocks/hero', null, [
            'title'    => $hero_title,
            'subtitle' => $hero_subtitle,
            'bg'       => $hero_bg,
            'link'     => $hero_btn_link,
            'btn'      => $hero_btn_text,
        ]);
    }
}
