$(window).on("load", function () {
  if($('*').is('#screenSpace')) {
      $('#screenSpace').height($(window).height());
  }
});

function fontColor(action, id) {
    if($('*').is('#menu')) {
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

    if($('*').is('#menuInner')) {
        if(action === 1) {
            $('#' + id).css("color", "#ff6030");
        } else {
            if($('#menuInner').css("background-color") === "rgb(255, 255, 255)" || $('#menuInner').css("background-color") === "#fff") {
                $('#' + id).css("color", "#000");
            } else {
                $('#' + id).css("color", "#fff");
            }
        }
    }
}

function scrollToTop() {
    $('html, body').animate({scrollTop: 0}, 500);
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scroll").style.display = "block";
    } else {
        document.getElementById("scroll").style.display = "none";
    }
}