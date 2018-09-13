
function showCommentArea(id){
    var commentsStyle = getComputedStyle(document.getElementById('comments_block_' + id));
    if(commentsStyle.display === 'none'){
        document.getElementById('comments_block_' + id).style.display='block';
    }
    else if(commentsStyle.display === 'block'){
        document.getElementById('comments_block_' + id).style.display = 'none';
    }
}

