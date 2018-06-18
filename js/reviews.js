$(window).on("scroll", function () {
    if($(window).scrollTop() > 10) {
        $('#menuInner').css("background-color", "#fff");
        $('#menuInner').height(60);
        $('#logoIMG').width(50);
        $('#logoIMG').height(50);
        document.getElementById("logoIMG").src = "/img/system/logoPurple.png";

        $('#mpNews').css("color", "#282828");
        $('#mpContacts').css("color", "#282828");
        $('#mpPhone').css("color", "#282828");
        $('#mpEmail').css("color", "#282828");

        $('#mpNews').css("border-right", "1px solid #282828");
        $('#mpContacts').css("border-right", "1px solid #282828");
        $('#mpReviews').css("border-right", "1px solid #282828");
        $('#mpPhone').css("border-right", "1px solid #282828");

        $('#mpNews').css("margin-top", "20px");
        $('#mpContacts').css("margin-top", "20px");
        $('#mpReviews').css("margin-top", "20px");
        $('#mpPhone').css("margin-top", "20px");
        $('#mpEmail').css("margin-top", "20px");
    } else {
        $('#menuInner').css("background-color", "#191919");
        $('#menuInner').height(70);
        $('#logoIMG').width(60);
        $('#logoIMG').height(60);
        document.getElementById("logoIMG").src = "/img/system/logoWhite.png";

        $('#mpNews').css("color", "#fff");
        $('#mpContacts').css("color", "#fff");
        $('#mpPhone').css("color", "#fff");
        $('#mpEmail').css("color", "#fff");

        $('#mpNews').css("border-right", "1px solid #fff");
        $('#mpContacts').css("border-right", "1px solid #fff");
        $('#mpReviews').css("border-right", "1px solid #fff");
        $('#mpPhone').css("border-right", "1px solid #fff");

        $('#mpNews').css("margin-top", "25px");
        $('#mpContacts').css("margin-top", "25px");
        $('#mpReviews').css("margin-top", "25px");
        $('#mpPhone').css("margin-top", "25px");
        $('#mpEmail').css("margin-top", "25px");
    }
});