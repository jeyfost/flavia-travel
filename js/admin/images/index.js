function edit() {
    var firstPhoto = $('#firstSlide').val();
    var secondPhoto = $('#secondSlide').val();
    var thirdPhoto = $('#thirdSlide').val();
    var formData = new FormData($('#imagesForm').get(0));

    if(firstPhoto !== '' || secondPhoto !== '' || thirdPhoto !== '') {
        $.ajax({
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            url: "/scripts/admin/images/ajaxEditImages.php",
            success: function(response) {
                switch (response) {
                    case "ok":
                        $.notify("Фотографии были успешно изменены.", "success");

                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                        break;
                    case "first":
                        $.notify("Первая фотография имеет недопустимый формат.", "error");
                        break;
                    case "second":
                        $.notify("Вторая фотография имеет недопустимый формат.", "error");
                        break;
                    case "third":
                        $.notify("Третья фотография имеет недопустимый формат.", "error");
                        break;
                    default:
                        $.notify(response, "warn");
                        break;
                }
            }
        });
    } else {
        $.notify("Вы не выбрали ни одной новой фотографии.", "error");
    }
}