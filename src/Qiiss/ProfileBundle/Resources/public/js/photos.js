var photoIndex = 0; // Keep track of how many photos we've requested for infinite scroll

$(document).ready(function() {
  $(".fancybox").fancybox({
    helpers : {
      title : {
        type: 'inside'
      }
    },
    beforeShow: function () {
      this.title = '<div class="qool_box"><div class="qool_button">Qool</div><input type="hidden" class="qool_photo_id" value="' + $(this.element).find('.photoid').val() +'"/>' +
        '<div class="qiiss_qool_count_num">' + $(this.element).attr('caption') + '</div>' +
        '<div class="qiiss_qool_count_message"> people think this is qool.</div></div>';
      if (displayPictureId == $(this.element).find(".photoid").val()) {
        this.title += '<div class="dp_select">This is your profile picture</div>';
      }
      else {
        this.title += '<div class="dp_select">Set as profile picture</div>';
      }
    },
    afterShow: function() {
      var qoolButton = $(this.skin).find(".qool_button");
      var setDpButton = $(this.skin).find(".dp_select");
      bindQoolClick(qoolButton, $(this.skin).find(".qool_photo_id").val(), $(this.skin).find(".qiiss_qool_count_num"));
      bindSetDp(setDpButton, $(this.skin).find(".qool_photo_id").val());
    }
  });
  bindQoolClick($(".qool_button"))
  $('#canvas_file_upload').fineUploader({
    request: {
        endpoint: '/upload'
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
  $('#upload_photo_inner').fineUploader({
    request: {
      endpoint: '/upload'
    },
    text: {
      uploadButton: 'Upload a new photo'
    }
  }).on('error', function(event, id, filename, reason) {
  })
  .on('complete', function(event, id, filename, responseJSON){
    // Set a hidden input field in order to attach the uploaded picture to the wall post
    if (responseJSON.hasOwnProperty('photo')) {
      createPhotoPost(responseJSON.photo, false);
    }
  });

  bindPublish($(".publish_button"));
  $(".photo").each(function() {
    bindMouseOver($(this));
    bindDelete($(this).find(".delete_button"));
  });
});

function bindQoolClick(button, photoid, count) {
  button.bind("click", function() {
    $.ajax({
      type: "POST",
      url: "/qool-photo/" + photoid,
      datatype: "json"
    }).done(function( msg ) {
      console.log(msg);
      parsed = jQuery.parseJSON(msg);
      if (parsed.result == "off") {
        button.html("Qool")
        count.html(parseInt(count.html()) - 1);
      }
      else if (parsed.result == "on") {
        button.html("Unqool");
        count.html(parseInt(count.html()) + 1);
      }
    });
  });
}

function bindSetDp(button, photoid) {
  button.bind("click", function() {
    button.html("Working...");
    $.ajax({
      type: "POST",
      url: "/set-display-picture/" + photoid,
      datatype: "json"
    }).done(function( msg ) {
      console.log(msg);
      parsed = jQuery.parseJSON(msg);
      if (parsed.result == "success") {
        button.html("This is your profile picture");
      }
      else if (parsed.result == "failure") {
        button.html("Oops! Something went wrong.");
      }
    });
  });
}

function getPhotos() {
  $.ajax({
    url: '/get-photos/' + profileid,
    data: {firstResult : photoIndex},
    success: function(data) {
      parsed = jQuery.parseJSON(data);
      console.log(parsed);
      if (parsed.hasOwnProperty("photos")) {
        $.each(parsed.photos, function(key, val) {
          createPhotoPost(val);
        });
        var $container = $('#photo_container');
      }
      else { // If the user has no photos

      }
    }
  });
}

function bindPublish(buttonObject) {
  buttonObject.bind("click", function() {
    buttonObject.html("Publishing...");
    var photoid = $(this).closest(".photo").find('.photoid').val();
    $.ajax({
      url: '/publish-photo/' + photoid,
      success: function(data) {
        parsed = jQuery.parseJSON(data);
        console.log(parsed);
        if (parsed.result == "success") {
          buttonObject.html("Success!");
          setTimeout(function() {
            buttonObject.slideUp();
          }, 2000);
        }
        else { // If the user has no photos
          buttonObject.html("Publishing Failed");
        }
      },
      failure: function(data) {
        buttonObject.html("Publishing Failed");
      }
    });
    return false;
  });
}

function bindDelete(buttonObject) {
  buttonObject.bind("click", function() {
    buttonObject.width(buttonObject.width()); // Set the width so we can animate
    buttonObject.find(".delete_button_initial").css("display", "none");
    buttonObject.find(".delete_button_second").css("display", "block");
    buttonObject.animate({
      "width": "110px"
    }, 200, "linear");

    buttonObject.find(".delete_button_confirm").bind("click", function() {
      var photoid = $(this).closest(".photo").find('.photoid').val();
      $.ajax({
        url: '/delete-photo/' + photoid,
        success: function(data) {
          parsed = jQuery.parseJSON(data);
          console.log(parsed);
          if (parsed.result == "success") {
            buttonObject.closest("a").remove();
          }
          else { // If the user has no photos
            console.log("delete failed")
          }
        },
        failure: function(data) {
          console.log("delete failed");
        }
      });
      return false;
    });
    buttonObject.find(".delete_button_cancel").bind("click", function() {
      buttonObject.find(".delete_button_initial").css("display", "block");
      buttonObject.find(".delete_button_second").css("display", "none");
      buttonObject.width("auto");
      return false;
    });
    return false;
  });
}

function bindMouseOver(photoObject) {
  photoObject.bind("mouseenter", function() {
    photoObject.find(".delete_button").css("display", "inline-block");
  });
  photoObject.bind("mouseleave", function() {
    photoObject.find(".delete_button").css("display", "none");
  });
}

function createPhotoPost(photoObject, append) {
  // Find a way to parametize this out, it's ugly
  console.log(photoObject);
  var appendString =
    '<a href="/' + photoObject.largePath + '" class="fancybox" rel="group">' +
        '<div class="photo">'
  if (photoObject.status == "unpublished") {
    appendString += '<div class="publish_button">Click to publish</div>';
  }
  if (selfPage) {
    appendString += '<div class="delete_button">X</div>';
  }
  appendString +=
    '<input type="hidden" class="photoid" value="' + photoObject.id + '">' +
      '<div class="photo_container_inner">' +
        '<img src="/' + photoObject.mediumPath + '" />' +
      '</div>' +
    '</div>' +
  '</a>';
  var toAppend = $(appendString);
  if (append) {
    $("#photo_container").append(toAppend);
  }
  else {
    $("#photo_container").prepend(toAppend);
    var $container = $('#photo_container');
    bindPublish(toAppend.find(".publish_button"));
    bindMouseOver(toAppend);
  }
}