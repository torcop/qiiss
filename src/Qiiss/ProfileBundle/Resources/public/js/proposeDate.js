$(document).ready(function() {
	$('.content_header').bind('click', function() {
		var body = $(this).parent().find('.content_block');
		if (body.css('display') == "none") {
			body.slideDown(280);
		}
		else {
			body.slideUp(280);
		}
	});

	$('.header').bind('click', function() {
		var body = $('.content_block');
		if (body.css('display') == "none") {
			body.slideDown(280);
		}
		else {
			body.slideUp(280);
		}
	});

	$("#calendar").calendarWidget({
		month: 11,
		year: 2012
	 });
});