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
});