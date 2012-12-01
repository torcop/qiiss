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
    popup.slideDown(300);
  });
});