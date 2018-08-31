<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_gallery">
            <?php foreach ($result1 as $data): ?>
                <div class="user_block">
                    <div class="user_name_time">

                        <div class="user_name"><i class="far fa-user"></i><?php echo $data['name'];?></div>

                        <div class="data_photo"><i class="far fa-calendar-check"></i><?php echo $data['date'];?></div>
                    </div>
                    <div class="img">
                        <img src="<?php echo $data['src_img'];?>" alt="">
                    </div>
                    <div class="like_comment">
                        <div class="like"><i class="far fa-thumbs-up"></i>3</div>
                        <div class="icon_comment" id="<?php echo $data['id_img'];?>" onclick="showCommentArea(this.id)"><i class="far fa-comment"></i>5</div>
                    </div>
                    <div class="comments_block" id="comments_block_<?php echo $data['id_img'];?>" >
                        <form method="POST" onsubmit="checkEvent(this); return false;">
                            <div class="input_text_comments">
                                <input name="comment" id="comment" placeholder="Enter the text comment!"></p>
                            </div>
                            <input type="hidden" name="id_img" value="<?php echo $data['id_img'];?>">
                            <button class="save_comment" type="submit" value="leave your comment">leave your comment</button>
                        </form>
                        <div class="comments"  id="comments_<?php echo $data['id_img'];?>">
<!--                            --><?php //print_r($result2);?>
                            <?php foreach ($result2 as $data2) :?>
<!--                                --><?php //print_r($data2);?>
                                <?php foreach ($data2 as $data3) : ?>
<!--                                    --><?php //print_r($data3);?>
                                    <?php if ($data3['id_img'] === $data['id_img']) : ?>
                                        <div class="comment">
                                            <div class="user_name_left_comment" ><?php echo $data3['user_name']?></div>
                                            <div id="text_comments"><?php echo $data3['comment']?></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <script src="../../template/js/gallery_like_comment.js"></script>
    <script src="../../template/js/save_comments.js"></script>
<?php include ROOT.'/views/layouts/footer.php'?>