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
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php }
            }
            ?>
        </div>
        <div class="sidebar">
            SIDEBAR
        </div>
    </section>
<?php get_footer(); ?>