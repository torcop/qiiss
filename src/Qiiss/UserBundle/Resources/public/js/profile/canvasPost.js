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
          /*
          FB.api(response.id + '?fields=picture.type(large)', function(data) {
            $("#profile_picture img").attr("src", data.picture.data.url);
            $(".canvas_post_attachment img").attr("src", data.picture.data.url);
          });
          FB.api(response.id + '?fields=picture.type(small)', function(data) {
            $(".canvas_post_header .header_dp img").attr("src", data.picture.data.url);
            $(".popup_item_dp img").attr("src", data.picture.data.url);
          });
        */
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
  bindQoolClick($(".canvas_qool_button"));
});

function bindQoolClick(button) {
  button.bind("click", function() {
    $.ajax({
      type: "POST",
      url: "/qool-wall-post/" + $(this).closest(".canvas_post").find(".postid").val(),
      datatype: "json"
    }).done(function( msg ) {
      parsed = jQuery.parseJSON(msg);
      if (parsed.result == "off") {
        button.html("Qool")
        var count = button.closest(".canvas_qool").find(".qiiss_qool_count_num");
        count.html(parseInt(count.html()) - 1);
      }
      else if (parsed.result == "on") {
        button.html("Unqool");
        var count = button.closest(".canvas_qool").find(".qiiss_qool_count_num");
        count.html(parseInt(count.html()) + 1);
      }
    });
  });
}