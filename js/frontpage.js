
var currentProjectSlide = 0;
function projectSlides(direction) {
	currentProjectSlide += direction;
	var maxSlides = $('.projects > div').length;
	if (currentProjectSlide >= maxSlides)
		currentProjectSlide = 0;
	else if (currentProjectSlide < 0)
		currentProjectSlide = maxSlides - 1;

	$('.projects').css('left', -currentProjectSlide * 100 + '%');
}
