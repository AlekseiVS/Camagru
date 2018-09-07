document.getElementById('save').addEventListener('click', function() {
    var photo = document.querySelector('.show_photo img').src;

    var xhr = new XMLHttpRequest();
    var data_photo = "photo=" + photo;

    xhr.open('POST', '/photo_save', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data_photo) ;

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;
        // console.log(xhr.responseText);
        alert(xhr.responseText);
    };


});