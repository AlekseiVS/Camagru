<?php
return array(

    '^register$' => 'user/register', //actionRegister UserController
    '^login$' => 'user/login', //actionLogin  UserController

    '^forgot_password$' => 'user/forgot_password', //actionForgot UserController

    '^logout$' => 'user/logout', //actionLogout  UserController

    '^confirm$' => 'user/confirm', //actionConfirm  UserController //  Проверить на эррор,


    '^error404$' => 'user/error404', //actionError404  UserController
    '^you_are_registration$' => 'user/you_are_registration', //actionError404  UserController
    '^you_are_not_registration$' => 'user/you_are_not_registration', //actionError404  UserController


    '^change_user_data$' => 'user/change_user_data', //actionChange_data_user  AccountController



    '^gallery/page-([0-9]+)$' => 'photo/gallery_page', //actionCategory CatalogController


    '^cabinet$' => 'photo/cabinet', //actionCabinet  PhotoController

    '^camera_view$' => 'photo/camera_view', //actionCamera  PhotoController

    '^camera_make$' => 'photo/camera_make', //actionCamera  PhotoController
    '^photo_save$' => 'photo/photo_save', //actionCamera_save  PhotoController
    '^comment_save$' => 'photo/comment_save', //actionComments_save  PhotoController
    '^like_save$' => 'photo/like_save', //actionLikes_save  PhotoController
    '^like_color$' => 'photo/like_color', //actionLikes_save  PhotoController




    '^gallery_user/page-([0-9]+)$' => 'photo/gallery_user', //actionGallery_user  PhotoController


    '^del_user_photo_block$' => 'photo/del_user_photo_block', //actionGallery_user  PhotoController



    '^$' => 'user/register', //actionRegister UserController
);

?>