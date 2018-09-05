(function($){
    $(document).ready(function(){
        menuCore();
    });

    function menuCore() {
        var menu_primary = $('#header .primary').get()[0];
        var menu_mobile = $('#header .mobile').get()[0];
        if(menu_primary){
            $(menu_primary).find('ul.sub-menu>li.menu-item-has-children>a').append('<i class="fa fa-angle-right" aria-hidden="true"></i>');
        }else{
            console.log('Error. Cant find header primary menu!');
        }
        if(menu_mobile){
            var switcher = $('#header .mob-menu-switcher>i').get()[0];
            var closer = $('#mobile-closer').get()[0];
            var lang_change_btn = $('.current-lang>img').get()[0];
            if(switcher){
                $(switcher).on('click', function(){
                    if($(menu_mobile).hasClass('closed')){
                        $(menu_mobile).stop().slideDown().removeClass('closed').addClass('opened');
                    }else{
                        if($(menu_mobile).hasClass('opened')){
                            /* Close all sub menues */
                            $(menu_mobile).find('ul.sub-menu').each(function(){
                                $(this).stop().slideUp(200);
                            });
                            $(menu_mobile).find('li.menu-item-has-children>a>i').each(function(){
                                $(this).css({"transform":"rotate(0deg)"});
                            });
                            /* Close mobile menu*/
                            $(menu_mobile).stop().slideUp().removeClass('opened').addClass('closed');
                        }else{
                            console.log('Error. Cant define mobile menu status!');
                        }
                    }
                });
            }else{
                console.log('Error. Cant find mobile menu switcher!');
            }
            if(closer){
                $(closer).on('click', function(){
                    /* Close all sub menues */
                    $(menu_mobile).find('ul.sub-menu').each(function(){
                        $(this).stop().slideUp(200);
                    });
                    $(menu_mobile).find('li.menu-item-has-children>a>i').each(function(){
                        $(this).css({"transform":"rotate(0deg)"});
                    });
                    /* Close mobile menu*/
                    $(menu_mobile).stop().slideUp().removeClass('opened').addClass('closed');
                });
            }else{
                console.log('Error. Cant find mobile menu closer!');
            }
            if(lang_change_btn){
                $(lang_change_btn).on('click', function(){
                    $('#lang-box').stop().fadeIn();
                });
                $('#lang-closer>i').on('click', function(){
                    $('#lang-box').stop().fadeOut(200);
                });
            }else{
                console.log('Error. Cant find lang change button!');
            }
            $(menu_mobile).find('li.menu-item-has-children>a').append('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>');
            $(menu_mobile).find('li>a>i').each(function(){
                var icon = this;
                $(icon).on('click', function(){
                    var parent_li = $(this).parents('li')[0];
                    var sub_menu = $(parent_li).find('>ul.sub-menu')[0];
                    if(sub_menu){
                        var sub_menu_visibility = $(sub_menu).is(":visible");
                        if(sub_menu_visibility){
                            /* close all child sub menues */
                            $(sub_menu).find('ul.sub-menu').each(function(){
                                $(this).stop().slideUp(200);
                            });
                            $(sub_menu).find('li.menu-item-has-children>a>i').each(function(){
                                $(this).css({"transform":"rotate(0deg)"});
                            });
                            /* close this menu */
                            $(icon).css({"transform":"rotate(0deg)"});
                            $(sub_menu).stop().slideUp(200);
                        }else{
                            $(icon).css({"transform":"rotate(90deg)"});
                            $(sub_menu).stop().slideDown(250);
                        }
                    }else{
                        console.log('Error. Cant find mobile sub menu!');
                    }
                    return false;
                });
            });
        }else{
            console.log('Error. Cant find header mobile menu!');
        }
    }
})(jQuery);