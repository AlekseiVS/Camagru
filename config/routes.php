<?php
return array(
//    'product/([0-9]+)' => 'product/view/$1', //actionView ProductController
//    'catalog' => 'catalog/index', //actionIndex CatalogController
//    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory CatalogController
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
    '^confirm$' => 'user/confirm', //actionConfirm  UserController
    '^error404$' => 'user/error404', //actionError404  UserController
    '^change_user_data$' => 'user/change_user_data', //actionChange_data_user  AccountController


    '^gallery$' => 'photo/gallery', //actionGallery  AccountController
    '^cabinet$' => 'photo/cabinet', //actionCabinet  AccountController
    '^camera$' => 'photo/camera', //actionCamera  AccountController
    '^camera_make$' => 'photo/camera_make', //actionCamera  AccountController
    '^gallery_user$' => 'photo/gallery_user', //actionGallery_user  AccountController


//    '[a-zA-Z0-9]+' => 'user/error404', ////actionError404  UserController

    '^$' => 'user/register', //actionRegister UserController
);

?>