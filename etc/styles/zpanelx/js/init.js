$(document).ready(function(){

  // Pretty Checkable @ https://github.com/arthurgouveia/prettyCheckable
  $('input:checkbox').prettyCheckable({
    color: 'green',
    customClass: 'maincheckbox'
  });
  $('input:radio').prettyCheckable({
    color: 'green',
    customClass: 'mainradio'
  });

  /// Anti ClickJacking protection!
  if (self === top) {
    var antiClickjack = document.getElementById("antiClickjack");
      antiClickjack.parentNode.removeChild(antiClickjack);
  } else {
    top.location = self.location;
  }

  // Remember Collapsed Module Link Containers On Main Page
  var c = document.cookie;
  $('.block-body').each(function () {
    if (this.id) {
      var pos = c.indexOf(this.id + "_collapse_in=");
      if (pos > -1) {
        c.substr(pos).split('=')[1].indexOf('false') ? $(this).addClass('in') : $(this).removeClass('in');
      }
    }
  }).on('hidden shown', function () {
    if (this.id) {
      document.cookie = this.id + "_collapse_in=" + $(this).hasClass('in');
    }
  });

  // Alert Div Does Nasty Little Flash Before Load Unless We Hax It Here
  $("#zannounce").addClass('in');

  // Modal Doesn't Center Correctly On Visible Screen So We Hax It Here
  $('#button,.load-button').closest('form').submit(function() { 
    $('#zloader_overlay').hide().css({
      top  : ($(window).height()) /2 + 'px', 
      left : ($(window).width() - 200) /2 + 'px' 
    });
    $('#zloader_overlay').show().modal({
      backdrop: true,
      keyboard: false
    });
  });

  // Bootstrap Tooltips Don't Intialize Themselves Nor Do They Layer Properly So We Set Container Body
  $("div.linkicons,.tooltipme,[rel='tooltip']").tooltip({
    'container': 'body'
  });

  // This Keeps The Client Notice Hidden For X Days After Closing
  $('#notice-close').click(function(e){
    e.preventDefault();
    //Set The Expiration Here
    $.cookie('notice-alert', 'closed', {expires:7});
  });
  if($.cookie('notice-alert') === 'closed'){
    $('.client-notice').hide();
  }

  //Add Logout For Top Nav
  $("#topnav").append('<li><a tabindex="-1" href="?logout"><img src="modules/password_assistant/assets/icon.png" width="20" height="20" border="0">&nbsp;Logout</a></li>');
  
  //Add Logout For Mobile Nav
  $("#account_information").append('<li><a tabindex="-1" href="?logout"><img src="modules/password_assistant/assets/icon.png" width="20" height="20" border="0">&nbsp;Logout</a></li>');

  // Clicking Labels Focus On Empty Text Fields & Select Populated Text Fields
  $('label').each(function() {
    $(this).click(function() {
      $(this).next('.controls').find('input, textarea').select();
    });
  });

  //HTML5 Form Validaion in IE and Older Browsers
  $('form').h5Validate();

});