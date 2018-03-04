<?php
return array(
	//'配置项'=>'配置值'
    // 数据库配置信息
    'DB_TYPE'=>'mysql',// 数据库类型
    'DB_HOST'=>'61.129.47.23',// 服务器地址
    'DB_NAME'=>'zrhwh',// 数据库名
    'DB_USER'=>'zrhwh',// 用户名
    'DB_PWD'=>'wh654321',// 密码
    'DB_PORT'=>3306,// 端口
    'DB_PREFIX'=>'cx_',// 数据库表前缀
    'DB_CHARSET'=>'utf8',// 数据库字符集
    'URL_MODEL'=>2,

    'TMPL_PARSE_STRING' => array(
        'PUBLIC' => __ROOT__ . '/Public',
        'ADMINJS' => __ROOT__ . '/Public/admin/js',
        'ADMINCSS' => __ROOT__ . '/Public/admin/css',
        'ADMINIMG'=>__ROOT__.'/Public/admin/images',
        'ADMINFONTS'=>__ROOT__.'/Public/admin/fonts',
        'ADMINPLUGINS'=>__ROOT__.'/Public/plugins'
    ),
);