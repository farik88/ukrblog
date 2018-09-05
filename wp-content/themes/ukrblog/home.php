<?php /* Template name: Главная страница */ ?>
<?php get_header(); ?>
<?php
/* PAGE SETTINGS */
$show_sidebar = false;

?>
    <section class="page-container<?php echo $show_sidebar ? ' has-sidebar' : ''; ?>">
        <div class="inner">
            <?php
            $post_per_page = 20;
            $total_posts = count(get_posts(array('numberposts' => -1,'post_type'=>'news')));
            $current_page = (isset($_GET['list']) && !empty($_GET['list'])) ? intval($_GET['list']) : 1;
            $news = get_posts(array(
                'numberposts' => $post_per_page,
                'post_type'=>'news',
                'paged' => $current_page
            ));
            if(count($news)){ ?>
                <div class="posts-stack">
                    <?php foreach($news as $news_post){
                        setup_postdata($news_post);
                        $new_type  = get_post_meta($news_post->ID, 'news_type', true);
                        if(isset($new_type) && !empty($new_type)){
                            switch ($new_type){
                                case 'Видео с YouTube':
                                    get_template_part('partials/previews/youtube');
                                break;
                            }
                        }
                    }
                    wp_reset_postdata(); ?>
                </div>
                <?php
                $pagination = new PaginationHelper($post_per_page,$total_posts,$current_page);
                echo $pagination->get_pagination();
                ?>
            <?php } ?>

        </div>
        <div class="sidebar">
            SIDEBAR
        </div>
    </section>
<?php get_footer(); ?>