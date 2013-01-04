$.webshims.setOptions({
  // Delay the addition of polyfillers until the dom is ready, so our placeholders actually work properly
  waitReady: true
});
//load all polyfill features
$.webshims.polyfill();


$(document).ready(function() {

	//Fix the input validation messages on fields
  $(document).bind('firstinvalid', function(e){
    $.webshims.validityAlert.showFor( e.target );
    //prevent browser from showing native validation message
    return false;
  });

});

$(function(){
  $.extend($.fn.disableTextSelect = function() {
    return this.each(function(){
      if($.browser.mozilla){//Firefox
        $(this).css('MozUserSelect','none');
      }else if($.browser.msie){//IE
        $(this).bind('selectstart',function(){return false;});
      }else{//Opera, etc.
        $(this).mousedown(function(){return false;});
      }
    });
  });
  $('.noSelect').disableTextSelect();//No text selection on elements with a class of 'noSelect'

  jQuery.fn.animateAuto = function(prop, speed, callback){
    var elem, height, width;
    return this.each(function(i, el){
        el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo("body");
        height = elem.css("height"),
        width = elem.css("width"),
        elem.remove();
        if(prop === "height")
            el.animate({"height":height}, speed, callback);
        else if(prop === "width")
            el.animate({"width":width}, speed, callback);
        else if(prop === "both")
            el.animate({"width":width,"height":height}, speed, callback);
    });
  }
});