<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_gallery">
            <?php foreach ($res as $data_img_usr): ?>
           <div class="user_block">
               <div class="user_name_time">

                   <div class="user_name"><i class="far fa-user"></i><?php echo $data_img_usr['name']?></div>

                   <div class="data_photo"><i class="far fa-calendar-check"></i><?php echo $data_img_usr['data']?></div>
               </div>
               <div class="img">
                    <img src="<?php echo $data_img_usr['src_img']?>" alt="">
               </div>
               <div class="like_comment">
                   <div class="like"><i class="far fa-thumbs-up"></i>3</div>
                   <div class="icon_comment"><i class="far fa-comment"></i>5</div>
               </div>
               <div class="comments_block">
                   <form method="POST" onsubmit="checkEvent(this); return false;">
                       <div class="input_text_comments">
                           <input name="comment" id="comment" placeholder="Enter the text comment!"></p>
                       </div>
                       <input type="hidden" name="id_img" value="<? //echo $id_img; ?>">
                       <button class="save_comment" type="submit" value="leave your comment">leave your comment</button>
                   </form>
                   <div class="comments">
                       <div class="comment">
                           <div class="user_name_left_comment"><?php//echo user['name']?></div>
                           <div id="text_comments"><?php// echo user['name']?></div>
                       </div>
                   </div>
               </div>
           </div>
            <?php endforeach; ?>
        </div>
    </main>
    <script src="../../template/js/gallery_like_comment.js"></script>
    <script src="../../template/js/save_comments.js"></script>
<?php include ROOT.'/views/layouts/footer.php'?>