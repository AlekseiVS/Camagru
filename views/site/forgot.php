<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="reg_form">
            <div class="errors">
                <?php if($result){ ?>
                <div class="congratulations_header">Congratulations!</div>
                <div class="congratulations_text">Password sent to e-mail</div>
                <a href="http://localhost:8080/login"><button>Log in</button></a>
                <?php } else{
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
<!--                <input type="password" name="password" placeholder="Password" value="--><?php //echo $password; ?><!--"/>-->
                <input type="submit" name="submit"  value="Send"/>
<!--                <div class="have_account"><a href="#">Forgot password?</a></div>-->
            </form>
            <?php } ?>
        </div>

    </main>
<?php include ROOT.'/views/layouts/footer.php'?>