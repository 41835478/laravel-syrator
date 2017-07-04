function SyUpload () {

	this.sendPicture = function(uploadOptions) {
//		console.log(uploadOptions);
        var resultFile = document.getElementById(uploadOptions.fileInputId).files[0];
		var formData = new FormData();
		formData.append("picture",resultFile,resultFile.name);
		var options = {
	        type: 'post',
			url:'/api/upload/single',
	        dataType: 'json',
	        processData: false,
	        contentType: false,
	        data: formData,
	        timeout: 3000,
	        success: function (data) {
	        	if (uploadOptions.onFileUploadComplete) {
	        		uploadOptions.onFileUploadComplete(data);
	        	}
	        },
	        error: function(){
	        	if (uploadOptions.onFileUploadError) {
	        		uploadOptions.onFileUploadError("未知错误");
	        	}
	        }
	    };
	    $.ajax(options);
    }
};

function ImagesUploader (divImageList) {
	this.syDoc = new SyDocument();
	
	var imageIndexIdNum = 0;
	
	var ui = {
		imageList: this.syDoc.get(divImageList)
	};

	// 初始化界面
	this.init = function() {
		ui.clearForm = function() {
			ui.imageList.innerHTML = '';
			ui.newPlaceholder();
		};
		ui.getFileInputArray = function() {
			return [].slice.call(ui.imageList.querySelectorAll('input[type="file"]'));
		};
		ui.getFileInputIdArray = function() {
			var fileInputArray = ui.getFileInputArray();
			var idArray = [];
			fileInputArray.forEach(function(fileInput) {
				if (fileInput.value != '') {
					idArray.push(fileInput.getAttribute('id'));
				}
			});
			return idArray;
		};
		ui.newPlaceholder = function() {
			var fileInputArray = ui.getFileInputArray();
			if (fileInputArray &&
				fileInputArray.length > 0 &&
				fileInputArray[fileInputArray.length - 1].parentNode.classList.contains('space')) {
				return;
			}
			imageIndexIdNum++;
			var placeholder = document.createElement('div');
			placeholder.setAttribute('class', 'image-item space');
			var closeButton = document.createElement('div');
			closeButton.setAttribute('class', 'image-close');
			closeButton.innerHTML = 'X';
			closeButton.addEventListener('click', function(event) {
				event.stopPropagation();
				event.cancelBubble = true;
				setTimeout(function() {
					ui.imageList.removeChild(placeholder);
				}, 0);
				return false;
			}, false);
			var fileInput = document.createElement('input');
			fileInput.setAttribute('type', 'file');
			fileInput.setAttribute('accept', 'image/*');
			fileInput.setAttribute('id', 'image-' + imageIndexIdNum);
			fileInput.addEventListener('change', function(event) {
				var file = fileInput.files[0];
				if (file) {
					var reader = new FileReader();
					reader.onload = function() {
						//处理 android 4.1 兼容问题
						var base64 = reader.result.split(',')[1];
						var dataUrl = 'data:image/png;base64,' + base64;
						placeholder.style.backgroundImage = 'url(' + dataUrl + ')';
					}
					reader.readAsDataURL(file);
					placeholder.classList.remove('space');
					ui.newPlaceholder();
				}
			}, false);
			placeholder.appendChild(closeButton);
			placeholder.appendChild(fileInput);
			ui.imageList.appendChild(placeholder);
		};
		ui.newPlaceholder();
	};

	// 上传图片
	this.uploadImages = function(callbackSuccess,callbackFail) {
		var images = ui.getFileInputIdArray();
		var objUploader = new SyUpload();
		var filePaths = "";
		var sendImageCount = 0;
		var hasError = false;
		if (images.length<=0) {
			if (callbackSuccess) {
				callbackSuccess(filePaths);
			}
		}
		
		images.forEach(function(fileInputId) {
			objUploader.sendPicture({
				fileInputId: fileInputId,
				onFileUploadError: function(error) {
					alert(error);
					hasError = true;
				},
				onFileUploadComplete: function(data) {
					//处理图片上传成功，如本地消息显示
					if (data.code==200) {				
						sendImageCount++;
						filePaths = filePaths + data.data.uploaded_full_file_name + ";";
						if (!hasError && sendImageCount >= images.length) {
							if (callbackSuccess) {
//								ui.clearForm();
								callbackSuccess(filePaths);
							}
						}			
					} else {
						hasError = true;callbackFail;
						if (callbackFail) {
//							ui.clearForm();
							callbackFail(data.description);
						}
					}
				}
			});
		});
	};
};