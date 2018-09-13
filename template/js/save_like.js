function showLike(id){

    var img_id = id;

    var xhr = new XMLHttpRequest();
    var data = "img_id=" + img_id;

    xhr.open('POST', '/like_save', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data);

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;

        var res = JSON.parse(xhr.responseText);

        var count_like = document.getElementById('count_like_' + img_id);
        count_like.innerHTML = res;

        var btn_like = document.getElementById(img_id);

        if(btn_like.hasAttribute('style')){
            btn_like.removeAttribute('style');
        }
        else
            btn_like.style.backgroundColor='#FF473A';

    };


}