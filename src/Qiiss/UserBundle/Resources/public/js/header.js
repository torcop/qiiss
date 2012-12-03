$(document).ready(function() {
  $(".notifications").bind("click", function(e) {
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

  $("#main_container").bind("click", function() {
    $(".popup").each(function() {
      if ($(this).css("display") != "none" && !$(this).hasClass("animating")) {
        $(this).slideUp(300);
      return;
      }
    })
  });
});