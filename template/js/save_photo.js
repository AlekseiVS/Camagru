document.getElementById('save').addEventListener('click', function() {

    var photo = document.querySelector('.show_photo img').src;
    var img = "http://localhost:8080/template/image/picture.png";

    if(photo != img) {
        var xhr = new XMLHttpRequest();
        var data_photo = "photo=" + photo;

        xhr.open('POST', '/photo_save', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data_photo);

        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;
            alert(xhr.responseText);
        };
    }
    else
        alert("You did not make a photo!");

});