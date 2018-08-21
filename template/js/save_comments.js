// document.getElementsByClassName('save_comment')[0].addEventListener('click', checkEvent);


function checkEvent(form){
    // var text_comment2 = document.querySelector('.input_text_comments textarea').value;
    var comments = document.querySelector('.comments');

    var text_comment = form.comment.value;
    var img_id = form.id_img.value;

        // if(!text_comment)
    //     return ;
    // console.log(form.comment.value);
    // alert(text_comment);

    var xhr = new XMLHttpRequest();
    var data = "comment=" + text_comment + "&img_id=" + img_id;

    xhr.open('POST', '/comment_save', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data);

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;
        form.comment.value = "";
        var div = document.createElement('div');
        div.className = "comment";
        div.innerHTML = "<div class='user_name_left_comment'>" + xhr.responseText + ":</div>" +
            "<div id='text_comments'>" + xhr.responseText + "</div>";
        // div.innerHTML = xhr.responseText;
        comments.prepend(div);
        // comments.prependChild()
    };

}


