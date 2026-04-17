<?php

add_action('wp_enqueue_scripts', function () {

    wp_enqueue_script(
        'ajax-page',
        get_template_directory_uri() . '/js/ajax-page.js',
        [],
        null,
        true
    );

    wp_localize_script('ajax-page', 'myAjax', [
        'url' => admin_url('admin-ajax.php')
    ]);
});


add_action('wp_ajax_load_page_content', 'load_page_content');
add_action('wp_ajax_nopriv_load_page_content', 'load_page_content');


function load_page_content()
{
    $page_id = intval($_POST['page_id']);

    if (!$page_id) {
        wp_send_json_error('Нет ID страницы');
    }

    $post = get_post($page_id);

    if (!$post) {
        wp_send_json_error('Страница не найдена');
    }

    // 🔥 КРИТИЧНО: делаем WP "как на обычной странице"
    global $post;
    $post = get_post($page_id);
    setup_postdata($post);

    ob_start();

    echo '<div class="page-content" id="content">';

    // 🔥 ВАЖНО: WP сам рендерит блоки как на фронте
    echo apply_filters('the_content', $post->post_content);

    echo '</div>';

    wp_reset_postdata();

    wp_send_json_success(ob_get_clean());
}
