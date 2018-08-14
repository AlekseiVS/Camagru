<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_cabinet">
            <div class="navigation">
                <a href="/camera"><i class="fas fa-camera"></i><div class="nav_block">Camera</div></a>
                <a href="/change_user_data"><i class="fas fa-database"></i><div class="nav_block">User data</div></a>
                <a href="/gallery_user"><i class="far fa-image"></i><div class="nav_block">User photo</div></a>
            </div>
            <div class="photo_bottom">
                <button id="capture" class="booth-capture-button">make photo</button>
                <button>upload photo</button>
                <button>save</button>
                <button>remove</button>
            </div>
            <div class="content_camera">
                <div class="make_photo">
                    <div class="overlay"><img src="" alt=""></div>
                    <video id="video" width="400" height="300" autoplay></video>
                </div>
                <div class="show_photo">
                    <canvas id="canvas" width="400" height="300"></canvas>
                    <img src="http://goo.gl/qgUfzX" id="photo" alt="Ваша фотография">
                </div>
            </div>
            <div class="patterns">
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/layer.svg" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/circle.svg" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/rocket.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="" alt="" width="50px" height="50px"></div></a>
                <a href="#"><div class="patterns_photo">ptrns</div></a>
                <a href="#"><div class="patterns_photo">ptrns</div></a>
                <a href="#"><div class="patterns_photo">ptrns</div></a>
                <a href="#"><div class="patterns_photo">ptrns</div></a>
                <a href="#"><div class="patterns_photo">ptrns</div></a>
                <a href="#"><div class="patterns_photo">ptrns</div></a>
            </div>
        </div>
    </main>
    <script src="../../template/js/change_src_img.js"></script>
    <script src="../../template/js/photo.js"></script>
<?php include ROOT.'/views/layouts/footer.php'?>