
function checkEvent(form){

    var text_comment = form.comment.value;
    var img_id = form.id_img.value;
    var comments = document.getElementById('comments_' + img_id);


    var count_comments = document.getElementById('count_comments_' + img_id).innerHTML;
    count_comments++;
    document.getElementById('count_comments_' + img_id).innerHTML = count_comments;

    //count_likes


    var xhr = new XMLHttpRequest();
    var data = "comment=" + text_comment + "&img_id=" + img_id;

    xhr.open('POST', '/comment_save', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data);

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;

        form.comment.value = "";
        // console.log(xhr.responseText);
        var res = JSON.parse(xhr.responseText);
        // console.log(res);
        var div = document.createElement('div');
        div.className = "comment";
        div.innerHTML = "<div class='user_name_left_comment'>" + res.name + ":</div>" +
            "<div id='text_comments'>" + res.comment + "</div>";
        comments.prepend(div);
    };

}


