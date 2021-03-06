<?php
// Эта функция помещает файл Normalize.css в очередь для использования. Первый параметр это имя таблицы стилей, второе это URL. Здесь мы
// используем онлайн версию css файла.
function add_normalize_CSS()
{
    wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

// Регистрирует новую боковую панель под названием 'sidebar'
function add_widget_Support()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

// Подхватывает(hook) инициацию виджета и запускает нашу функцию
add_action('widgets_init', 'add_Widget_Support');

// Регистрирует новое навигационное меню
function add_Main_Nav()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

// Подхватывает (hook) init хук-событие, запускает функцию нашего навигационного меню
add_action('init', 'add_Main_Nav');

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});
function my_near_api_js_scripts()
{
    wp_deregister_script('near-api-js');
    wp_register_script('near-api-js', 'https://cdn.jsdelivr.net/npm/near-api-js@0.41.0/dist/near-api-js.min.js');
    wp_enqueue_script('near-api-js');
}

add_action('wp_enqueue_scripts', 'my_near_api_js_scripts');
