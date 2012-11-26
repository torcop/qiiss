jQuery.fx.interval = 40;

/**********************
FACEBOOK SDK CODE HERE
**********************/
window.fbAsyncInit = function() {
  // init the FB JS SDK
  FB.init({
    appId      : '281453298642270', // App ID from the App Dashboard
    channelUrl : '', // Channel File for x-domain communication
    status     : true, // check the login status upon init?
    cookie     : true, // set sessions cookies to allow your server to access the session?
    xfbml      : true  // parse XFBML tags on this page?
  });

  $(document).ready(function() {
    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        FB.api('/me', function(response) { //If the user is already logged in via facebook, redirect them to the profile page
          //window.location.replace("/profile");
        });
      }
   });
  });

  $('.facebook_login_button').bind('click', function() {
    FB.login(function(response) {
       if (response.authResponse) {
         console.log('Welcome!  Fetching your information.... ');
         FB.api('/me', function(response) {
           console.log('Good to see you, ' + response.name + '.');
         });
       } else {
         console.log('User cancelled login or did not fully authorize.');
       }
     }, {scope: 'email'});
  });
  // Additional initialization code such as adding Event Listeners goes here

};

// Load the SDK's source Asynchronously
(function(d, debug){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
   ref.parentNode.insertBefore(js, ref);
 }(document, /*debug*/ false));

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=281453298642270";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/*******************
END FACEBOOK SDK CODE
********************/

var pictureIndex = 0;
var homepageDirectory = "/bundles/qiissgeneral/images/home-page-images/";
var thumbDirectory = "/bundles/qiissgeneral/images/thumbs/";
var pictureValues = jQuery.parseJSON('{ "pictures": [' +
'{"picture" : ' + homepageDirectory + '"message5.jpg", "angle" : "-8", "textPosition" : "bottom", "offset" : "-50%"},' +
'{"picture" : ' + homepageDirectory + '"message3.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"},' +
'{"picture" : ' + homepageDirectory + '"message1.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-40%"},' +
'{"picture" : ' + homepageDirectory + '"message2.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"},' +
'{"picture" : ' + homepageDirectory + '"message4.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"},' +
'{"picture" : ' + homepageDirectory + '"message6.jpg", "angle" : "5", "textPosition" : "top", "offset" : "-25%"}]}');


$(document).ready(function() {

  for (i = 1; i < 41; i++) {
    $(".stream_inner").append('<img src="' + thumbDirectory + 'sample-' + i + '.jpg">');
  }
  $("#stream_outer").append($(".stream_inner").clone().removeClass("first"));

  $(window).resize(function() {
    var width = $(window).width();
    var height = $(window).height();
    if ((width / height) < 16/9) {
      $('body').width((height * 16/9))
    }
    else {
      $('body').width('100%');
    }

    if ((width / height) >= 16/9) {
      console.log('test');
      $('body').height((width * 9/16))
    }
    else {
      console.log('test2');
      $('body').height('100%');
    }
  });

  $('.signup_form input').not('.submit').placeholder();

  $('.remember_me').click(function() {
    $(this).disableTextSelect();
    if ($(this).find('input').prop("checked")) {
      $(this).find('input').prop("checked", false);
    }
    else {
      $(this).find('input').prop("checked", true);
    }
  });

  $(".picture_container_inner").not(".hidden").css('top', pictureValues.pictures[pictureIndex].offset);
  $(".picture_container_inner.hidden").css('top', pictureValues.pictures[pictureIndex + 1].offset);
  pictureIndex++;
  timeFade();
});

function bindTabs(click, amount) {
  $(click).click(function() {
    $('.auth_tab_button.selected').removeClass("selected");
    $('.auth_tab').css('left', amount);
    $(this).addClass("selected");
    if ($(this).attr("id") == "signup_tab") {
      $('.auth_tab_button').removeClass("left right shadow");
      $('#login_tab').addClass("left").addClass("shadow");
      $('#signup_facebook_tab').addClass("left");
      /*
      $('#login_container').animate({
        height: $('#signup_container_body').outerHeight() + $('.top_message').outerHeight()
      }, 150, "linear");
      */
    }
    else if ($(this).attr("id") == "login_tab") {
      $('.auth_tab_button').removeClass("left right shadow");
      $('#signup_tab').addClass("right").addClass("shadow");
      $('#signup_facebook_tab').addClass("left").addClass("shadow");
    }
    else if ($(this).attr("id") == "signup_facebook_tab") {
      $('.auth_tab_button').removeClass("left right shadow");
      $('#signup_tab').addClass("right");
      $('#login_tab').addClass("right").addClass("shadow");
    }
  });
}

$(window).load(function() {
  animateStream();
  width = $("#signup_container_body").outerWidth() + 4;
  bindTabs('#signup_tab', 0);
  bindTabs('#login_tab', -width);
  bindTabs('#signup_facebook_tab', -width * 2);
});

function timeFade() {
  setTimeout(function() {
    //Get the index of the next picture
    nextIndex = pictureIndex < pictureValues.pictures.length - 1 ? pictureIndex + 1 : 0;
    //Then, call the rotate / fade in
    $(".picture_container_inner.hidden").fadeIn(1000, function() {
      //Update the src of the background image so we can fade in a new one next time
      $(".picture_container_inner").not(".hidden").addClass("hidden").html('<img src="' + pictureValues.pictures[nextIndex].picture + '" />').css('top', pictureValues.pictures[nextIndex].offset);
      $(this).removeClass("hidden");
      timeFade();
    });
    $(".picture_container_inner").not(".hidden").fadeOut(1000);
    pictureIndex = nextIndex;
  }, 9000);
}

function animateStream() {
  $(".stream_inner.first").each(function() {
    var width = $(this).width()
    var left = $(this).css('left') == 'auto' ? 0 : parseInt($(this).css('left').replace("px", ""));
    $(this).animate({
      marginLeft: '-' + (width - left)
    }, 70000, 'linear', function() {
      if ($(this).hasClass("first")) {
        $(this).removeClass("first");
        var swap = $(this).detach();
        $(".stream_inner").addClass("first");
        $("#stream_outer").append(swap);
        swap.css('margin-left', '0px');
        animateStream();
      }
    });
  });
}

function changeType(x, type) {
    if(x.prop('type') == type)
        return x; //That was easy.
    try {
        return x.prop('type', type); //Stupid IE security will not allow this
    } catch(e) {
        //Try re-creating the element (yep... this sucks)
        //jQuery has no html() method for the element, so we have to put into a div first
        var html = $("<div>").append(x.clone()).html();
        var regex = /type=(\")?([^\"\s]+)(\")?/; //matches type=text or type="text"
        //If no match, we add the type attribute to the end; otherwise, we replace
        var tmp = $(html.match(regex) == null ?
            html.replace(">", ' type="' + type + '">') :
            html.replace(regex, 'type="' + type + '"') );
        //Copy data from old element
        tmp.data('type', x.data('type') );
        var events = x.data('events');
        var cb = function(events) {
            return function() {
                //Bind all prior events
                for(i in events)
                {
                    var y = events[i];
                    for(j in y)
                        tmp.bind(i, y[j].handler);
                }
            }
        }(events);
        x.replaceWith(tmp);
        setTimeout(cb, 10); //Wait a bit to call function
        return tmp;
    }
}

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
