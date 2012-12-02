jQuery.fx.interval = 40;

/**********************
FACEBOOK SDK CODE HERE
**********************/
window.fbAsyncInit = function() {
  // init the FB JS SDK
  FB.init({
    appId      : '281453298642270', // App ID from the App Dashboard
    channelUrl : '', // Channel File for x-domain communication
    status     : true, // check the login status upon init?
    cookie     : true, // set sessions cookies to allow your server to access the session?
    xfbml      : true  // parse XFBML tags on this page?
  });

  $(document).ready(function() {
    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        FB.api('/me', function(response) { //If the user is already logged in via facebook, redirect them to the profile page
          //window.location.replace("/profile");
        });
      }
   });
  });

  $('.facebook_login_button').bind('click', function() {
    FB.login(function(response) {
       if (response.authResponse) {
         console.log('Welcome!  Fetching your information.... ');
         FB.api('/me', function(response) {
           console.log('Good to see you, ' + response.name + '.');
         });
       } else {
         console.log('User cancelled login or did not fully authorize.');
       }
     }, {scope: 'email'});
  });
  // Additional initialization code such as adding Event Listeners goes here

};

// Load the SDK's source Asynchronously
(function(d, debug){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
   ref.parentNode.insertBefore(js, ref);
 }(document, /*debug*/ false));

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=281453298642270";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/*******************
END FACEBOOK SDK CODE
********************/

var pictureIndex = 0;
var homepageDirectory = "/bundles/qiissgeneral/images/home-page-images/";
var thumbDirectory = "/bundles/qiissgeneral/images/thumbs/";
var pictureValues = jQuery.parseJSON('{ "pictures": [' +
'{"picture" : "' + homepageDirectory + 'message5.jpg", "angle" : "-8", "textPosition" : "bottom", "offset" : "-35%"},' +
'{"picture" : "' + homepageDirectory + 'message3.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"},' +
'{"picture" : "' + homepageDirectory + 'message1.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-40%"},' +
'{"picture" : "' + homepageDirectory + 'message2.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"},' +
'{"picture" : "' + homepageDirectory + 'message4.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"},' +
'{"picture" : "' + homepageDirectory + 'message6.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"}]}');


$(document).ready(function() {

  for (i = 1; i < 41; i++) {
    $(".stream_inner").append('<img src="' + thumbDirectory + 'sample-' + i + '.jpg">');
  }
  $("#stream_outer").append($(".stream_inner").clone().removeClass("first"));

  $('.signup_form input').not('.submit').placeholder();

  $('.auth_tab').height($('#signup_container_body').height());

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
    $("#signup_form .error_message").animate({
      "right" : "280px",
      "width" : "0px"
    }, 300, "linear");
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
  timeFade();
});

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
  $element.css("width", "auto");
  var width = $element.width();
  $element.css("width", "0px");
  $element.animate({
    "right" : "300px",
    "width" : width,
  }, 300, "linear");
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

$(window).load(function() {
  animateStream();
});

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

$(function(){
  $.extend($.fn.disableTextSelect = function() {
    return this.each(function(){
      if($.browser.mozilla){//Firefox
        $(this).css('MozUserSelect','none');
      }else if($.browser.msie){//IE
        $(this).bind('selectstart',function(){return false;});
      }else{//Opera, etc.
        $(this).mousedown(function(){return false;});
      }
    });
  });
  $('.noSelect').disableTextSelect();//No text selection on elements with a class of 'noSelect'
});
