<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_cabinet">
            <?php include ROOT . '/views/site/cabinet_navigation.php' ?>
<!--            <div class="navigation">-->
<!--                <a href="/camera"><i class="fas fa-camera"></i><div class="nav_block">Camera</div></a>-->
<!--                <a href="/change_user_data"><i class="fas fa-database"></i><div class="nav_block">User data</div></a>-->
<!--                <a href="/gallery_user"><i class="far fa-image"></i><div class="nav_block">User photo</div></a>-->
<!--            </div>-->
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

            </div>
        </div>
    </main>
<?php include ROOT.'/views/layouts/footer.php'?>