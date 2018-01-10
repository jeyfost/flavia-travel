/**
 * Created by jeyfost on 10.01.2018.
 */

function addOffer() {
    var header = $('#headerInput').val();
	var description = $('#descriptionInput').val();
	var url = $('#urlInput').val();
	var text = document.getElementsByTagName("iframe")[0].contentDocument.getElementsByTagName("body")[0].innerHTML;
	var preview = $('#previewInput').val();
	var formData = new FormData($('#offerForm').get(0));
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
							url: "/scripts/admin/offers/ajaxAddOffer.php",
							processData: false,
							contentType: false,
							success: function (response) {
								switch (response) {
									case "ok":
										$.notify("Горящее предложение было успешно добавлено.", "success");

										$('#headerInput').val('');
										$('#previewInput').val('');
										$('#descriptionInput').val('');
										$('#urlInput').val('');
										CKEDITOR.instances["textInput"].setData('');
										break;
									case "failed":
										$.notify("При добавлении горящего предложения произошла ошибка. Попробуйте снова.", "error");
										break;
									case "url":
										$.notify("Введённая вами ссылка на горящее предложение уже существует. Придумайте другую.", "error");
										break;
									case "number":
										$.notify("Ссылка на горящее предложение не может содержать одни цифры.", "error");
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
						$.notify("Вы не добавили текст горящего предложения.", "error");
					}
				} else {
					$.notify("Вы не добавили ссылку на горящее предложение.", "error");
				}
			} else {
				$.notify("Вы не добавили краткое описание горящего предложения.", "error");
			}
		} else {
			$.notify("Вы не добавили превью горящего предложения.", "error");
		}
	} else {
		$.notify("Вы не добавили заголовок горящего предложения.", "error");
	}
}