jQuery(document).ready(function($) {
	// find tabs container to add classes necessary for tabs to function correctly
	$('.tabs-container').each(function(index, value) {
		const addH2 = $(value).hasClass('useH2');
		const tabsNav = $(value).find('ul').first();
		if (tabsNav) {
			tabsNav.addClass('tabs-nav');
			tabsNav.children('li').first().addClass('active');
			tabsNav.children('li').each(function(listIndex, listValue) {
				let innerContent = listValue.innerHTML;
				innerContent = `<a href="#tab${index}${listIndex}">` + innerContent + '</a>';
				if (addH2) {
					innerContent = '<h2>' + innerContent + '</h2>';
				}
				listValue.innerHTML = innerContent;
			});
		};
		const tabsContent = $(value).find('div.wp-block-columns').first();
		if (tabsContent) {
			tabsContent.addClass('tabs-content');
			tabsContent.children('div.wp-block-column').first().addClass('active');
			tabsContent.children('div.wp-block-column').each(function(columnIndex, columnValue) {
				$(columnValue).addClass('tab');
				$(columnValue).attr('id', `tab${index}${columnIndex}`);
			})
		}
	});

	//check, if the page url contains an anchor part
    if(window.location.hash && $('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').length) {
        const tabs = $('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').parents('.tabs-container');
        tabs.find('.tabs-nav li.active').removeClass('active');
        tabs.find('div.tab.active').removeClass('active');
        tabs.find('.tabs-nav a[href="'+decodeURI(window.location.hash)+'"]').parents('li').addClass('active');
        tabs.find('div'+decodeURI(window.location.hash)+'.tab').addClass('active');
    }

    // add function to switch between the tabs on click
    $('.tabs-nav a, a.tab-url').on('click', function(e) {
        e.preventDefault();
        $(this).parents('.tabs-container').find('.tabs-nav li.active').removeClass('active');
        $(this).parents('.tabs-container').find('div.tab.active').removeClass('active');
        $(this).parents('.tabs-container').find('.tabs-nav a[href="'+$(this).attr('href')+'"]').parents('li').addClass('active');
        $(this).parents('.tabs-container').find('div'+$(this).attr('href')+'.tab').addClass('active');
    });
});
