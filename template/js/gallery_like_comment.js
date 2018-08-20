// console.log(document.getElementById('comments').style.display = 'none');
// alert(document.getElementById('comments').style.display)

// if(document.getElementById('comments').style.display === 'none'){
//     document.getElementById('icon_comment').addEventListener('click', function() {
//         document.getElementById('comments').style.display='block';});
// }
// if(document.getElementById('comments').style.display === 'block'){
//     document.getElementById('icon_comment').addEventListener('click', function () {
//         document.getElementById('comments').style.display = 'none';
//     });
// }


document.getElementById('icon_comment').addEventListener('click', checkEvent);

function checkEvent(){
    console.log('in check');
    var commentsStyle = getComputedStyle(document.getElementById('comments'));
    console.log(commentsStyle.display);
    if(commentsStyle.display === 'none'){
        console.log('in none');
            document.getElementById('comments').style.display='block';
    }
    else if(commentsStyle.display === 'block'){
        console.log('in block');
            document.getElementById('comments').style.display = 'none';
    }
}

