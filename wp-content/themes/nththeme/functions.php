<?php
// Support Featured Images
add_theme_support('post-thumbnails');


//Rating meta data
function add_rating_metabox() {
    add_meta_box('rating_metabox_1', 'Rating', 'rating_metabox_field', 'post');
}

function rating_metabox_field($post) {
    $value = !empty($post) && !empty($post->id) ? get_post_meta($post->id, 'rating_meta_key', true) : 0;
?>
    <fieldset class="inline-edit-col-left">
        <div class="inline-edit-col">
            <span class="title">Pick a Rating:</span>
            <select name="rating_input" id="rating_input">
                <option value="0" <?php selected($value, 0); ?>>0</option>
                <option value="1" <?php selected($value, 1); ?>>1</option>
                <option value="2" <?php selected($value, 2); ?>>2</option>
                <option value="3" <?php selected($value, 3); ?>>3</option>
                <option value="4" <?php selected($value, 4); ?>>4</option>
                <option value="5" <?php selected($value, 5); ?>>5</option>
            </select>
        </div>
    </fieldset>
<?php
}

function save_rating_metabox($post_id) {
    if (array_key_exists('rating_input', $_POST)) {
        update_post_meta($post_id, 'rating_meta_key', $_POST['rating_input']);
    }
}

function add_rating_column($columns) {
    $columns['rating_input'] = 'Rating';
    return $columns;
}

function fill_rating_column($column_name, $id) {
    if ($column_name == 'rating_input') {
        $value = get_post_meta($id, 'rating_meta_key', true);
        echo $value ?: 0;
    }
}

add_filter('manage_post_posts_columns', 'add_rating_column');
add_action('manage_posts_custom_column', 'fill_rating_column', 10, 2);
add_action('quick_edit_custom_box',  'rating_metabox_field', 10, 2);
add_action('add_meta_boxes', 'add_rating_metabox');
add_action('save_post', 'save_rating_metabox');
