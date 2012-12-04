$(document).ready(function() {
  $(".fos_user_resetting_request").submit(function(e) {
    $(".error_message").animate({
      "right" : "240px",
      "width" : "0px"
    }, 300, "linear");
    e.stopPropagation();
    $.ajax({
      type: "POST",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      datatype: "json"
    }).done(function( msg ) {
      console.log(msg);
      parsed = jQuery.parseJSON(msg);
      if (parsed.result == "success") {
        window.location.href = "/profile";
      }
      else if (parsed.result == "failure") {
        if (parsed.error) {
          $element = $(".username_error_message");
          if (parsed.error == "username_invalid") {
            $element.html("That username is invalid.")
          }
          else if (parsed.error == "token_already_sent") {
            $element.html("Email already sent.")
          }
          $element.css("width", "auto");
          var width = $element.width();
          $element.css("width", "0px");
          $element.animate({
            "right" : "266px",
            "width" : width,
          }, 300, "linear");
        }
      }
    });
    return false;
  });
});