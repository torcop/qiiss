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
          FB.api(response.id + '?fields=picture.type(large)', function(data) {
            $("#profile_picture img").attr("src", data.picture.data.url);
            $(".canvas_post_attachment img").attr("src", data.picture.data.url);
          });
          FB.api(response.id + '?fields=picture.type(small)', function(data) {
            $(".canvas_post_header .header_dp img").attr("src", data.picture.data.url);
            $(".popup_item_dp img").attr("src", data.picture.data.url);
          });
        });
      }
   });
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

var wallPostIndex = 0;

$(document).ready(function() {
  $("#profile_picture").bind("mouseenter", function() {
    $("#profile_picture_overlay").stop().fadeIn(200);
    $("#profile_picture_overlay div").stop().animate({
      "margin-left": "0px"
    }, 200, "linear");
  });

  $("#profile_picture").bind("mouseleave", function() {
    $("#profile_picture_overlay").stop().fadeOut(200);
    $("#profile_picture_overlay div").stop().animate({
      "margin-left": "200px"
    }, 200, "linear");
  });

  $("#canvas_story_create form").submit(function() {
    $.ajax({
      type: "POST",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      datatype: "json"
    }).done(function( msg ) {
      parsed = jQuery.parseJSON(msg);
      if (parsed.result == "success") {
        if (parsed.hasOwnProperty("postObject")) {
          createCanvasPost(parsed.postObject, true);
          $("#canvas_story_create textarea").val("");
        }
      }
      else if (parsed.result == "failure") {
        if (parsed.error) {
          slideOutError(parsed.error, "#login_form");
        }
      }
    });
    return false;
  });

  getWallPosts();
});

function getWallPosts() {
  $.ajax({
    url: '/get-wall-post/' + profileid,
    data: {firstResult : wallPostIndex},
    success: function(data) {
      console.log(data);
      parsed = jQuery.parseJSON(data);
      console.log(parsed);
      if (parsed.hasOwnProperty("wallPosts")) {
        $.each(parsed.wallPosts, function(key, val) {
          createCanvasPost(val, false);
        });
      }
      else { // If the user has no notifications

      }
    }
  });
}

function createCanvasPost(canvasObject, slideDown) {
  // Find a way to parametize this out, it's ugly
  var toAppend =
    '<div class="canvas_post">' +
      '<div class="canvas_post_header">' +
        '<div class="header_dp"><img src="#" /></div>' +
        '<div class="header_text">' +
          '<div class="header_name">' + canvasObject.author + '</div>' +
          '<div class="header_time">Posted at ' + canvasObject.date.date + '</div>' +
        '</div>' +
      '</div>' +
      '<div class="canvas_post_body canvas_post_section">' + canvasObject.comment + '</div>' +
      '<div class="canvas_post_tags canvas_post_section">' +
        '<div class="post_tag_bubble">Breaking Bad</div><div class="post_tag_bubble">Guitar</div><div class="post_tag_bubble">Cycling</div>' +
      '</div>' +
      '<div class="canvas_qool canvas_post_section">' +
        '<div class="canvas_qool_button">Qool</div>' +
        '<div class="canvas_qool_count">' + canvasObject.numQool + ' people think this is Qool.</div>' +
      '</div>' +
    '</div>';
  if (slideDown) {
    $("#canvas_story_container").prepend(toAppend);
    $(".canvas_post").first().hide().slideDown();
  }
  else {
    $("#canvas_story_container").append(toAppend);
  }
}