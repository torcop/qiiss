$(document).ready(function() {
  $("#search_param_location_city").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "location_city",
    endPoint : '/location/predict/city'
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
});