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
	var now = new Date();
	var thismonth = now.getMonth();
	var thisyear  = now.getYear() + 1900;
	console.log(jQuery.parseJSON('{"left": "' + thismonth + '", "right" : "' + ((thismonth + 1) % 11)  + '"}'));
	$("#calendar").calendarWidget({
		month: thismonth,
		year: thisyear
	 });
	$("#calendar_one_month").calendarWidget({
		month: thismonth % 11,
		year: (thismonth % 11) < thismonth ? thisyear + 1 : thisyear,
		nav: jQuery.parseJSON('{"left": "' + thismonth + '", "right" : "' + ((thismonth + 1) % 11)  + '"}')
	 });
	$("#calendar_two_month").calendarWidget({
		month: (thismonth + 1) % 11,
		year: (thismonth + 1) % 11 < thismonth ? thisyear + 1 : thisyear,
		nav: jQuery.parseJSON('{"left": "#calender_one_month"}')
	 });

	$("#calendar td").bind("click", function() {
		if (!$(this).hasClass("selected")) {
			$("#calendar").find(".selected").removeClass("selected");
			$(this).addClass("selected");
		}
	 });
});