$(document).ready(function() {
	$('.section_header').bind('click', function() {
		var body = $(this).parent().find('.section_body');
		if (body.css('display') == "none") {
			body.slideDown(280);
		}
		else {
			body.slideUp(280);
		}
	});
});