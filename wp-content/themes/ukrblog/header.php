<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="header">
    <div class="inner">
        <section class="logo">
            <img src="/wp-content/uploads/2017/09/uab-logo.png" alt="" title="">
        </section>
        <section class="title">
            <span class="brand-name"><?php bloginfo('name'); ?></span>
        </section>
        <section class="header-menu-wrap">
            <div class="primary">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'header_navigation',
                    'container'       => 'nav',
                    'menu_class'      => 'header-menu',
                    'echo'            => true,
                ) )
                ?>
            </div>
        </section>
        <section class="current-lang">
            <?php $current_lang = get_locale(); ?>
            <?php if($current_lang === 'uk') { ?>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAYAAAChWZ5EAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUU0NjE0NjNBNjhBMTFFN0E4QTREOTkxNEFCRjU0QzciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUU0NjE0NjRBNjhBMTFFN0E4QTREOTkxNEFCRjU0QzciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5RTQ2MTQ2MUE2OEExMUU3QThBNEQ5OTE0QUJGNTRDNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5RTQ2MTQ2MkE2OEExMUU3QThBNEQ5OTE0QUJGNTRDNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PiwOmZIAAACiSURBVHja7JUxDsIwDEVfnBS6lAFxRu7J1LsgISEhUCEhxT7FZ6inbO/F+rYT50ujYSiqpF549oyq3mRjb6tMwNmGuDYBIyUd3dlG/eoEnG20rhNwdmE5gGoYUghMt3iJWrCSrjN9GjQGj8pajifIO83/h4+fg/yKNGoEco09oLsEEQEXEK6BYBvCRRjs7Rj9gcAoTIGzC3fP4ijqxEL/CTAAdScoDcCF4bAAAAAASUVORK5CYII=" title="Українська" alt="Українська">
            <?php } ?>
            <?php if($current_lang === 'ru_RU') { ?>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAWCAYAAAChWZ5EAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTk0NjNERTNBNjhBMTFFN0EyNEZDMEVGODQ4QjdEQ0YiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTk0NjNERTRBNjhBMTFFN0EyNEZDMEVGODQ4QjdEQ0YiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBOTQ2M0RFMUE2OEExMUU3QTI0RkMwRUY4NDhCN0RDRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpBOTQ2M0RFMkE2OEExMUU3QTI0RkMwRUY4NDhCN0RDRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pq4l06gAAAD/SURBVHja7JZNTsMwEIWfnUmapliiqqJ0zxk4LOfgCOzYR+xYIIHKAghxE1EnEzO5xHjTd4H3jd/82LRt+17XtUMCdV3nzTAMsaqqFP6YpglWADwSafW2SKz0ANaYpNWbyOcedufSIARPdw/P4EODDQdV69nmiP036PXxBbj9Af5G3eKpBEYBwPEG2EsCF9IFyDfAecJ1DJMDEKoa2DWSiXYTSg8sFnT/9oRtd8AcLqr+GRUI468sosb1yHOHuOi+gJH059nTqdzjWBTgRRcgsxZfco5pXklsBo5QBhBPw9cxBG2NcXKUUeh/BLB604n5owzBDcpNWArAJ7P/F2AATSJaSCMPj68AAAAASUVORK5CYII=" title="Русский" alt="Русский">
            <?php } ?>
            <div id="lang-box">
                <div class="inner">
                    <ul><?php pll_the_languages(array('show_flags'=>0,'show_names'=>1)); ?></ul>
                    <div id="lang-closer">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>
        <section class="mob-menu-switcher">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </section>
        <div class="mobile closed">
            <?php
            wp_nav_menu( array(
                'theme_location'  => 'header_mobile_navigation',
                'container'       => 'nav',
                'menu_class'      => 'header-mobile-menu',
                'echo'            => true,
            ) )
            ?>
            <div id="mobile-closer"><i class="fa fa-times" aria-hidden="true"></i></div>
        </div>
    </div>
</header>