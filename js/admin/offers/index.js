/**
 * Created by jeyfost on 10.01.2018.
 */

function loadOfferText(id) {
	$.ajax({
		type: "POST",
		data: {"id": id},
		url: "/scripts/admin/offers/ajaxLoadOfferText.php",
		success: function (response) {
			CKEDITOR.instances["textInput"].setData(response);
		}
	});
}

function editOffer() {
	var header = $('#headerInput').val();
	var description = $('#descriptionInput').val();
	var url = $('#urlInput').val();
	var text = document.getElementsByTagName("iframe")[0].contentDocument.getElementsByTagName("body")[0].innerHTML;
	var formData = new FormData($('#offerForm').get(0));
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
						url: "/scripts/admin/offers/ajaxEditOffer.php",
						success: function (response) {
							switch (response) {
								case "ok":
									$.notify("Горящее предложение было успешно добавлено!", "success");
									break;
								case "failed":
									$.notify("При добавлении горящего предложения произошла ошибка. Попробуйте снова.", "error");
									break;
								case "preview":
									$.notify("Вы выбрали для превью файл недопустимого формата.", "error");
									break;
								case "upload":
									$.notify("Произошла ошибка при загрузке превью. Попробуйте снова.", "error");
									break;
								case "url":
									$.notify("Такая ссылка на горящее предложение уже существует в базе данных сайта. Придумайте другую.", "error");
									break;
								case "number":
									$.notify("Ссылка на горящее предложение не может содержать одни цифры.", "error");
									break;
								default:
									$.notify(response, "warn");
									break;
							}
                        }
					});
				} else {
					$.notify("Вы не ввели текст горящего предложения.", "error");
				}
			} else {
				$.notify("Вы не ввели ссылку на горящего предложения.", "error")
			}
		} else {
			$.notify("Вы не ввели краткое описание горящего предложения.", "error");
		}
	} else {
		$.notify("Вы не ввели заголовок горящего предложения.", "error");
	}
}

function deleteOffer() {
	var id = $('#offerSelect').val();

	if(confirm("Вы действительно хотите удалить это горящее предложение?")) {
		$.ajax({
			type: "POST",
			data: {"id": id},
			url: "/scripts/admin/offers/ajaxDeleteOffer.php",
			success: function (response) {
				switch (response) {
					case "ok":
						$.notify("Горящее предложение было успешно удалено.", "success");

						setTimeout(function () {
							window.location.href = "/admin/offers/"
                        }, 2000);
						break;
					case "failed":
						$.notify("При удалении горящего предложения произошла ошибка. Попробуйте снова.", "error");
						break;
					case "id":
						$.notify("Горящего предложения с таким ID не существует.", "error");
						break;
					default:
						$.notify(response, "warn");
						break;
				}
            }
		});
	}
}