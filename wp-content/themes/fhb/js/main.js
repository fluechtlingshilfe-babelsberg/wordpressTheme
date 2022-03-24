jQuery(document).ready(function($) {
    if(window.location.hash && $('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').length) {
        var tabs = $('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').parents('.tabs-container');
        tabs.find('.tabs-nav li.active').removeClass('active');
        tabs.find('div.tab.active').removeClass('active');
        tabs.find('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').parents('li').addClass('active');
        tabs.find('div'+decodeURI(window.location.hash)+'.tab').addClass('active');
    }
    $('.tabs-nav a, a.tab-url').on('click', function(e) {
        e.preventDefault();
        $(this).parents('.tabs-container').find('.tabs-nav li.active').removeClass('active');
        $(this).parents('.tabs-container').find('div.tab.active').removeClass('active');
        $(this).parents('.tabs-container').find('.tabs-nav a[href="'+$(this).attr('href')+'"]').parents('li').addClass('active');
        $(this).parents('.tabs-container').find('div'+$(this).attr('href')+'.tab').addClass('active');
    });
});
