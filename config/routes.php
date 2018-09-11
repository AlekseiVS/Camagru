<?php
return array(
//    'product/([0-9]+)' => 'product/view/$1', //actionView ProductController
//    'catalog' => 'catalog/index', //actionIndex CatalogController
//    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory CatalogController



//    'catalog' => 'catalog/catalog/$1', //actionCategory CatalogController


//    'category/([0-9]+)' => 'catalog/category/$1', //actionCategory  CatalogController
//
//    'user/register' => 'user/register', //actionRegister  UserController
//    'user/login' => 'user/login', //actionLogin  UserController
//    'user/logout' => 'user/logout', //actionLogout  UserController
//
//    'cabinet/edit' => 'cabinet/edit', //actionEdit  CabinetController
//    'cabinet' => 'cabinet/index', //actionIndex  CabinetController

    '^register$' => 'user/register', //actionRegister UserController
    '^login$' => 'user/login', //actionLogin  UserController
    '^forgot$' => 'user/forgot', //actionForgot UserController
    '^logout$' => 'user/logout', //actionLogout  UserController

    'confirm' => 'user/confirm', //actionConfirm  UserController //  Проверить на эррор,
    // можно взламать так как нет конкретики ^confirm$ - решить проблему!!!

    '^error404$' => 'user/error404', //actionError404  UserController
    '^change_user_data$' => 'user/change_user_data', //actionChange_data_user  AccountController



//    '^gallery$' => 'photo/gallery', //actionGallery  PhotoController

//    '^gallery$' => 'catalog/catalog/page-1', //actionCategory CatalogController

    '^gallery/page-([0-9]+)$' => 'photo/gallery_page', //actionCategory CatalogController
//    '^gallery$' => 'photo/gallery_page', //actionCategory CatalogController
//    '^page-([0-9]+)$' => 'photo/gallery_page', //actionCategory CatalogController
//    '^gallery_user$' => 'photo/gallery_user', //actionGallery_user  PhotoController

    '^cabinet$' => 'photo/cabinet', //actionCabinet  PhotoController
    '^camera$' => 'photo/camera', //actionCamera  PhotoController
    '^camera_make$' => 'photo/camera_make', //actionCamera  PhotoController
    '^photo_save' => 'photo/photo_save', //actionCamera_save  PhotoController
    '^comment_save' => 'photo/comment_save', //actionComments_save  PhotoController
    '^like_save' => 'photo/like_save', //actionLikes_save  PhotoController
    '^like_color' => 'photo/like_color', //actionLikes_save  PhotoController

//    '^camera_upload$' => 'photo/camera_upload', //actionCamera_upload  PhotoController


    '^gallery_user/page-([0-9]+)$' => 'photo/gallery_user', //actionGallery_user  PhotoController



    '^del_user_photo_block$' => 'photo/del_user_photo_block', //actionGallery_user  PhotoController


//    '[a-zA-Z0-9]+' => 'user/error404', ////actionError404  UserController

    '^$' => 'user/register', //actionRegister UserController
);

?>