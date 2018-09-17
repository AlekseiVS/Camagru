<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_cabinet">
            <?php include ROOT . '/views/site/cabinet_navigation.php' ?>
            <div class="content_change_data_user">
                <div class="errors">
                <?php
                    if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;
                ?>
                </div>
                <form action="#" method="post">
                    <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"/>
                    <input type="submit" name="submit"  value="Edit"/>
                </form>
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                    <input type="submit" name="submit"  value="Edit"/>
                </form>
                <form action="#" method="post">
                    <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                    <input type="submit" name="submit"  value="Edit"/>
                </form>
                <form action="#" method="post">
                    <div class="text_block_send_comments">Sending notification of comments!?</div>
                    <div class="form_radio">
                        <div class="radio"><input type="radio" name="message" value="0" <?php if($user['message'] == '0') { echo "checked"; } ?>/>- Yes</div>
                        <div class="radio"><input type="radio" name="message"  value="1" <?php if($user['message'] == '1') { echo "checked"; } ?>/>- No</div>
                        <div class="radio_send"><input type="submit" name="submit"  value="Edit"/></div>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include ROOT.'/views/layouts/footer.php'?>