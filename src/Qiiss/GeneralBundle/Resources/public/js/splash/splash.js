jQuery.fx.interval = 40;

/**********************
FACEBOOK SDK CODE HERE
**********************/

function goLogIn(){
    window.location = "/login_check_fb";
}

function onFbInit() {
    if (typeof(FB) != 'undefined' && FB != null ) {
        FB.Event.subscribe('auth.statusChange', function(response) {
          if (response.session || response.authResponse) {
              setTimeout(goLogIn, 500);
          }
        });
    }
}


/*******************
END FACEBOOK SDK CODE
********************/

var pictureIndex = 0;
var homepageDirectory = "/bundles/qiissgeneral/images/home-page-images/";
var thumbDirectory = "/bundles/qiissgeneral/images/thumbs/";
var pictureValues = jQuery.parseJSON('{ "pictures": [' +
'{"picture" : "' + homepageDirectory + 'message5.jpg", "offset" : "-35%"},' +
'{"picture" : "' + homepageDirectory + 'message3.jpg", "offset" : "-25%"},' +
'{"picture" : "' + homepageDirectory + 'message1.jpg", "offset" : "-40%"},' +
'{"picture" : "' + homepageDirectory + 'message2.jpg", "offset" : "-25%"},' +
'{"picture" : "' + homepageDirectory + 'message4.jpg", "offset" : "-25%"},' +
'{"picture" : "' + homepageDirectory + 'message6.jpg", "offset" : "-25%"}]}');

$(document).ready(function() {

  $(".birthday").each(function() {
    var placeHolderVar;
    if ($(this).hasClass("day")) {
      placeHolderVar = "Day";
    }
    if ($(this).hasClass("month")) {
      placeHolderVar = "Month";
    }
    if ($(this).hasClass("year")) {
      placeHolderVar = "Year";
    }
    $(this).selectDropdown({placeholder : placeHolderVar});
  });

  for (i = 1; i < 41; i++) {
    $(".stream_inner").append('<img src="' + thumbDirectory + 'sample-' + i + '.jpg">');
  }
  $("#stream_outer").append($(".stream_inner").clone().removeClass("first"));

  $('#suggest_sign_up').bind("click", function() {
    $("#signup_tab").trigger("click");
  });
  $('#suggest_facebook').bind("click", function() {
    $("#facebook_tab").trigger("click");
  });

  $('.remember_me').click(function() {
    $(this).disableTextSelect();
    if ($(this).find('input').prop("checked")) {
      $(this).find('input').prop("checked", false);
    }
    else {
      $(this).find('input').prop("checked", true);
    }
  });

  $("#login_form").submit(function(e) {
    e.stopPropagation();
    $.ajax({
      type: "POST",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      datatype: "json"
    }).done(function( msg ) {
      parsed = jQuery.parseJSON(msg);
      if (parsed.result == "success") {
        window.location.href = "/profile";
      }
      else if (parsed.result == "failure") {
        if (parsed.error) {
          slideOutError(parsed.error, "#login_form");
        }
      }
    });
    return false;
  });

  $("#signup_form").submit(function(e) {
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
          slideOutError(parsed.error, "#signup_form");
        }
      }
    });
    e.stopPropagation();
    return false;
  });
  $(".picture_container_inner").not(".hidden").css('top', pictureValues.pictures[pictureIndex].offset);
  $(".picture_container_inner.hidden").css('top', pictureValues.pictures[pictureIndex + 1].offset);
  pictureIndex++;
  bindTabs('#signup_tab', '#signup_container_body');
  bindTabs('#login_tab', '#login_container_body');
  bindTabs('#facebook_tab', '#facebook_container_body');
  bindFacebook();
  timeFade();
  animateStream();
});

function bindFacebook() {
  $('.facebook_login_button').bind('click', function() {
    $element = $(this).find(".right");
    $element.html("Logging you in...");
    FB.login(function(response) {
      if (response.authResponse) {
        $element.html("Login Succesful!");
      } else {
        $element.html("Login With Facebook")
      }
     }, {scope: 'email, user_birthday'});
  });
}

