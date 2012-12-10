$(document).ready(function() {
  $(".notifications").each(function() {
    var which = $(this).attr('id').split("_")[0];
    var $this = $(this);
    $.ajax({
      url: '/get-notifications-number/' + which,
      success: function(data) {
        parsed = jQuery.parseJSON(data);
        if (parseInt(parsed.numNew) > 0) {
          $this.find(".noty_new").html(parsed.numNew).css("display", "block");
        }
      }
    });
  });
  // Set notification "opened" data
  $("#notification_popup").data("notyIndex", 0);
  $("#message_popup").data("notyIndex", 0);
  $("#date_popup").data("notyIndex", 0);

  $(".notifications").bind("click", function() {
    var $this = $(this);
    var which = $(this).attr('id').split("_")[0];
    var popup = $("#" + which + "_popup");
    if (popup.css("display") != "none") {
      popup.slideUp(300);
      return;
    }
    $(".popup").each(function() {
      if ($(this).css("display") != "none") {
        $(this).css("display", "none");
        popup.toggle();
        return;
      }
    });
    popup.addClass("animating");
    popup.slideDown(300, function() {
      popup.removeClass("animating");
    });
    $.ajax({
      url: '/get-notifications/' + which + "/" + popup.data("notyIndex"),
      success: function(data) {
        parsed = jQuery.parseJSON(data);
        $.each(parsed.notifications, function(key, val) {
          // Find a way to parametize this out, it's ugly
          popup.find(".popup_content").append(
            '<a href="' + val.link +  '">' +
            '<div class="popup_item">' +
              '<div class="popup_item_dp"><img src="#" class="popup_item_dp_img"></div>' +
              '<div class="popup_item_content">' +
                '<div class="popup_item_text">' + val.content + '</div>' +
                '<div class="popup_item_time">' + val.date + '</div>' +
              '</div>' +
            '</div>' +
            '</a>'
          );
          popup.data("notyIndex", popup.data("notyIndex") + parsed.numResults);
          $this.find(".noty_new").html("").css("display", "none");
        });
      }
    });
  });

  $("#popup_item").bind("click", function() {

  });

  $("body").bind("click", function(event) {
    $(".popup").each(function() {
      if ($(this).css("display") != "none" && !$(this).hasClass("animating") && !isDescendant($("#upper_top_banner")[0], event.target)) {
        console.log($(event.target).context.className);
        $(this).slideUp(300);
      return;
      }
    })
  });
});

function isDescendant(parent, child) {
     var node = child.parentNode;
     while (node != null) {
      console.log("test");
         if (node == parent) {
             return true;
         }
         node = node.parentNode;
     }
     return false;
}