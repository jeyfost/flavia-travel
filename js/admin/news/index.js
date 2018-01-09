/**
 * Created by jeyfost on 05.01.2018.
 */

function loadGalleryText(id) {
	$.ajax({
		type: "POST",
		data: {"id": id},
		url: "/scripts/admin/news/ajaxLoadNewsText.php",
		success: function (response) {
			CKEDITOR.instances["textInput"].setData(response);
		}
	});
}

function editNews() {
	var header = $('#headerInput').val();
	var description = $('#descriptionInput').val();
	var url = $('#urlInput').val();
	var text = document.getElementsByTagName("iframe")[0].contentDocument.getElementsByTagName("body")[0].innerHTML;
	var formData = new FormData($('#newsForm').get(0));
	formData.append("text", text);

	if(header !== '') {
		if(description !== '') {
			if(url !== '') {
				if(text !== '' && text !== '<p><br></p>') {
					$.ajax({
						type: "POST",
						data: formData,
						processData: false,
						contentType: false,
						dataType: "json",
						url: "/scripts/admin/news/ajaxEditNews.php",
						success: function (response) {
							switch (response) {
								case "ok":
									$.notify("Новость была успешно добавлена!", "success");
									break;
								case "failed":
									$.notify("При добавлении новости произошла ошибка. Попробуйте снова.", "error");
									break;
								case "preview":
									$.notify("Вы выбрали для превью файл недопустимого формата.", "error");
									break;
								case "upload":
									$.notify("Произошла ошибка при загрузке превью. Попробуйте снова.", "error");
									break;
								case "url":
									$.notify("Такой ссылка на новость уже существует в базе данных сайта. Придумайте другую.", "error");
									break;
								default:
									$.notify(response, "warn");
									break;
							}
                        }
					});
				} else {
					$.notify("Вы не ввели текст новости.", "error");
				}
			} else {
				$.notify("Вы не ввели ссылку на новость.", "error")
			}
		} else {
			$.notify("Вы не ввели краткое описание новости.", "error");
		}
	} else {
		$.notify("Вы не ввели заголовок новости.", "error");
	}
}

function deleteNews() {
	var id = $('#newsSelect').val();

	if(confirm("Вы действительно хотите удалить эту новость?")) {
		$.ajax({
			type: "POST",
			data: {"id": id},
			url: "/scripts/admin/news/ajaxDeleteNews.php",
			success: function (response) {
				switch (response) {
					case "ok":
						$.notify("Новость была успешно удалена.", "success");

						setTimeout(function () {
							window.location.href = "/admin/news/"
                        }, 2000);
						break;
					case "failed":
						$.notify("При удалении новости произошла ошибка. Попробуйте снова.", "error");
						break;
					case "id":
						$.notify("Новости с таким ID не существует.", "error");
						break;
					default:
						$.notify(response, "warn");
						break;
				}
            }
		});
	}
}