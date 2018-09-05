<?php
/******************** THEME HELPERS ********************/
$helpers_path = ABSPATH.'wp-content/themes/ukrblog/helpers';
if(is_dir($helpers_path)){
    $scan_dir = scandir($helpers_path);
    foreach ($scan_dir as $key => $filename){
        if($filename !== '.' && $filename !== '..'){
            include_once $helpers_path . '/' . $filename;
        }
    }
}

/******************** REMOVE WP EMOJI ********************/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/******************** REMOVE EMBED SCRIPT ********************/
function uab_deregister_embed(){
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'uab_deregister_embed');

/******************** INCLUDE SCRIPTS ********************/
function uab_include_jquery(){
    wp_enqueue_script('uab-jquery', get_template_directory_uri() . '/includes/jquery/jquery-3.2.1.min.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'uab_include_jquery', 1);

function uab_include_js_scripts(){
    wp_enqueue_script('uab-main', get_template_directory_uri() . '/compressed/compressed.min.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'uab_include_js_scripts', 10);

/******************** INCLUDE STYLES ********************/
function theme_name_scripts(){
    wp_enqueue_style('uab-main-css', get_template_directory_uri() . '/compressed/compressed.min.css', array(), '', false);
    wp_enqueue_style('uab-google-fonts-css', 'https://fonts.googleapis.com/css?family=Arimo', array(), '', false);
    wp_enqueue_style('uab-font-awesome', get_template_directory_uri() . '/includes/font-awesome/css/font-awesome.min.css', array(), '', false);
}
add_action('wp_enqueue_scripts', 'theme_name_scripts', 10);

/******************** SUPPORTS ********************/
add_theme_support( 'post-thumbnails' );

/******************** MENUES ********************/
add_theme_support('menus');
function register_uab_menus(){
    register_nav_menus(
        array(
            'header_navigation' => __('Header Navigation'),
            'header_mobile_navigation' => __('Header Mobile Navigation')
        )
    );
}
add_action('init', 'register_uab_menus');

/******************** CUSTOM POST TYPES AND TAXONOMIES ********************/
function register_post_types(){
    register_taxonomy('cats', array('news'), array(
        'labels'                => array(
            'name'              => 'Категории новостей',
            'singular_name'     => 'Категория новости',
            'search_items'      => 'Искать категорию новостей',
            'all_items'         => 'Все категории новостей',
            'parent_item'       => 'Родительская категория новостей',
            'parent_item_colon' => 'Родительская категория новостей:',
            'edit_item'         => 'Редактировать категорию новостей',
            'update_item'       => 'Обновить категорию новостей',
            'add_new_item'      => 'Добавить категорию новостей',
            'new_item_name'     => 'Название новой категории новостей',
            'menu_name'         => 'Категории новостей',
        ),
        'public'                => true,
        'hierarchical'          => true,
        'rewrite'               => true,
        'show_admin_column'     => true,
    ) );

    register_post_type('news', array(
        'label'  => 'news',
        'labels' => array(
            'name'               => 'Новости',
            'singular_name'      => 'Новость',
            'add_new'            => 'Новая новость',
            'add_new_item'       => 'Добавить новость',
            'edit_item'          => 'Редактировать новость',
            'new_item'           => 'Новая новость',
            'view_item'          => 'Смотреть новость',
            'search_items'       => 'Искать новость',
            'not_found'          => 'Не найдено новостей',
            'not_found_in_trash' => 'Не найдено в корзине новостей',
            'parent_item_colon'  => 'Новость',
            'menu_name'          => 'Новости',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 8,
        'menu_icon'           => 'dashicons-nametag',
        'hierarchical'        => true,
        'supports' => array(
            'title',
//            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'sticky',
            'page-attributes'
        ),
        'taxonomies'          => array('cats'),
        'has_archive'         => true,
        'capability_type' => 'post',
        'rewrite'             => true,
        'query_var'           => true,
        'show_in_nav_menus'   => true,
    ) );
}
add_action('init', 'register_post_types');

/******************** YOUTUBE POSTS FEATURES ********************/

function add_meta_boxes() {
    add_meta_box('youtube-post-refresher', 'Обновить данные с YouTube', 'print_youtube_post_refresher', 'news', 'normal', 'high');
}
add_action('admin_menu', 'add_meta_boxes');

function print_youtube_post_refresher($post) { ?>
    <a href="<?php echo '/wp-admin/post.php?post='.$post->ID.'&action=edit' . '&yt_refresher=true'; ?>" id="yt_refresher" class="edit-timestamp hide-if-no-js" role="button"><span aria-hidden="true">Обновить</span></a>
    <script>
        jQuery(document).ready(function(){
            jQuery('#yt_refresher').on('click', function(){
                var answer = confirm('Ты уверен?');
                if(answer){
                    window.location = jQuery(this).attr('href');
                }else{
                    return false;
                }
            });
        });
    </script>
<?php }

function check_youtube_refresher() {
    if (!current_user_can('manage_options') && (!wp_doing_ajax())){
        wp_die(__('You are not allowed to access this part of the site'));
    }
    if(isset($_GET['yt_refresher']) && (!empty($_GET['yt_refresher'])) && ($_GET['yt_refresher'] === 'true')) {
        if(isset($_GET['post']) && (!empty($_GET['post']))) {
            $post_id = intval($_GET['post']);
            $post_obj = get_post($post_id);
            if(is_a($post_obj, 'WP_Post')){
                $youtube_link = get_post_meta($post_obj->ID, 'youtube_link', true);
                $YoutubeHelper = new YoutubeHelper();
                $video_id = $YoutubeHelper->get_youtube_video_id_by_youtube_video_url($youtube_link);
                $video_data = $YoutubeHelper->get_video_data($video_id);
                if(isset($video_data->title) && !empty($video_data->title)){
                    $post_update_data = array(
                        'ID'           => $post_obj->ID,
                        'post_title'   => $video_data->title
                    );
                    wp_update_post($post_update_data);
                }
                if(isset($video_data->channelId) && !empty($video_data->channelId)){
                    update_post_meta($post_obj->ID, 'youtube_channel_id', $video_data->channelId);
                }
                if(isset($video_data->channelTitle) && !empty($video_data->channelTitle)){
                    update_post_meta($post_obj->ID, 'youtube_channel_title', $video_data->channelTitle);
                }
                if(isset($video_data->description) && !empty($video_data->description)){
                    update_post_meta($post_obj->ID, 'youtube_description', $video_data->description);
                }
                if(isset($video_data->thumbnails->high->url) && !empty($video_data->thumbnails->high->url)){
                    update_post_meta($post_obj->ID, 'poster_link', $video_data->thumbnails->high->url);
                }
            }
            wp_redirect('/wp-admin/post.php?post='.$post_obj->ID.'&action=edit');
        }
    }
}
add_action('admin_init', 'check_youtube_refresher', 1);