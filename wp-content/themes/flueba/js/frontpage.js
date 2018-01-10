

$('.projects-wrapper .subtitle').text($('.projects div').eq(0).attr('data-text') || '');

var currentProjectSlide = 0;
function projectSlides(direction) {
	currentProjectSlide += direction;
	var maxSlides = $('.projects > div').length;
	if (currentProjectSlide >= maxSlides)
		currentProjectSlide = 0;
	else if (currentProjectSlide < 0)
		currentProjectSlide = maxSlides - 1;

		$('.projects-wrapper .subtitle')
			.animate({ left: '-100%' }, 50, function() {
				var $subtitle = $(this);
				setTimeout(function() {
					var text = $('.projects div').eq(currentProjectSlide).attr('data-text') || '';
					if (text)
						$subtitle
							.animate({ left: '74px' }, 400) /* keep value in sync with css/custom.css .projects-wrapper .subtitle */
							.text(text);
				}, 300);
			});
	$('.projects').css('left', -currentProjectSlide * 100 + '%');
}
