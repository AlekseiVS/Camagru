function showLike(id){
    var img_id = id;

    // console.log(id);
    // var count_like = document.getElementById('count_like_' + img_id).innerHTML;
    // console.log(count_like);
    // count_comments++;
    // document.getElementById('count_comments_' + img_id).innerHTML = count_comments;


    var xhr = new XMLHttpRequest();
    var data = "img_id=" + img_id;


    xhr.open('POST', '/like_save', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data);

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;


        // console.log(xhr.responseText);
        var res = JSON.parse(xhr.responseText);
        // if(count_like < res)
        // {
        //     document.getElementById(id).style.backgroundColor="red";
        // }
        document.getElementById('count_like_' + img_id).innerHTML = res;

        console.log(res);

    };


}