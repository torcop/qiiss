var searching = false;
var results_page = 0;

$(document).ready(function() {
  $("#search_param_location_city").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "location_city",
    endPoint : '/location/predict/city',
    linkedElement : $("#search_param_location_country")
  });
  $("#search_param_location_country").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "location_country",
    endPoint : '/location/predict/country'
  });
  $("#search_param_interest_one").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "interest_one",
    endPoint : '/interests/predict'
  });
  $("#search_param_interest_two").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "interest_two",
    endPoint : '/interests/predict'
  });
  $("#search_param_interest_three").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "interest_three",
    endPoint : '/interests/predict'
  });

  $(".search_param_field_outer").each(function() {
    $(this).find(".search_param_field").bind("keyup", function() {
      $element = $(this);
      $label = $(this).closest(".search_param_field_outer").find(".search_param_label");
      if ($element.val() == "") {
        if (!$label.hasClass("hidden")) {
          $label.stop().animate({
            "top": "0px"
          }, 150, "linear", function() {
            $label.addClass("hidden");
          });
        }
      }
      else {
        if ($label.hasClass("hidden")) {
          $label.stop().animate({
            "top": "-30px"
          }, 150, "linear", function() {
            $label.removeClass("hidden");
          });
        }
      }
    });
  });

  $('.search_param_section_header').bind('click', function() {
    var body = $(this).parent().find('.search_param_section_body');
    if (body.css('display') == "none") {
      body.slideDown(280);
      $(this).find(".expand_message").html("(Click To Contract -)");
    }
    else {
      body.slideUp(280);
      $(this).find(".expand_message").html("(Click To Expand +)");
    }
  });
  $('#search_param_header').bind('click', function() {
    var body = $(this).parent().find('.search_param_body');
    if (body.css('display') == "none") {
      body.slideDown(280);
      $(this).find(".expand_message").html("(Click To Contract -)");
    }
    else {
      body.slideUp(280);
      $(this).find(".expand_message").html("(Click To Expand +)");
    }
  });

  $("#search_param_submit_inner").bind('click', function() {
    $button = $(this);
    $button.html("Searching...");
    results_page = 0;
    search();
    $('#search_results_outer').masonry('remove', $('.search_result'));
    $('#search_param_header').click();
  });
  $('#search_results_outer').masonry({
    itemSelector: '.search_result',
    columnWidth: 314,
    gutterWidth: 6,
    // isAnimated: !Modernizr.csstransitions
  });
  $(window).bind("scroll", function() {
    if ($(this).scrollTop() + $(this).height() > $("body").height()) {
      search();
    }
  });
  search();
});

function search() {
  if (!searching) {
    searching = true;
    var interests = new Array();
    interests[0] = $("#search_param_interest_one").val();
    interests[1] = $("#search_param_interest_two").val();
    interests[2] = $("#search_param_interest_three").val();
    $.ajax({
      type: "POST",
      url: "/create_search",
      data: {
        interests : JSON.stringify(interests),
        location_city : $("#search_param_location_city").val(),
        location_country : $("#search_param_location_country").val(),
        preference : $("#search_param_preference").val(),
        charity : $("#search_param_charity").val(),
        age_min : $("#search_param_age_min").val(),
        age_max : $("#search_param_age_max").val(),
        page : results_page
      },
      success: function(data) {
        parsed = jQuery.parseJSON(data);
        console.log(parsed);
        if (parsed.hasOwnProperty("results")) {
          $.each(parsed.results, function(key, val) {
            console.log(val);
            createSearchResult(val, false);
          });
          $('#search_results_outer').masonry('reload');
        }
        else {

        }
        setTimeout(function() {
          $("#search_param_submit_inner").html("Search");
        }, 280);
        searching = false;
        results_page++;
      }
    });
  }
}

function createSearchResult(object) {
  var html = '<div class="search_result">' +
    '<div class="result_dp_section">' +
      '<img src="/' + object.displayPicture + '" width=' + object.displayPictureWidth + ' height=' + object.displayPictureHeight + '/>' +
    '</div>' +
    '<div class="result_name_section">' +
      '<div class="result_name_username">' + object.username + "</div>" +
      '<div class="result_name_age">' + object.age + "</div>" +
    '</div>' +
  '</div>';
  $('#search_results_outer').append($(html)).masonry('appended', $(html));
}