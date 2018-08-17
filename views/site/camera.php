<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_cabinet">
            <div class="navigation">
                <a href="/camera"><i class="fas fa-camera"></i><div class="nav_block">Camera</div></a>
                <a href="/change_user_data"><i class="fas fa-database"></i><div class="nav_block">User data</div></a>
                <a href="/gallery_user"><i class="far fa-image"></i><div class="nav_block">User photo</div></a>
            </div>
            <div class="photo_bottom">
                <a href="#">
                    <button id="do_width_camera">do width camera</button></a>
                <a href="#">
                    <button id="upload_photo">
<!--                        upload_photo-->
<!--                        <form action="#" method="POST" enctype="multipart/form-data">-->
<!--                            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
                        <div class="up">
                            <div class="#">upload photo</div>
                            <input type="file"  name="fileToUpload" id="fileToUpload" accept="image/png">
                        </div>
<!-- </form>-->
                    </button>
                </a>
                <a href="#"><button>save</button></a>
                <a href="#"><button id="remove">remove</button></a>
            </div>
            <div class="content_camera">
                <div class="make_photo">
                    <video id="video" width="400" height="300" autoplay></video>
                    <div class="upload_photo_preview"></div>
                    <div class="overlay"><img src="../../template/image/space.png" alt=""></div>
                    <button id="make_photo1">make photo</button>
                    <button id="make_photo2">make photo</button>
                </div>
                <div class="show_photo">
                    <canvas id="canvas" width="400" height="300"></canvas>
                    <img src="" id="photo" alt="">
                </div>
            </div>
            <div class="patterns">
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/space.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/rocket.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" alt=""></div></a>
            </div>
        </div>
    </main>
    <script src="../../template/js/change_src_img.js"></script>
    <script src="../../template/js/photo.js"></script>
    <script src="../../template/js/del_photo_canvas.js"></script>
    <script src="../../template/js/unload.js"></script>
    <script src="../../template/js/display_none.js"></script>
<?php include ROOT.'/views/layouts/footer.php'?>