<?php get_header(); ?>
<?php
/* PAGE SETTINGS */
$show_sidebar = false;

?>
    <section class="page-container<?php echo $show_sidebar ? ' has-sidebar' : ''; ?>">
        <div class="inner">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); ?>
                    <?php
                    $post_id = get_the_ID();
                    $youtube_link = get_post_meta($post_id, 'youtube_link' ,true);
                    $youtube_description = get_post_meta($post_id, 'youtube_description' ,true);
                    $youtube_helper = new YoutubeHelper();
                    $youtube_video_id = $youtube_helper->get_youtube_video_id_by_youtube_video_url($youtube_link);
                    ?>
                    <article>
                        <h1 class="title"><?php the_title(); ?></h1>

                        <div class="yt-i-frame">
                            <div class="inner">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>

                    </article>
                <?php }
            }
            ?>
        </div>
        <div class="sidebar">
            SIDEBAR
        </div>
    </section>
<?php get_footer(); ?>