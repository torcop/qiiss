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

  $("#sample_photos").bind("mouseenter", function() {
    $("#sample_photos_overlay").stop().fadeIn(200);
    $("#sample_photos_overlay div").stop().animate({
      "margin-left": "0px"
    }, 200, "linear");
  });

  $("#sample_photos").bind("mouseleave", function() {
    $("#sample_photos_overlay").stop().fadeOut(200);
    $("#sample_photos_overlay div").stop().animate({
      "margin-left": "200px"
    }, 200, "linear");
  });

  $("#canvas_story_create form").submit(function() {
    var interests = new Array();
    interests[0] = $("#tag_interest_one").val();
    interests[1] = $("#tag_interest_two").val();
    interests[2] = $("#tag_interest_three").val();

    var postData = $(this).serialize();
    postData += "&interests=" + JSON.stringify(interests);
    console.log(postData);
    $.ajax({
      type: "POST",
      url: $(this).attr("action"),
      data: postData,
      datatype: "json"
    }).done(function( msg ) {
      parsed = jQuery.parseJSON(msg);
      if (parsed.result == "success") {
        if (parsed.hasOwnProperty("postObject")) {
          createCanvasPost(parsed.postObject, true);
          $("#canvas_story_create textarea").val("");
          $("#canvas_photo_preview").html("");
          $el = $('#canvas_lower_tag_div');
          $el.slideUp("fast", function() {
            $("#tag_interest_one").val("");
            $("#tag_interest_two").val("");
            $("#tag_interest_three").val("");
          });
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

  $("#attach_photo_button").click(function() {
    $(this).hide();
    $(this).closest("#left_canvas_buttons").find("#canvas_file_upload").css("display", "inline-block");
  });

  $('#canvas_file_upload').fineUploader({
    request: {
        endpoint: '/upload'
    },
    text: {
      uploadButton: 'Attach photo'
    }
  }).on('error', function(event, id, filename, reason) {
  })
  .on('complete', function(event, id, filename, responseJSON){
    $("#canvas_photo_preview img").attr("src", "/" + responseJSON.filename);
    $("#canvas_photo_preview").css("display", "block");
    // Set a hidden input field in order to attach the uploaded picture to the wall post
    if (responseJSON.hasOwnProperty('photoid')) {
      $("#photoid").val(responseJSON.photoid);
    }
  });

  $('#edit_profile').bind('click', function() {
    setEditable(true);
  });

  $('#edit_profile_confirm').bind('click', function() {
    setEditable(false);
    var interests = new Array();
      interests[0] = $("#edit_interest_one").val();
      interests[1] = $("#edit_interest_two").val();
      interests[2] = $("#edit_interest_three").val();

    // Update the interests that display on the page
    $("#interest_one").html(interests[0]);
    $("#interest_two").html(interests[1]);
    $("#interest_three").html(interests[2]);

    $("#preference").html($("#edit_preference").val());
    $("#charity").html($("#edit_charity").val());
    $("#location_city").html($("#edit_location_city").val());
    $("#location_country").html($("#edit_location_country").val());

    $.ajax({
      type: "POST",
      url: "/edit-profile/set",
      data: {
        interests : JSON.stringify(interests),
        location_city : $("#edit_location_city").val(),
        location_country : $("#edit_location_country").val(),
        preference : $("#edit_preference").val(),
        charity : $("#edit_charity").val()
      },
      datatype: "json",
      success: function(data) {
        console.log(data)
      }
    });
  });

  $()

  $('#edit_profile_cancel').bind('click', function() {
    setEditable(false);
  });

  $('#tag_interest_button').bind('click', function() {
    toggleTagInterests();
  });
  $("#edit_location_city").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "location_city",
    endPoint : '/location/predict/city'
  });
  $("#edit_location_country").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "location_country",
    endPoint : '/location/predict/country'
  });
  $("#edit_preference").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "preference",
    endPoint : '/preference/predict'
  });
  $("#edit_interest_one").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "interest_one",
    endPoint : '/interests/predict'
  });
  $("#edit_interest_two").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "interest_two",
    endPoint : '/interests/predict'
  });
  $("#edit_interest_three").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "interest_three",
    endPoint : '/interests/predict'
  });
  $("#tag_interest_one").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "tag_interest_one",
    endPoint : '/interests/predict'
  });
  $("#tag_interest_two").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "tag_interest_two",
    endPoint : '/interests/predict'
  });
  $("#tag_interest_three").ajaxDropdown({
    placeholder : $(this).attr("placeholder"),
    name : "tag_interest_three",
    endPoint : '/interests/predict'
  });
  getWallPosts();
});

