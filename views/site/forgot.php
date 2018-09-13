<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="reg_form">
            <div class="errors">
                <?php if($result){ ?>
                <div class="congratulations_header">Congratulations!</div>
                <div class="congratulations_text">To change data, click on the link that we sent to you by email adress!</div>
                <?php }
                else{
                if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error?></li>
                        <?php endforeach; ?>
                    </ul>

                <?php endif;?>
            </div>
            <div class="slogan">
                YOUR</br>
                PHOTO</br>
                ART</br>
            </div>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                <input type="submit" name="submit"  value="Change data"/>
            </form>
            <?php } ?>
        </div>

    </main>
<?php include ROOT.'/views/layouts/footer.php'?>