<?php
global $news_post;
$poster_url = get_post_meta($news_post->ID, 'poster_link', true);
$youtube_link = get_post_meta($news_post->ID, 'youtube_link', true);
$youtube_description = get_post_meta($news_post->ID, 'youtube_description', true);
$youtube_channel_title = get_post_meta($news_post->ID, 'youtube_channel_title', true);
?>
<article class="post-preview" style="background-image: url(<?php echo $poster_url; ?>);">
    <a href="<?php echo get_the_permalink($news_post->ID); ?>" class="inner" target="_blank">
        <div class="title">
            <h2><?php echo $news_post->post_title; ?></h2>
        </div>
    </a>
</article>