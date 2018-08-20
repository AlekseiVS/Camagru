<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_gallery">
           <div class="user_block">
               <div class="img">
                    <img src="" alt="">
               </div>
               <div class="like_comment_user_data">
                   <div class="like"><i class="far fa-thumbs-up"> 3</i></div>
                   <div id="icon_comment"><i class="far fa-comment"> 5</i></div>
                   <div class="user_name_time">
                       <div class="user_name"><i class="far fa-user"></i>Alex</div>
                       <div class="data_photo"><i class="far fa-file-image"></i>20.08.2018</div>
                   </div>
               </div>
               <div style="display: none" id="comments">
                   <div class="user_name_left_comment">Valentin:</div>
                   <div class="text_comments">
                       "But I must explain to you how all this mistaken idea"
                   </div>
                   <div class="close">close</div>
               </div>
           </div>
        </div>
    </main>
    <script src="../../template/js/gallery_like_comment.js"></script>
<?php include ROOT.'/views/layouts/footer.php'?>