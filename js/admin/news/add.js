/**
 * Created by jeyfost on 08.01.2018.
 */

function addNews() {
    var header = $('#headerInput').val();
	var description = $('#descriptionInput').val();
	var url = $('#urlInput').val();
	var text = document.getElementsByTagName("iframe")[0].contentDocument.getElementsByTagName("body")[0].innerHTML;
	var preview = $('#previewInput').val();
	var formData = new FormData($('#newsForm').get(0));
	formData.append("text", text);

	if(header !== '') {
		if(preview !== '') {
			if(description !== '') {
				if(url !== '') {
					if(text !== '' && text !== '<p><br></p>') {
						$.ajax({
							type: "POST",
							data: formData,
							dataType: "json",
							url: "/scripts/admin/news/ajaxAddNews.php",
							processData: false,
							contentType: false,
							success: function (response) {
								switch (response) {
									case "ok":
										$.notify("Новость была успешно добавлена.", "success");

										$('#headerInput').val('');
										$('#previewInput').val('');
										$('#descriptionInput').val('');
										$('#urlInput').val('');
										CKEDITOR.instances["textInput"].setData('');
										break;
									case "failed":
										$.notify("При добавлении новости произошла ошибка. Попробуйте снова.", "error");
										break;
									case "url":
										$.notify("Введённая вами ссылка на новость уже существует. Придумайте другую.", "error");
										break;
									case "number":
										$.notify("Ссылка на новость не может содержать одни цифры.", "error");
										break;
									case "preview":
										$.notify("Вы выбрали превью недопустимого формата.", "error");
										break;
									default:
										$.notify(response, "warn");
										break;
								}
                            }
						});
					} else {
						$.notify("Вы не добавили текст новости.", "error");
					}
				} else {
					$.notify("Вы не добавили ссылку на новость.", "error");
				}
			} else {
				$.notify("Вы не добавили краткое описание новости.", "error");
			}
		} else {
			$.notify("Вы не добавили превью новости.", "error");
		}
	} else {
		$.notify("Вы не добавили заголовок новости.", "error");
	}
}