// console.log(document.getElementById('comments').style.display = 'none');
// alert(document.getElementById('comments').style.display)

// if(document.getElementById('comments').style.display === 'none'){
//     document.getElementById('icon_comment').addEventListener('click', function() {
//         document.getElementById('comments').style.display='block';});
// }
// else if(document.getElementById('comments').style.display === 'block'){
//     document.getElementById('icon_comment').addEventListener('click', function () {
//         document.getElementById('comments').style.display = 'none';
//     });
// }


document.getElementsByClassName('icon_comment')[0].addEventListener('click', checkEvent);

function checkEvent(){
    console.log('in check');
    var commentsStyle = getComputedStyle(document.getElementsByClassName('comments_block')[0]);
    console.log(commentsStyle.display);
    if(commentsStyle.display === 'none'){
        console.log('in none');
            document.getElementsByClassName('comments_block')[0].style.display='block';
    }
    else if(commentsStyle.display === 'block'){
        console.log('in block');
            document.getElementsByClassName('comments_block')[0].style.display = 'none';
    }
}

