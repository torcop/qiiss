jQuery.fn.selectDropdown = function() {
	var args = arguments[0] || {};

	var placeHolder = args.placeholder;

    var $this = $(this[0]) // It's your element
    if (!$this.is("select")) { // Check if the input is a select box
    	return;
    }
    $insert = $('<input type="text" placeholder="' + placeHolder + '" id="select_' + placeHolder + '"/>');
    $insert.attr("class", $this.attr("class")); // Copy the classes across
    $insert.insertAfter($this); // Replace the select with an input type text
    $this.css("display", "none"); // Make the old select invisible

    $dropdown = $('<div class="dropdown" id="dropdown_' + placeHolder + '"></div>'); // Create the dropdowns
    $dropdown.css({"display" : "none", "position" : "absolute"}); // Set them up to be invisible and positioned at the end of the body
    $ul = $("<ul></ul>");
    $dropdown.append($ul);
    $this.find('option').each(function() {
    	$ul.append('<li>' + $(this).html() + '</li>'); // Add all the previous select options to the new menu
    });
    $('body').append($dropdown);

    // Select our exact elements
    $insert.bind("focus", function() {
    	$dropdownMatch = $('#dropdown_' + placeHolder);
		$selectMatch = $('#select_' + placeHolder);
    	$dropdownMatch.css({
    		'display' : 'block',
    		'left' : $selectMatch.offset().left,
    		'top' : $selectMatch.offset().top + $selectMatch.outerHeight(),
    		'width' : $selectMatch.outerWidth()
    	});
    });
    $insert.bind("blur", function() {
    	$dropdownMatch = $('#dropdown_' + placeHolder);
    	$dropdownMatch.css({'display' : 'none'});
    });
    $dropdown.find('li').bind("mouseenter", function() {
    	$(this).addClass("selected");
    });
    $dropdown.find('li').bind("mouseleave", function() {
    	$(this).removeClass("selected");
    });
    $dropdown.find('li').bind('mousedown', function() {
		$selectMatch = $('#select_' + placeHolder);
		console.log($(this).html());
    	$selectMatch.val($(this).html());
    });
};