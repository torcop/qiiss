$(document).ready(function() {
  getNotificationNumber();
  setInterval(function() {
    getNotificationNumber();
  }, 7000);
  // Set notification "opened" data
  $("#notification_popup").data( { notyIndex : 0, initialPull : false} );
  $("#message_popup").data( { notyIndex : 0, initialPull : false} );
  $("#date_popup").data( { notyIndex : 0, initialPull : false} );

  $(".notifications").bind("click", function() {
    var $this = $(this);
    var which = $(this).attr('id').split("_")[0];
    var popup = $("#" + which + "_popup");
    if (popup.css("display") != "none") {
      popup.slideUp(300, function() {
        $this.removeAttr("style");
      });
      return;
    }
    $(".popup").each(function() {
      if ($(this).css("display") != "none") {
        $(this).css("display", "none");
        popup.toggle();
        $(".notifications").removeAttr("style")
        $this.css("background-color", "#ccc");
        return;
      }
    });
    popup.addClass("animating");
    popup.slideDown(300, function() {
      popup.removeClass("animating");
    });
    $this.css("background-color", "#ddd");
    if (!popup.data("initialPull")) {
      popup.find(".vertical_align_fix").css("display", "inline-block");
      popup.find(".ajax_loader").css("display", "inline-block");
      $.ajax({
        url: '/get-notifications/' + which + "/" + popup.data("notyIndex"),
        success: function(data) {
          popup.find(".vertical_align_fix").css("display", "none");
          popup.find(".ajax_loader").css("display", "none");
          popup.find("a").remove();
          parsed = jQuery.parseJSON(data);
          console.log(parsed);
          popup.data("initialPull", true);
          if (parsed.hasOwnProperty("notifications")) {
            $.each(parsed.notifications, function(key, val) {
              // Find a way to parametize this out, it's ugly
              popup.find(".popup_content").append(
                '<a href="' + val.link +  '">' +
                '<div class="popup_item' + (val.notyRead == false ? ' popup_item_new' : '') + '">' +
                  '<div class="popup_item_dp"><img src="#" class="popup_item_dp_img"></div>' +
                  '<div class="popup_item_content">' +
                    '<div class="popup_item_time">' + val.date + '</div>' +
                    '<div class="popup_item_text">' + val.content + '</div>' +
                  '</div>' +
                '</div>' +
                '</a>'
              );
              popup.data("notyIndex", popup.data("notyIndex") + parsed.numResults);
              $this.find(".noty_new").html("").css("display", "none");
              setTimeout(function() {
                popup.find(".popup_item_new").removeClass("popup_item_new");
              }, 3000);
            });
          }
          else { // If the user has no notifications
            popup.find(".popup_content").append(
              '<div class="popup_none">' +
                  '<div class="popup_item_text"> You currently have no ' + which + ' notifications.</div>' +
              '</div>'
            );
          }
        }
      });
    }
  });

  $("#popup_item").bind("click", function() {

  });

  $("body").bind("click", function(event) {
    $(".popup").each(function() {
      if ($(this).css("display") != "none" && !$(this).hasClass("animating") && !isDescendant($("#upper_top_banner")[0], event.target)) {
        var which = $(this).attr('id').split("_")[0];
        var icon = $("#" + which + "_icon");
        $(this).slideUp(300, function() {
          icon.removeAttr("style");
        });
      return;
      }
    })
  });
});

function isDescendant(parent, child) {
     var node = child.parentNode;
     while (node != null) {
         if (node == parent) {
             return true;
         }
         node = node.parentNode;
     }
     return false;
}

function getNotificationNumber() {
  $(".notifications").each(function() {
    var which = $(this).attr('id').split("_")[0];
    var $this = $(this);
    $.ajax({
      url: '/get-notifications-number/' + which,
      success: function(data) {
        parsed = jQuery.parseJSON(data);
        if (parseInt(parsed.numNew) > 0) {
          $this.find(".noty_new").html(parsed.numNew).css("display", "block");
          $("#" + which + "_popup").data("notyIndex", 0);
          $("#" + which + "_popup").data("initialPull", false);
        }
      }
    });
  });
}