function slideOutError(message, form) {
  var $element;
  if (message.indexOf("fos_user.username") != -1) {
    $element = $(form + " .username_error_message");
    if (message == "fos_user.username.blank") {
      $element.html("Enter a username.");
    }
    else if (message == "fos_user.username.already_used") {
      $element.html("Username is in use.");
    }
    else if (message == "fos_user.username.short") {
      $element.html("Username too short.");
    }
    else if (message == "fos_user.username.Bad credentials") {
      $element.html("Username / Password incorrect.");
    }
  }
  else if (message.indexOf("fos_user.email") != -1) {
    $element = $(form + " .email_error_message");
    if (message == "fos_user.email.blank") {
      $element.html("Enter an email.");
    }
    else if (message == "fos_user.email.invalid") {
      $element.html("Enter a valid email.");
    }
    else if (message == "fos_user.email.already_used") {
      $element.html("Email already in use.");
    }
  }
  else if (message.indexOf("fos_user.password") != -1) {
    $element = $(form + " .password_error_message");
    if (message == "fos_user.password.badmatch") {
      $element.html("Passwords do not match.");
    }
    else if (message == "fos_user.password.blank") {
      $element.html("Please enter a password.");
    }
  }
  else if (message.indexOf("dob") != -1) {
    $element = $(form + " .birthday_error_message");
    if (message == "dob.empty") {
      $element.html("Enter your birthday.");
    }
    else if (message == "dob.invalid") {
      $element.html("Invalid Date.");
    }
  }
      /* TODO - FIX THIS ERROR MESSAGE BUG */
  else if (message == "This value is not valid.") {
    $element = $(form + " .birthday_error_message").html("Invalid Date.");
  }
  if ($element != null) {
    $element.css("width", "auto");
    var width = $element.width();
    $element.css("width", "0px");
    $element.animate({
      "right" : "300px",
      "width" : width,
    }, 300, "linear");
  }
}

function bindTabs(click, show) {
  $(click).click(function() {
    $('.auth_tab_button.selected').removeClass("selected");
    $('.auth_tab').removeClass("selected");
    $(show).addClass("selected");
    $(this).addClass("selected");
    if ($(this).attr("id") == "signup_tab") {
      $('.auth_tab_button').removeClass("left right shadow");
      $('#login_tab').addClass("left").addClass("shadow");
      $('#facebook_tab').addClass("left");
    }
    else if ($(this).attr("id") == "login_tab") {
      $('.auth_tab_button').removeClass("left right shadow");
      $('#signup_tab').addClass("right").addClass("shadow");
      $('#facebook_tab').addClass("left").addClass("shadow");
    }
    else if ($(this).attr("id") == "facebook_tab") {
      $('.auth_tab_button').removeClass("left right shadow");
      $('#signup_tab').addClass("right");
      $('#login_tab').addClass("right").addClass("shadow");
    }
  });
}

function timeFade() {
  setTimeout(function() {
    //Get the index of the next picture
    nextIndex = pictureIndex < pictureValues.pictures.length - 1 ? pictureIndex + 1 : 0;
    //Then, call the rotate / fade in
    $(".picture_container_inner.hidden").fadeIn(1000, function() {
      //Update the src of the background image so we can fade in a new one next time
      $(".picture_container_inner").not(".hidden").addClass("hidden").html('<img src="' + pictureValues.pictures[nextIndex].picture + '" />').css('top', pictureValues.pictures[nextIndex].offset);
      $(this).removeClass("hidden");
      timeFade();
    });
    $(".picture_container_inner").not(".hidden").fadeOut(1000);
    pictureIndex = nextIndex;
  }, 9000);
}

function animateStream() {
  $(".stream_inner.first").each(function() {
    var width = $(this).width()
    var left = $(this).css('left') == 'auto' ? 0 : parseInt($(this).css('left').replace("px", ""));
    $(this).animate({
      marginLeft: '-' + (width - left)
    }, 70000, 'linear', function() {
      if ($(this).hasClass("first")) {
        $(this).removeClass("first");
        var swap = $(this).detach();
        $(".stream_inner").addClass("first");
        $("#stream_outer").append(swap);
        swap.css('margin-left', '0px');
        animateStream();
      }
    });
  });
}
