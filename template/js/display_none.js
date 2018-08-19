document.getElementById('do_with_camera').addEventListener('click', function() {
    document.getElementById('video').style.display='block';
    document.getElementsByClassName('upload_photo_preview')[0].style.display='none';
    document.querySelector('.overlay img').src = "../../template/image/space.png";
    document.querySelector('.show_photo img').src = "../../template/image/picture.png";
    document.getElementById('make_photo1').style.display='block';
    document.getElementById('make_photo2').style.display='none';
});
document.getElementById('upload_photo').addEventListener('click', function() {
    document.getElementsByClassName('upload_photo_preview')[0].style.display='block';
    document.getElementById('video').style.display='none';
    document.querySelector('.overlay img').src = "../../template/image/space.png";
    document.querySelector('.show_photo img').src = "../../template/image/picture.png";
    document.getElementById('video').style.display='none';
    document.getElementById('make_photo2').style.display='block';
    document.getElementById('make_photo1').style.display='none';
});
