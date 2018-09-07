function delBlockPhoto(id) {

    var img_id = id.substring(3, 1000);
    console.log(img_id);

    var xhr = new XMLHttpRequest();
    var data = "img_id=" + img_id;


    xhr.open('POST', '/del_user_photo_block', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data);

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) return;

        var id = 'del' + xhr.responseText;
        console.log(id);

        var elem = document.getElementById(id);
        elem.parentNode.parentNode.removeChild(elem.parentNode);

    }
}