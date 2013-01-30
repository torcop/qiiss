jQuery.fn.ajaxDropdown = function() {
	var args = arguments[0] || {};

    var semaphore = 0;

	var placeHolder = args.placeholder;

    var endPoint = args.endPoint;

    var linkedElement = null;

    if (typeof args.linkedElement !== 'undefined') {
        linkedElement = args.linkedElement;
    }

    console.log(linkedElement);

    var name = args.name;

    var $insert = $(this[0]) // It's your element

    var $dropdown = $('<div class="dropdown" id="dropdown_' + name + '">' +
        '<div class="ajax_loader_div"><img class="ajax_loader" src="/bundles/qiissgeneral/images/ajax-loader.gif"></div>' +
        '<ul></ul></div>'); // Create the dropdowns
    $dropdown.css({"display" : "none", "position" : "absolute"}); // Set them up to be invisible and positioned at the end of the body
    $('body').append($dropdown);

    // Select our exact elements
    $insert.bind("focus", function() {
    	var $dropdownMatch = $('#dropdown_' + name);
        console.log($insert.outerWidth());
    	$dropdownMatch.css({
    		'display' : 'block',
    		'left' : $insert.offset().left,
    		'top' : $insert.offset().top + $insert.outerHeight() - 4,
    		'width' : $insert.outerWidth() - 4,
            'height' : 0
    	});
        $dropdownMatch.stop().animate({
            "height": "191px"
        }, 150, "linear");
    });

    $insert.bind("keyup", function() {
        var $dropdownMatch = $('#dropdown_' + name);
        semaphore++;

        if ($insert.val().length == 0) {
            $dropdownMatch.find("ul").html("");
            $dropdownMatch.find(".ajax_loader_div").show();
        }
        setTimeout(function() {
            semaphore--;
            if (semaphore == 0) {
                $dropdownMatch.find("ul").html("");
                $dropdownMatch.find(".ajax_loader_div").show();
                $.ajax({
                    url: endPoint,
                    data: {searchTerm : $insert.val()},
                    type: 'POST',
                    success: function(data) {
                        parsed = jQuery.parseJSON(data);
                        if (parsed.hasOwnProperty("rows")) {
                            $dropdownMatch.find("ul").html("");
                            $dropdownMatch.find(".ajax_loader_div").hide();
                            $.each(parsed.rows, function(key, val) {
                                console.log(val);
                                if (parsed.hasOwnProperty("isSplit") && linkedElement != null) {
                                    $element = $('<li><div class="predict_name_one">' + val.valOne + '</div>, <div class="predict_name_two">' + val.valTwo + '</div><div class="predict_num">(' + val.numUsers + ')</div></li>');
                                    $dropdownMatch.find("ul").append($element);
                                    bindSplitItemClick($element, $insert, linkedElement, val.valOne, val.valTwo);
                                }
                                else {
                                    $element = $('<li><div class="predict_name">' + val.value + '</div>' +
                                        (val.hasOwnProperty("numUsers") ? '<div class="predict_num">(' + val.numUsers + ')</div></li>' : ''));
                                    $dropdownMatch.find("ul").append($element);
                                    bindItemClick($element, $insert);
                                }
                            });
                        }
                        else { // If no interests can be predicted
                            $dropdownMatch.find("ul").html("");
                            $dropdownMatch.find("ul").append("<li>No Matches Found</li>");
                            $dropdownMatch.find(".ajax_loader_div").hide();
                        }
                    }
                });
            }
        }, 300);
    });

    $insert.bind("blur", function() {
    	var $dropdownMatch = $('#dropdown_' + name);
    	$dropdownMatch.stop().animate({
            "height": "0px"
        }, 150, "linear", function() {
            $dropdownMatch.css("display", "none");
        });
    });
    $dropdown.find('li').bind("mouseenter", function() {
    	$(this).addClass("selected");
    });
    $dropdown.find('li').bind("mouseleave", function() {
    	$(this).removeClass("selected");
    });
};

function bindItemClick(element, toChange) {
    element.bind('mousedown', function() {
        var inner = $(this).find(".predict_name").html();
        toChange.val(inner).keyup(); // Trigger a keyup event as if the user was typing the value
    });
}

function bindSplitItemClick(element, toChangeOne, toChangeTwo) {
    element.bind('mousedown', function() {
        var innerOne = $(this).find(".predict_name_one").html();
        var innerTwo = $(this).find(".predict_name_two").html();
        toChangeOne.val(innerOne).keyup();
        toChangeTwo.val(innerTwo).keyup();
    });
}