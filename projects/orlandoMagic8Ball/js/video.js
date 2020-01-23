var video = document.querySelector('video')
	, container = document.querySelector('#container');

var setVideoDimensions = function () {
	var w = video.videoWidth
		, h = video.videoHeight;


	var videoRatio = (w / h).toFixed(2);


	var containerStyles = window.getComputedStyle(container)
		, minW = parseInt(containerStyles.getPropertyValue('width'))
		, minH = parseInt(containerStyles.getPropertyValue('height'));


	var widthRatio = minW / w
		, heightRatio = minH / h;


	if (widthRatio > heightRatio) {
		var newWidth = minW;
		var newHeight = Math.ceil(newWidth / videoRatio);
	}
	else {
		var newHeight = minH;
		var newWidth = Math.ceil(newHeight * videoRatio);
	}

	video.style.width = newWidth + 'px';
	video.style.height = newHeight + 'px';
};

video.addEventListener('loadedmetadata', setVideoDimensions, false);
window.addEventListener('resize', setVideoDimensions, false);