jQuery.fn.selectDropdown = function() {
	var args = arguments[0] || {};

	var placeHolder = args.placeholder;

    var $this = $(this[0]) // It's your element
    if (!$this.is("select")) { // Check if the input is a select box
    	return;
    }
    var $insert = $('<input type="text" placeholder="' + placeHolder + '" id="select_' + placeHolder + '"/>');
    $insert.attr("class", $this.attr("class")); // Copy the classes across
    $insert.insertAfter($this); // Replace the select with an input type text
    $this.css("display", "none"); // Make the old select invisible

    var $dropdown = $('<div class="dropdown" id="dropdown_' + placeHolder + '"></div>'); // Create the dropdowns
    $dropdown.css({"display" : "none", "position" : "absolute"}); // Set them up to be invisible and positioned at the end of the body
    var $ul = $("<ul></ul>");
    $dropdown.append($ul);
    $this.find('option').each(function() {
    	$ul.append('<li>' + $(this).html() + '</li>'); // Add all the previous select options to the new menu
    });
    $('body').append($dropdown);

    // Select our exact elements
    $insert.bind("focus", function() {
    	var $dropdownMatch = $('#dropdown_' + placeHolder);
		var $selectMatch = $('#select_' + placeHolder);
    	$dropdownMatch.css({
    		'display' : 'block',
    		'left' : $selectMatch.offset().left,
    		'top' : $selectMatch.offset().top + $selectMatch.outerHeight(),
    		'width' : $selectMatch.outerWidth()
    	});
    });
    $insert.bind("blur", function() {
    	var $dropdownMatch = $('#dropdown_' + placeHolder);
    	$dropdownMatch.css({'display' : 'none'});
    });
    $dropdown.find('li').bind("mouseenter", function() {
    	$(this).addClass("selected");
    });
    $dropdown.find('li').bind("mouseleave", function() {
    	$(this).removeClass("selected");
    });
    $dropdown.find('li').bind('mousedown', function() {
		var $selectMatch = $('#select_' + placeHolder);
		var inner = $(this).html();
    	$selectMatch.val(inner);
		$this.find("option").filter(function() { // Select the corresponding element in our secret select so our form still works
		    return $(this).html() == inner;
		}).attr('selected', true);
    });
};