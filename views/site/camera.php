<?php include ROOT.'/views/layouts/header.php'?>
    <main>
        <div class="content_cabinet">
            <div class="navigation">
                <a href="/camera"><i class="fas fa-camera"></i><div class="nav_block">Camera</div></a>
                <a href="/change_user_data"><i class="fas fa-database"></i><div class="nav_block">User data</div></a>
                <a href="/gallery_user"><i class="far fa-image"></i><div class="nav_block">User photo</div></a>
            </div>
            <div class="photo_bottom">
                <a href="#"><button id="do_width_camera">do width camera</button></a>

<!-- --------------------------------------------------------------------------------------- -->


                <a href="/camera_upload">

                    <button >
                        upload photo
<!--                        <form action="#" method="POST" enctype="multipart/form-data">-->
<!--                            Select image to upload:-->
<!--                            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
<!--                            <input type="file" name="fileToUpload" id="fileToUpload">-->
<!--<!--                            <input type="submit" value="Upload Image" name="submit">-->
<!--                        </form>-->
                    </button>

                </a>


<!--   ----------------------------------------------------------------------------------------------------- -->


                <a href="#"><button>save</button></a>
                <a href="#"><button id="remove">remove</button></a>
            </div>
            <div class="content_camera">
                <div class="make_photo">
                    <div class="overlay"><img src="" alt=""></div>
                    <div class="upload_photo">
<!--                        <img src="../../--><?php //echo $_SESSION['src']?><!--" alt="">-->
                    </div>
                    <video id="video" width="400" height="300" autoplay></video>
                    <button id="make_photo">make photo</button>
                </div>
                <div class="show_photo">
                    <canvas id="canvas" width="400" height="300"></canvas>
                    <img src="" id="photo" alt="">
                </div>
            </div>
            <div class="patterns">
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/space.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="../../template/image/rocket.png" alt=""></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" ></div></a>
                <a href="#"><div class="patterns_photo"><img onclick="funcChangeSRC(this)" src="#" ></div></a>
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
    <script src="../../template/js/del_photo_canvas.js"></script>
<?php include ROOT.'/views/layouts/footer.php'?>