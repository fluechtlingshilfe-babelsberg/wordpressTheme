/*document.addEventListener('DOMContentLoaded', function() {
	if(window.location.hash && document.querySelector('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]')) {
		console.log('hash: ' + window.location.hash);
		var test = document.querySelector('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]');
		var tabs = document.querySelector('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').closest('.tabs-container');
		tabs.querySelector('.tabs-nav a.active').removeAttribute('class');
		tabs.querySelector('div.tab.active').classList.remove('active');
		tabs.querySelector('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').classList.add('active');
		tabs.querySelector('div'+decodeURI(window.location.hash)+'.tab').classList.add('active');
	}
	document.querySelectorAll('.tabs-nav a, a.tab-url').forEach(function(item) {
		item.addEventListener('click', function(event) {
			event.preventDefault();
			this.closest('.tabs-container').querySelector('.tabs-nav a.active').removeAttribute('class');
			this.closest('.tabs-container').querySelector('div.tab.active').classList.remove('active');
			this.closest('.tabs-container').querySelector('.tabs-nav a[href="'+this.getAttribute('href')+'"]').classList.add('active');
			this.closest('.tabs-container').querySelector('div'+this.getAttribute('href')+'.tab').classList.add('active');
		});
	});
}); */

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
