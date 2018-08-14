(function() {
    var video = document.getElementById('video'),
        canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        photo = document.getElementById('photo'),
        overlay = document.querySelector('.overlay img').src;
        vendorUrl = window.URL || window.webkitURL;
    navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.
        mozGetUserMedia || navigator.msGetUserMedia;
    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error) {
        alert('Ошибка! Что-то пошло не так, попробуйте позже.');
    });
    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 400, 300);
        //ajax запрос приймет -> xhr.send(overlay и canvas.toDataURL('image/png')) -> вернет (код картинки)
        //-> потом передать в  photo.setAttribute('src', result);
        photo.setAttribute('src', canvas.toDataURL('image/png'));

        // Написать запрос Ajax; отправить на camera_make
    });
})();