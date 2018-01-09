/**
 * Created by jeyfost on 28.12.2017.
 */

$(window).on("load", function () {
    if($('#footer').offset().top < parseInt($(document).height() - $('#footer').height())) {
        $('#footer').offset({top: $(document).height()});
    }

    if($('*').is('#fullNewsDescription')) {
        if($(window).width() >= 768) {
            var w = parseInt($(window).width() * 0.94);
            $('.fullNewsDescription').width(parseInt(w - $('.fullNewsPreview').width() - 10));
        }
    }

    $('')
});

$(window).on("resize", function () {
    if($('*').is('#fullNewsDescription')) {
        if($(window).width() >= 768) {
            var w = parseInt($(window).width() * 0.94);
            $('.fullNewsDescription').width(parseInt(w - $('.fullNewsPreview').width() - 10));
        }
    }
});

$(window).on("scroll", function () {
   if($(window).scrollTop() > 10) {
       $('#menuInner').css("background-color", "#fff");
       $('#menuInner').height(60);
       $('#logoIMG').width(50);
       $('#logoIMG').height(50);
       document.getElementById("logoIMG").src = "/img/system/logoPurple.png";

       $('#mpContacts').css("color", "#282828");
       $('#mpPhone').css("color", "#282828");
       $('#mpEmail').css("color", "#282828");

       $('#mpContacts').css("border-right", "1px solid #282828");
       $('#mpNews').css("border-right", "1px solid #282828");
       $('#mpPhone').css("border-right", "1px solid #282828");

       $('#mpNews').css("margin-top", "20px");
       $('#mpContacts').css("margin-top", "20px");
       $('#mpPhone').css("margin-top", "20px");
       $('#mpEmail').css("margin-top", "20px");
   } else {
       $('#menuInner').css("background-color", "#191919");
       $('#menuInner').height(70);
       $('#logoIMG').width(60);
       $('#logoIMG').height(60);
       document.getElementById("logoIMG").src = "/img/system/logoWhite.png";

       $('#mpContacts').css("color", "#fff");
       $('#mpPhone').css("color", "#fff");
       $('#mpEmail').css("color", "#fff");

       $('#mpContacts').css("border-right", "1px solid #fff");
       $('#mpNews').css("border-right", "1px solid #fff");
       $('#mpPhone').css("border-right", "1px solid #fff");

       $('#mpNews').css("margin-top", "25px");
       $('#mpContacts').css("margin-top", "25px");
       $('#mpPhone').css("margin-top", "25px");
       $('#mpEmail').css("margin-top", "25px");
   }
});

function newsButtonColor(id, color, action) {
    if(action === 1) {
        $('#' + id).css("background-color", "#" + color);
        $('#' + id).css("color", "#fff");
    } else {
        $('#' + id).css("background-color", "transparent");
        $('#' + id).css("color", "#191919");
    }
}

function pageBlock(action, block, text) {
	if(action === 1) {
		document.getElementById(block).style.backgroundColor = "#4d009a";
		document.getElementById(text).style.color = "#fff";
	} else {
		document.getElementById(block).style.backgroundColor = "transparent";
		document.getElementById(text).style.color = "#4d009a";
	}
}