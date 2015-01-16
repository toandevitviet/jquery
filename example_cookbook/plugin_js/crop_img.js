$(function(){
	var _selectedFile;
	$(document).on("change", "#selectedImage", function(){
		var reader = new FileReader();
		var files = $(this).prop("files");
		if (files.length > 0) {
			_selectedFile = files[0];
			reader.onload = function() {
				var image = new Image;
				image.src = this.result;
			if (image.width > 800 || image.height > 600) {
				alert("Image cannot be larger that 800x600");
			} else {
				$('.preview-msg').hide();
				$('#croppable-image').prop("src", this.
				result).fadeIn().imagecrop();
				}
			};
		reader.readAsDataURL(_selectedFile);
		}
	});

	$(document).on("click", ".upload-button", function(){
		var _selectedImage = $('#croppable-image');
		if (_selectedImage.data("selection-width") > 0 && _selectedImage.data("selection-height") > 0) {
			var data = new FormData();
			data.append("image", _selectedFile);
			data.append("selection-width", _selectedImage.
			data("selection-width"));
			data.append("selection-height", _selectedImage.
			data("selection-height"));
			data.append("selection-left", _selectedImage.
			data("selection-x"));
			data.append("selection-top", _selectedImage.
			data("selection-y"));
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "upload.php");
			xhr.onprogress = function(event) {
				var percent = (event.loaded / event.total * 100);
				$('.progress-bar .inner').width(percent + "%");
			}
			xhr.onload = function() {
				var response = JSON.parse(this.response);
				if (response.success == false) {
				alert(response.error);
				}
			}
		xhr.send(data);
		} else {
			alert("Please crop the image before upload");
		}
	});
});