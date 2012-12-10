$(document).ready(function() {
  $(".fos_user_change_password").submit(function(e) {
    $(".error_message").css("background-color", "#bf3030");
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
        $element = $(".old_password_error_message");
        $element.css("width", "auto");
        $element.html("Success!");
        var width = $element.width();
        $element.css("background-color", "#24913C");
        $element.css("width", "0px");
        $element.animate({
          "right" : "314px",
          "width" : width,
        }, 300, "linear");
      }
      else if (parsed.result == "failure") {
        if (parsed.error) {
          var $element;
          if (parsed.error == "fos_user.password.mismatch") {
            $element = $(".new_password_error_message");
            $element.html("These passwords don't match.")
          }
          else if (parsed.error == "token_already_sent") {
            $element.html("Email already sent.")
          }
          else if (parsed.error == "password.wrong") {
            $element = $(".old_password_error_message");
            $element.html("Wrong current password.")
          }
          $element.css("width", "auto");
          var width = $element.width();
          $element.css("width", "0px");
          $element.animate({
            "right" : "314px",
            "width" : width,
          }, 300, "linear");
        }
      }
    });
    return false;
  });
});