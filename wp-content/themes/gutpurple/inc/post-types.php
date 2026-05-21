<?php


function register_template_post_type()
{
    register_post_type('custom_template', [
        'labels' => [
            'name' => 'Шаблоны',
            'singular_name' => 'Шаблон',
            'add_new' => 'Добавить шаблон',
            'add_new_item' => 'Добавить новый шаблон',
            'edit_item' => 'Редактировать шаблон',
            'new_item' => 'Новый шаблон',
            'view_item' => 'Просмотреть шаблон',
            'search_items' => 'Поиск шаблонов',
            'not_found' => 'Шаблоны не найдены',
            'menu_name' => 'Шаблоны',
        ],
        'public' => true, // ✅ обязательно true, чтобы включился Gutenberg
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true, // ✅ без этого Gutenberg не заработает
        'supports' => ['title', 'editor'], // ✅ поддержка редактора
        'menu_icon' => 'dashicons-layout',
        'has_archive' => false,
        'rewrite' => false,
        'publicly_queryable' => false, // можно отключить вывод на фронте
    ]);
}
add_action('init', 'register_template_post_type');

add_action('pre_get_posts', function ($query) {
    if (
        !is_admin() &&
        $query->is_main_query() &&
        $query->is_tag()
    ) {
        $query->set('post_type', ['post', 'events']);
    }
});
