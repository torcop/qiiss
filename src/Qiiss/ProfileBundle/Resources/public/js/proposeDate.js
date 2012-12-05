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
		year: thisyear,
		nav: jQuery.parseJSON('{"right": "' + (thismonth % 11) + '", "left" : ""}')
	 });
	$("#calendar_one_month").calendarWidget({
		month: thismonth % 11,
		year: (thismonth % 11) < thismonth ? thisyear + 1 : thisyear,
		nav: jQuery.parseJSON('{"left": "' + thismonth + '", "right" : "' + ((thismonth + 1) % 11)  + '"}')
	 });
	$("#calendar_two_month").calendarWidget({
		month: (thismonth + 1) % 11,
		year: (thismonth + 1) % 11 < thismonth ? thisyear + 1 : thisyear,
		nav: jQuery.parseJSON('{"left": "' + (thismonth % 11) + '", "right" : ""}')
	 });

	$(".calendar td").bind("click", function() {
		if (!$(this).hasClass("selected")) {
			$(".calendar").find(".selected").removeClass("selected");
			$(this).addClass("selected");
		}
	 });
	$("#calendar").find(".calendar_header_right").bind("click", function() {
		console.log("TEST");
		$("#calendar").css("display", "none");
		$("#calendar_one_month").css("display", "block");
	});
	$("#calendar_one_month").find(".calendar_header_left").bind("click", function() {
		$("#calendar_one_month").css("display", "none");
		$("#calendar").css("display", "block");
	});
	$("#calendar_one_month").find(".calendar_header_right").bind("click", function() {
		$("#calendar_one_month").css("display", "none");
		$("#calendar_two_month").css("display", "block");
	});
	$("#calendar_two_month").find(".calendar_header_left").bind("click", function() {
		$("#calendar_two_month").css("display", "none");
		$("#calendar_one_month").css("display", "block");
	});
});