function toggleTagInterests() {
  $el = $('#canvas_lower_tag_div');
  if ($el.css("display") == "none") {
    $el.slideDown("fast");
  }
  else {
    $el.slideUp("fast", function() {
      $("#tag_interest_one").val("");
      $("#tag_interest_two").val("");
      $("#tag_interest_three").val("");
    });
  }
}

function setEditable(enableEdit) {
  if (!enableEdit) {
    $('#header_info .info_section_bubble_edit').hide();
    $('#edit_profile_confirm').hide();
    $('#edit_profile_cancel').hide();
    $('#edit_profile').show();
    $('#header_info .info_section_bubble').show();
  }
  else {
    $('#header_info .info_section_bubble_edit').show();
    $('#edit_profile_confirm').css("display", "inline-block");
    $('#edit_profile_cancel').css("display", "inline-block");
    $('#edit_profile').hide();
    $('#header_info .info_section_bubble').hide();
    $('#header_info .info_section_bubble').each(function() {
      console.log($(this).html());
      $("#edit_" + $(this).attr("id")).val($(this).html());
    });
  }
}

function getWallPosts() {
  $.ajax({
    url: '/get-wall-post/' + profileid,
    data: {firstResult : wallPostIndex},
    success: function(data) {
      parsed = jQuery.parseJSON(data);
      if (parsed.hasOwnProperty("wallPosts")) {
        $.each(parsed.wallPosts, function(key, val) {
          console.log(val);
          createCanvasPost(val, false);
        });
        $(".canvas_qool_button").each(function() {
          bindQoolClick($(this)); // Bind all the posts initially
        })
      }
      else { // If the user has no notifications

      }
    }
  });
}

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

function createCanvasPost(canvasObject, slideDown) {
  // Find a way to parametize this out, it's ugly
  var toAppend =
    '<div class="canvas_post">' +
      '<input type="hidden" class="postid" value="' + canvasObject.postId + '">' +
      '<div class="canvas_post_header">' +
        '<div class="header_dp"><img src="/' + canvasObject.profilePicture + '" /></div>' +
        '<div class="header_text">' +
          '<div class="header_name">' + canvasObject.author + '</div>' +
          '<div class="header_time">Posted at ' + canvasObject.date.date + '</div>' +
        '</div>' +
      '</div>' +
      '<div class="canvas_post_body canvas_post_section">' + canvasObject.comment + '</div>';
    if (canvasObject.hasOwnProperty('photo')) {
      toAppend += '<a href="/' + canvasObject.photo + '"><div class="canvas_post_attachment"><img src="/' + canvasObject.photo + '"></a></div>';
    }
    if (canvasObject.hasOwnProperty('interests')) {
      toAppend += '<div class="canvas_post_tags canvas_post_section">';
      for (var i = 0; i < canvasObject.interests.length; i++) {
        toAppend += '<div class="post_tag_bubble">' + canvasObject.interests[i] + '</div>';
      }
      toAppend += '</div>';
    }
    toAppend += '<div class="canvas_qool canvas_post_section">' +
        '<div class="canvas_qool_button">' + (canvasObject.postLiked ? 'Unq' : 'Q') + 'ool</div>' +
        '<div class="canvas_qool_count"><div class="qiiss_qool_count_num">' + canvasObject.numQool + '</div> people think this is Qool.</div>' +
      '</div>' +
    '</div>';
  if (slideDown) {
    $("#canvas_story_container").prepend(toAppend);
    $(".canvas_post").first().hide().slideDown();
    bindQoolClick($(".canvas_post").first().find(".canvas_qool_button"));
  }
  else {
    $("#canvas_story_container").append(toAppend);
  }
}