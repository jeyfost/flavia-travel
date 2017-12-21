var menuFontColor;

$(window).on("load", function () {
  if($('*').is('#screenSpace')) {
      $('#screenSpace').height($(window).height());
  }
});

$(window).on("scroll", function () {
   if($(window).scrollTop() > 10) {
       $('#menu').css("background-color", "#fff");
       $('#menu').height(60);
       $('#logoIMG').width(50);
       $('#logoIMG').height(50);
       document.getElementById("logoIMG").src = "/img/system/logoPurple.png";

       $('#mpNews').css("color", "#000");
       $('#mpContacts').css("color", "#000");
       $('#mpPhone').css("color", "#000");
       $('#mpEmail').css("color", "#000");

       $('#mpNews').css("border-right", "1px solid #000");
       $('#mpContacts').css("border-right", "1px solid #000");
       $('#mpPhone').css("border-right", "1px solid #000");

       $('#mpNews').css("margin-top", "20px");
       $('#mpContacts').css("margin-top", "20px");
       $('#mpPhone').css("margin-top", "20px");
       $('#mpEmail').css("margin-top", "20px");
   } else {
       $('#menu').css("background-color", "transparent");
       $('#menu').height(70);
       $('#logoIMG').width(60);
       $('#logoIMG').height(60);
       document.getElementById("logoIMG").src = "/img/system/logoWhite.png";

       $('#mpNews').css("color", "#fff");
       $('#mpContacts').css("color", "#fff");
       $('#mpPhone').css("color", "#fff");
       $('#mpEmail').css("color", "#fff");

       $('#mpNews').css("border-right", "1px solid #fff");
       $('#mpContacts').css("border-right", "1px solid #fff");
       $('#mpPhone').css("border-right", "1px solid #fff");

       $('#mpNews').css("margin-top", "25px");
       $('#mpContacts').css("margin-top", "25px");
       $('#mpPhone').css("margin-top", "25px");
       $('#mpEmail').css("margin-top", "25px");
   }
});

function fontColor(action, id) {
    if(action === 1) {
        $('#' + id).css("color", "#ff6030");
    } else {
        if($('#menu').css("background-color") === "rgb(255, 255, 255)" || $('#menu').css("background-color") === "#fff") {
            $('#' + id).css("color", "#000");
        } else {
            $('#' + id).css("color", "#fff");
        }
    }
}