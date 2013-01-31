var firstResult = 0;
var requestProcessing = false;
var messageToggle = "";

$(document).ready(function() {
	getOldMessages("bottom");

	$('#date_accept').bind('click', function() {
		$.ajax({
			type: "POST",
			url: "/accept-date/" + dateid,
			datatype: "json"
	    }).done(function( msg ) {
	    	console.log(msg);
			parsed = jQuery.parseJSON(msg);
			if (parsed.result == "success") {
				console.log("success");
				location.reload(); // Refresh the page if the date was accepted
			}
			else if (parsed.result == "failure") {
				console.log("failure")
			}
		});
	});

	$('#date_decline').bind('click', function() {
		$.ajax({
			type: "POST",
			url: "/decline-date/" + dateid,
			datatype: "json"
	    }).done(function( msg ) {
	    	console.log(msg);
			parsed = jQuery.parseJSON(msg);
			if (parsed.result == "success") {
				console.log("success");
				location.reload(); // Refresh the page if the date was accepted
			}
			else if (parsed.result == "failure") {
				console.log("failure")
			}
		});
	});

	$('#date_ignore').bind('click', function() {
		$.ajax({
			type: "POST",
			url: "/ignore-date/" + dateid,
			datatype: "json"
	    }).done(function( msg ) {
	    	console.log(msg);
			parsed = jQuery.parseJSON(msg);
			if (parsed.result == "success") {
				console.log("success");
				location.reload(); // Refresh the page if the date was accepted
			}
			else if (parsed.result == "failure") {
				console.log("failure")
			}
		});
	});

	var eventTime = $("#event_date").val().split(" ")[1];
	var eventTimeSplit = eventTime.split(":");
	var realTime = eventTimeSplit[0] > 12 ? (parseInt(eventTimeSplit[0]) - 12) + ":" + eventTimeSplit[1] + " PM" : eventTimeSplit[0] + ":" + eventTimeSplit[1] + " AM";
	$("#time_picker").val(realTime);

	var now = new Date();
	var thismonth = now.getMonth();
	var thisyear  = now.getYear() + 1900;
	$("#calendar").calendarWidget({
		month: thismonth,
		year: thisyear,
		nav: jQuery.parseJSON('{"right": "' + ((thismonth + 1) % 11) + '", "left" : ""}')
	 });
	$("#calendar_one_month").calendarWidget({
		month: (thismonth + 1) % 11,
		year: (thismonth + 1) % 11 < thismonth ? thisyear + 1 : thisyear,
		nav: jQuery.parseJSON('{"left": "' + thismonth + '", "right" : "' + ((thismonth + 2) % 11)  + '"}')
	 });
	$("#calendar_two_month").calendarWidget({
		month: (thismonth + 2) % 11,
		year: (thismonth + 2) % 11 < thismonth ? thisyear + 1 : thisyear,
		nav: jQuery.parseJSON('{"left": "' + ((thismonth + 1) % 11) + '", "right" : ""}')
	 });

	$(".calendar td").bind("click", function() {
		// When you click a day in our fancy calender, select the corresponding hidden element form to send back to symfony
		if (!$(this).hasClass("selected")) {
			var $calendar = $(this).closest(".calendar");
			var day = $(this).find("span").html();
			$(".calendar").find(".selected").removeClass("selected");
			$(this).addClass("selected");
			$("#date_date #qiiss_profilebundle_datetype_event_date_date_day option").filter(function() {
			    return $(this).val() == day;
			}).attr('selected', true);
			$("#date_date #qiiss_profilebundle_datetype_event_date_date_month option").filter(function() {
			    return $(this).val() == parseInt($calendar.find(".hidden_header_month").html()) + 1;
			}).attr('selected', true);
			$("#date_date #qiiss_profilebundle_datetype_event_date_date_year option").filter(function() {
			    return $(this).val() == $calendar.find(".hidden_header_year").html();
			}).attr('selected', true);
		}
	 });

	$('.calendar_header').disableTextSelect();
	$("#calendar").find(".calendar_header_right").bind("click", function() {
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

	$("#qiiss_profilebundle_datetype_event_price").change(function() {
		if ($(this).val().indexOf("$") != 0) {
			$(this).val("$" + $(this).val());
		}
	});

	$("#time_picker").timePicker({
	  show24Hours: false,
	  step: 15
	});

	// Update the hidden real form field with the value of this fancy one
	$("#time_picker").change(function() {
	    // Calculate hours / minutes
	    var hour = $.timePicker("#time_picker").getTime().getHours();
	    var minutes = $.timePicker("#time_picker").getTime().getMinutes();

		$("#date_time #qiiss_profilebundle_datetype_event_date_time_hour option").filter(function() {
		    return $(this).val() == hour;
		}).attr('selected', true);
		$("#date_time #qiiss_profilebundle_datetype_event_date_time_minute option").filter(function() {
		    return $(this).val() == minutes;
		}).attr('selected', true);
	});

	$("#message_box_lower form").submit(function() {
		var postData = {};
		var messageVal = $(this).find("textarea").val();
		postData[$(this).find("textarea").attr("name")] = messageVal; // Save the name and data in the text field so we can use it later
		postData[$(this).find("input[type=hidden]").attr("name")] = $(this).find("input[type=hidden]").val();
		$("#message_box_lower textarea").val("");
		var imageThumb = isTarget ? dpTargetThumb : dpSenderThumb;
		createMessage(messageVal, imageThumb, new Date(), true);
		$("#message_box_inner").scrollTop(10000);
		$("#sample_message").remove();

	    $.ajax({
			type: "POST",
			url: $(this).attr("action"),
			data: postData,
			datatype: "json"
	    }).done(function( msg ) {
			parsed = jQuery.parseJSON(msg);
			if (parsed.result == "success") {

			}
			else if (parsed.result == "failure") {
				if (parsed.error) {
					slideOutError(parsed.error, "#login_form");
				}
			}
		});
	    return false;
	});

	$("#message_box_inner").bind("scroll", function() {
		if ($(this).scrollTop() < 1) {
			getOldMessages("top");
		}
	});

	setInterval(function() {
		getNewMessages();
	}, 2000);
});

function createMessage(content, image, date, append) {
	messageToggle = messageToggle == "" ? "alternate" : "";
	var message = '<div class="message ' + messageToggle + '">' +
		'<div class="message_dp_outer"><img src="/' + image + '" class="message_dp"></div>' +
		'<div class="message_text">' +
			'<div class="message_datetime">' + date + '</div>' +
			'<div class="message_content">' + content + '</div>' +
		'</div>' +
	'</div>';
	if (append) {
		$("#message_box_inner").append(message);
	}
	else {
		$("#message_box_inner").prepend(message);
	}
}

function getOldMessages(scrollPos) {
	if (!requestProcessing) {
		requestProcessing = true;
		var firstMsg = $('.message:first'); // Save the top message for scroll position later
		$.ajax({
			type: "POST",
			url: "/message/get-old/" + dateid,
			data: { "firstResult" : firstResult },
			datatype: "json"
	    }).done(function( msg ) {
	    	requestProcessing = false;
			parsed = jQuery.parseJSON(msg);
			if (parsed.hasOwnProperty("messages")) {
				$.each(parsed.messages, function(key, val) {
					console.log(val.messageDate.date);
					var imageThumb = val.messageSender == targetUsername ? dpTargetThumb : dpSenderThumb;
					createMessage(val.messageContent, imageThumb, val.messageDate.date, false);
					firstResult++;
				});
				$("#sample_message").remove();
				if (scrollPos) {
					if (scrollPos == "bottom") {
						$("#message_box_inner").scrollTop(10000);
					}
					else if (scrollPos == "top") {
						$("#message_box_inner").scrollTop(firstMsg.position().top);
					}
				}
			}
		});
	}
}

function getNewMessages() {
	var firstMsg = $('.message:first'); // Save the top message for scroll position later
	$.ajax({
		type: "POST",
		url: "/message/get-new/" + dateid,
		data: { "messageTime" : messageTime },
		datatype: "json"
    }).done(function( msg ) {
    	console.log(msg);
		parsed = jQuery.parseJSON(msg);
		if (parsed.hasOwnProperty("messages")) {
			$.each(parsed.messages, function(key, val) {
				createMessage(val.messageContent, "", val.messageDate.date, true);
				firstResult++;
			});
			$("#message_box_inner").scrollTop(10000);
			$("#sample_message").remove();
		}
		if (parsed.hasOwnProperty("messageTime") && parsed.messageTime != "") {
			messageTime = parsed.messageTime.date;
		}
	});
}