<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camagru</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link href="../../template/css/main.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="logo">Camagru</div>
    <div class="log_reg">
        <ul>
            <?php if (isset($_SESSION['userId'])){?>
                <a href="/gallery"><li><i class="far fa-images"></i>gallery</li></a>
                <a href="/cabinet"><li><i class="fas fa-user"></i><?php echo $user['name']; ?></li></a>
                <a href="/logout"><li><i class="fas fa-sign-out-alt"></i>logout</li></a>
            <?php } else if(!isset($_SESSION['userId'])){ ?>
                <a href="/gallery"><li><i class="far fa-images"></i>gallery</li></a>
                <a href="http://localhost:8080/login"><li><i class="fas fa-sign-in-alt"></i>login</li></a>
                <a href="http://localhost:8080"><li><i class="fas fa-user"></i>registr</li></a>
            <?php }?>
        </ul>
    </div>
</header>
    <main>
        <div class="reg_form">
            <div class="errors">
                    <div class="congratulations_header">404 Errors!</div>
                    <div class="congratulations_text">This page doesn't exist.</div>
            </div>
        </div>
    </main>
<?php include ROOT.'/views/layouts/footer.php'?>