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