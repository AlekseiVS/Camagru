window.onload = function(){

    var array_class = document.getElementsByClassName('like');
    var i = 0;
    var j = 0;
    var sData = [];

    while(array_class[i]) {
        // console.log(array_class[i].id);
        sData += "id"+j+"=" + array_class[i].id + "&";
        i++;
        j++;
    }

        var xhr = new XMLHttpRequest();
        var data = sData;

        xhr.open('POST', '/like_color', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);

        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;

            if(xhr.responseText != 'error'){
                var res = JSON.parse(xhr.responseText);

                var i = 0;
                while (res[i]) {
                    document.getElementById(res[i]).style.backgroundColor = '#FF473A';
                    i++;
                }
            }
        }

};

