var photoIndex = 0; // Keep track of how many photos we've requested for infinite scroll

$(document).ready(function() {
  var $container = $('#photo_container');
  $container.masonry({
    itemSelector : '.photo',
    isFitWidth: true
  });
  $(".fancybox").fancybox();
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
    //$("#canvas_photo_preview img").attr("src", "/" + responseJSON.filename);
    //$("#canvas_photo_preview").css("display", "block");
    // Set a hidden input field in order to attach the uploaded picture to the wall post
    if (responseJSON.hasOwnProperty('photo')) {
      createPhotoPost(responseJSON.photo, false);
    }
  });
});

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
        $container.imagesLoaded(function() {
          $container.masonry({
            itemSelector : '.photo',
            isFitWidth: true
          });
        });
      }
      else { // If the user has no photos

      }
    }
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
    $container.imagesLoaded(function() {
      $container.masonry('reload');
    });
  }
}