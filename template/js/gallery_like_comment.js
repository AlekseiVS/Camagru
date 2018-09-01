
// document.getElementsByClassName('icon_comment')[0].addEventListener('click', checkEvent);
//
// function checkEvent(){
//     console.log('in check');
//     var commentsStyle = getComputedStyle(document.getElementsByClassName('comments_block')[0]);
//     console.log(commentsStyle.display);
//     if(commentsStyle.display === 'none'){
//         console.log('in none');
//             document.getElementsByClassName('comments_block')[0].style.display='block';
//     }
//     else if(commentsStyle.display === 'block'){
//         console.log('in block');
//             document.getElementsByClassName('comments_block')[0].style.display = 'none';
//     }
// }

function showCommentArea(id){
    // console.log('in id ===', id);
    // console.log('comments_block_' + id);
    var commentsStyle = getComputedStyle(document.getElementById('comments_block_' + id));
    // console.log(commentsStyle.display);
    if(commentsStyle.display === 'none'){
        // console.log('in none');
        document.getElementById('comments_block_' + id).style.display='block';
    }
    else if(commentsStyle.display === 'block'){
        // console.log('in block');
        document.getElementById('comments_block_' + id).style.display = 'none';
    }
}
