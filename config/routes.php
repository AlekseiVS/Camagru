<?php
return array(

    '^logo$' => 'user/logo', //actionLogin  UserController
    '^register$' => 'user/register',
    '^login$' => 'user/login',
    '^forgot_password$' => 'user/forgot_password',
    '^logout$' => 'user/logout',
    'confirm' => 'user/confirm',
    '^error404$' => 'user/error404',
    '^you_are_registration$' => 'user/you_are_registration',
    '^you_are_not_registration$' => 'user/you_are_not_registration',
    '^change_user_data$' => 'user/change_user_data',
    '^gallery/page-([0-9]+)$' => 'photo/gallery_page',
    '^cabinet$' => 'photo/cabinet',
    '^camera_view$' => 'photo/camera_view',
    '^camera_make$' => 'photo/camera_make',
    '^photo_save$' => 'photo/photo_save',
    '^comment_save$' => 'photo/comment_save',
    '^like_save$' => 'photo/like_save',
    '^like_color$' => 'photo/like_color',
    'change_data' => 'user/change_data',
    '^gallery_user/page-([0-9]+)$' => 'photo/gallery_user',
    '^del_user_photo_block$' => 'photo/del_user_photo_block',
    '^$' => 'user/register',
);

?>