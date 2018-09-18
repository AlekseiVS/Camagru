<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_cabinet">
            <?php include ROOT . '/views/site/cabinet_navigation.php' ?>
            <div class="photo_bottom">
                <a href="#">
                    <button id="do_with_camera">do with camera</button></a>
                <a href="#">
                    <button id="upload_photo">
                        <div class="up">
                            <div class="#">upload photo</div>
                            <input type="file"  name="fileToUpload" id="fileToUpload" accept="image/png">
                        </div>
                    </button>
                </a>
                <a href="#"><button id="save">save</button></a>
                <a href="#"><button id="remove">remove</button></a>
            </div>
            <div class="content_camera">
                <div class="make_photo">
                    <video id="video" width="400" height="300" autoplay></video>
                    <div class="upload_photo_preview"></div>
                    <div class="overlay"><img src="../../template/image/camera.png" alt=""></div>
                    <button id="make_photo1">make photo</button>
                    <button id="make_photo2">make photo</button>
                </div>
                <div class="show_photo">
                    <canvas id="canvas" width="400" height="300"></canvas>
                    <img src="../../template/image/picture.png" id="photo" alt="">
                </div>
            </div>
            <div class="patterns">
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/space.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/rocket.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/happy.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/cake.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/mask.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/mustache.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/mustache1.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/mustache-and-pipe.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/eyeglasses.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/cap.png" alt=""></div></a>
            </div>
        </div>
    </main>
    <script src="../../template/js/change_src_img.js"></script>
    <script src="../../template/js/photo.js"></script>
    <script src="../../template/js/del_photo.js"></script>
    <script src="../../template/js/unload.js"></script>
    <script src="../../template/js/display_none.js"></script>
    <script src="../../template/js/save_photo.js"></script>
<?php include ROOT.'/views/layouts/footer.php'?>