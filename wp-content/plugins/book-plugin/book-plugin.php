<?php
/*
Plugin Name: Book Custom Post Type
Description: Registers a custom post type "Book" with Author Name and Published Year meta fields.
Version: 1.0
Author: Rakesh Joshi
*/

add_action('init', 'bp_register_book_post_type');
function bp_register_book_post_type()
{
    $labels = array(
        'name' => 'Books',
        'singular_name' => 'Book',
        'add_new_item' => 'Add New Book',
        'edit_item' => 'Edit Book',
        'new_item' => 'New Book',
        'view_item' => 'View Book',
        'all_items' => 'All Books',
        'search_items' => 'Search Books',
        'not_found' => 'No books found',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title', 'editor'),
        'show_in_rest' => true,
    );

    register_post_type('book', $args);
}

add_action('add_meta_boxes', 'bp_add_book_meta_box');
function bp_add_book_meta_box()
{
    add_meta_box(
        'bp_book_meta',
        'Book Details',
        'bp_render_book_meta_box',
        'book',
        'normal',
        'default'
    );
}

function bp_render_book_meta_box($post)
{
    wp_nonce_field('bp_save_book_meta', 'bp_book_meta_nonce');

    $author = get_post_meta($post->ID, '_bp_author_name', true);
    $year = get_post_meta($post->ID, '_bp_published_year', true);

    echo '<p><label for="bp_author_name">Author Name:</label><br>';
    echo '<input type="text" id="bp_author_name" name="bp_author_name" value="' . esc_attr($author) . '" class="widefat"></p>';

    echo '<p><label for="bp_published_year">Published Year:</label><br>';
    echo '<input type="number" id="bp_published_year" name="bp_published_year" value="' . esc_attr($year) . '" class="widefat"></p>';
}

add_action('save_post', 'bp_save_book_meta');
function bp_save_book_meta($post_id)
{
    if (!isset($_POST['bp_book_meta_nonce']) || !wp_verify_nonce($_POST['bp_book_meta_nonce'], 'bp_save_book_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['bp_author_name'])) {
        update_post_meta($post_id, '_bp_author_name', sanitize_text_field($_POST['bp_author_name']));
    }

    if (isset($_POST['bp_published_year'])) {
        update_post_meta($post_id, '_bp_published_year', intval($_POST['bp_published_year']));
    }
}

add_filter('manage_book_posts_columns', 'bp_add_custom_columns');
function bp_add_custom_columns($columns)
{
    $columns['bp_author_name'] = 'Author Name';
    $columns['bp_published_year'] = 'Published Year';
    return $columns;
}

add_action('manage_book_posts_custom_column', 'bp_render_custom_columns', 10, 2);
function bp_render_custom_columns($column, $post_id)
{
    if ($column === 'bp_author_name') {
        echo esc_html(get_post_meta($post_id, '_bp_author_name', true));
    }

    if ($column === 'bp_published_year') {
        echo esc_html(get_post_meta($post_id, '_bp_published_year', true));
    }
}


add_filter('manage_book_posts_columns', 'bp_add_custom_book_columns');

function bp_add_custom_book_columns($columns)
{
    $columns['bp_author_name'] = 'Author Name';
    $columns['bp_published_year'] = 'Published Year';
    return $columns;
}


add_action('manage_book_posts_custom_column', 'bp_render_custom_book_columns', 10, 2);

function bp_render_custom_book_columns($column, $post_id)
{
    if ($column === 'bp_author_name') {
        echo esc_html(get_post_meta($post_id, '_bp_author_name', true));
    }

    if ($column === 'bp_published_year') {
        echo esc_html(get_post_meta($post_id, '_bp_published_year', true));
    }
}
