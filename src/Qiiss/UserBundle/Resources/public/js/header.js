$(document).ready(function() {
  $(".notifications").bind("click", function() {
    var popup = $("#" + $(this).attr('id').split("_")[0] + "_popup");
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
  });

  $("#popup_item").bind("click", function() {

  });

  $("body").bind("click", function(event) {
    $(".popup").each(function() {
      if ($(this).css("display") != "none" && !$(this).hasClass("animating") && $(event.target).context.className.indexOf("popup") == -1) {
        console.log($(event.target).context.className);
        $(this).slideUp(300);
      return;
      }
    })
  });
});