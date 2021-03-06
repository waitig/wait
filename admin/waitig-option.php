<?php
$options = array(
    //将选项放入数组中，管理更加方便
    //
    //标签页‘网站设置’开始
    array(
        'title' => '网站设置',
        'id' => 'webseting',
        'type' => 'panelstart'        //panel代表是顶部标签
    ),
    array(
        'title' => '在此设置您网站的基本信息',
        'type' => 'sutitle'    //sutitle代表顶部标签介绍信息
    ),
    array(
        'name' => '网站描述',
        'desc' => '用简洁的文字描述您的站点，字数建议在120个字以内',
        'id' => "waitig_description",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '网站关键字',//选项显示的文字，选填
        'desc' => '各关键字间用半角逗号","分割，数量在6个以内最佳。',//选项显示的一段描述文字，选填
        'id' => "waitig_keywords",//选项的id，必须是唯一，后面根据这个获取值，必填
        'type' => 'text',//种类，这个是普通的文字输入，必填
        'std' => ''//选项的默认值，选填
    ),
    array(
        'name' => 'title分隔符',
        'desc' => '显示在浏览器标题栏用来分割网站名字的符号',
        'id' => 'waitig_delimiter',
        'type' => 'text',
        'std' => '|'
    ),
    array(
        'name' => '去除头部多余代码',
        'desc' => '如果不用wlw发布博客，则建议开启',
        'id' => 'waitig_remove_head_code',
        'type' => 'checkbox'
    ),
    array(
        'name' => '网站logo形式',
        'desc' => '选择你的网站logo为文字形式还是图片形式',
        'id' => "waitig_logo_type",
        'type' => 'radio',
        'options' => array(
            '文字形式' => 'waitig_logo_text',
            '图片形式' => 'waitig_logo_pic',
        ),
        'std' => 'waitig_logo_text'
    ),
    array(
        'name' => '网站图片logo地址',
        'desc' => '在此填入您的图片l地址',
        'id' => 'waitig_logo_url',
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '网站CDN网址',
        'desc' => '如果您使用了cdn加速，则在此填入您的CDN地址',
        'id' => 'waitig_cdnurl',
        'type' => 'text'
    ),
    array(
        'name' => '最新消息',
        'desc' => '在全站导航栏下方显示一个最新消息【支持滚动公告，每个公告请用 li 标签包裹】',
        'id' => 'waitig_tui',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'title' => '投稿设置',
        'type' => 'subtitle'
    ),
    array(
        'name' => '开启',
        'desc' => '开启后，在后台新建一个页面，模板选择投稿',
        'id' => 'waitig_tougao_en',
        'type' => 'checkbox'
    ),
    array(
        'name' => '媒体按钮',
        'desc' => '开启',
        'id' => 'waitig_tougao_media',
        'type' => 'checkbox'
    ),
    array(
        'name' => '投稿时间间隔',
        'desc' => '秒，默认：240',
        'id' => "waitig_tougao_time",
        'type' => 'number',
        'std' => 240
    ),
    array(
        'name' => '投稿提醒邮箱',
        'desc' => '这里的邮箱一般是站长的邮箱，默认是获取网站自带的邮箱，另外，SMTP服务必须保证正常使用',
        'id' => "waitig_tougao_mailto",
        'type' => 'text',
        'std' => get_bloginfo('admin_email')
    ),
    array(
        'type' => 'panelend'
    ),
    //标签页‘网站设置’结束
    //
    //标签页‘个性设置’开始
    array(
        'title' => '个性设置',
        'id' => 'personsetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '丰富的个性话设置，使你的网站更加个性！',
        'type' => 'subtitle'
    ),
    /*array(
            'name'	=>	'网站多彩风格',
            'desc'	=>	'【开启】，默认为黑白简约风格，开启后将会变为多彩风格',
            'id'	=>	'waitig_colorful_en',
            'type'	=>	'checkbox'
    ),*/
    array(
        'name' => '您的网站主色',
        'desc' => '设置您的网站主颜色，默认为#468847,可以使用选色工具选定后再填到此处',
        'id' => "waitig_main_color",
        'type' => 'smalltext',
        'std' => '#468847'
    ),
    array(
        'name' => '网站边框颜色',
        'desc' => '设置您的网站边框颜色，默认为#c3c3c3,可以使用选色工具选定后再填到此处',
        'id' => "waitig_border_color",
        'type' => 'smalltext',
        'std' => '#c3c3c3'
    ),
    array(
        'name' => '自定义鼠标指针',
        'desc' => '在此填入您的个性鼠标cur文件地址',
        'id' => 'waitig_ina_url',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '自定义链接鼠标指针',
        'desc' => '在此填入您的个性鼠标cur文件地址',
        'id' => 'waitig_ina_url_point',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '标签页抖动',
        'desc' => '启用    【启用你网站tag将会抖动起来】',
        'id' => "waitig_shack_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '开启浮动小人',
        'desc' => '启用    【启用后会在你的网站上显示一个浮动小人】',
        'id' => "waitig_spig_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '评论头像旋转',
        'desc' => '启用    【启用后你的评论头像会旋转】',
        'id' => "waitig_ava_tran",
        'type' => 'checkbox'
    ),
    array(
        'name' => '评论框占位文本',
        'desc' => '在此输入评论框的占位文本',
        'id' => "waitig_comment_placeholder",
        'type' => 'text',
        'std' => '说点什么吧…'
    ),
    array(
        'name' => '开启蜘蛛统计',
        'desc' => '启用    【要查看统计结果请到页面菜单新建[蜘蛛统计]页面】',
        'id' => "waitig_spider",
        'type' => 'checkbox'
    ),
    array(
        'title' => '个性导航栏设置',
        'type' => 'subtitle'
    ),
    array(
        'name' => '顶部悬浮菜单导航',
        'desc' => '开启【开启后您的菜单导航就会悬浮在页面上方】',
        'id' => "waitig_topnav",
        'type' => 'checkbox'
    ),
    array(
        'name' => '导航栏图片',
        'desc' => '输入导航栏图片地址，留空则代表关闭。【为了保持样式，图片最大高度限制为45px】',
        'id' => "waitig_nav_img",
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '导航栏右侧链接',
        'desc' => '导航栏右侧链接文字及地址',
        'id' => "waitig_nav_link",
        'type' => 'text',
        'std' => '<a href=\'www.waitig.com\'>订阅</a>|<a href=\'www.waitig.com\'>注册</a>'
    ),
    array(
        'name' => '透明导航栏',
        'desc' => '开启【开启后您的菜单导航栏就会变成半透明】',
        'id' => "waitig_tmnav",
        'type' => 'checkbox'
    ),
    array(
        'name' => '导航栏透明度',
        'desc' => '设置透明度，【0~1】0为全透明，1为不透明',
        'id' => "waitig_nav_tran",
        'type' => 'smalltext',
        'std' => '0.5'
    ),
    array(
        'name' => '导航栏颜色设置【RGB】',
        'desc' => 'R',
        'id' => "waitig_nav_color_r",
        'type' => 'number',
        'std' => 45
    ),
    array(
        'name' => '',
        'desc' => 'G',
        'id' => "waitig_nav_color_g",
        'type' => 'number',
        'std' => 45
    ),
    array(
        'name' => '',
        'desc' => 'B',
        'id' => "waitig_nav_color_b",
        'type' => 'number',
        'std' => 45
    ),
    array(
        'title' => '新式底部信息设置',
        'type' => 'subtitle'
    ),
    array(
        'name' => '开启新式网站底部样式',
        'desc' => '开启【开启后将会显示新式网站底部样式】',
        'id' => "footbar_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '位置一标题',
        'desc' => '输入第一个位置的标题',
        'id' => "footbar_title1",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '位置一内容',
        'desc' => '输入第一个位置的内容',
        'id' => "footbar_span1",
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '位置二标题',
        'desc' => '输入第二个位置的标题',
        'id' => "footbar_title2",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '位置二内容',
        'desc' => '输入第二个位置的内容',
        'id' => "footbar_span2",
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '位置三标题',
        'desc' => '输入第三个位置的标题',
        'id' => "footbar_title3",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '位置三内容',
        'desc' => '输入第三个位置的内容',
        'id' => "footbar_span3",
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '位置四标题',
        'desc' => '输入第四个位置的标题',
        'id' => "footbar_title4",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '位置四内容',
        'desc' => '输入第四个位置的内容',
        'id' => "footbar_span4",
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'type' => 'panelend'
    ),
    //标签页‘个性设置’结束
    //
    //社交设置标签页开始
    array(
        'title' => '社交设置',
        'id' => 'socialsetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '在网站显示社交图标，建议不要超过六个，否则会显示错位，留空则代表关闭',
        'type' => 'subtitle'
    ),
    array(
        'name' => '社交模块是否开启',
        'desc' => '【开启】 控制社交图标模块是否显示',
        'id' => 'waitig_social_en',
        'type' => 'checkbox',
        'std' => '1'
    ),
    array(
        'name' => 'RSS订阅地址',
        'desc' => '如果您想使用自定义的RSS地址，请在这里输入您期望的地址。',
        'id' => 'waitig_rss',
        'type' => 'text',
        'std' => get_bloginfo('rss2_url')
    ),
    array(
        'name' => '新浪微博',
        'desc' => '填写新浪微博个人主页链接',
        'id' => 'waitig_weibo',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '腾讯微博',
        'desc' => '填写腾讯微博个人主页链接',
        'id' => 'waitig_tqq',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '腾讯微信',
        'desc' => '请输入您的微信号',
        'id' => 'waitig_weixin',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '微信二维码',
        'desc' => '请输入您的二维码图片路径',
        'id' => 'waitig_weixin_qr',
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '腾讯QQ',
        'desc' => '直接输入QQ号即可',
        'id' => 'waitig_qqContact',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => 'Email',
        'desc' => '请填写好您的邮我代码，<a class="button-primary" rel="nofollow" href="http://open.mail.qq.com/cgi-bin/qm_help_mailme?sid=,2,zh_CN&t=open_mailme" target="lank">获取邮我组建代码</a>并<a class="button-primary" rel="nofollow" href="http://i1.tietuku.com/34cf2b2ee780db81.png" target="lank">如图设置</a>',
        'id' => 'waitig_emailContact',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '支付宝',
        'desc' => '输入支付宝账号',
        'id' => 'waitig_pay',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '支付宝二维码',
        'desc' => '请输入您的支付宝图片路径',
        'id' => 'waitig_pay_qr',
        'type' => 'images',
        'std' => ''
    ),
    array(
        'type' => 'panelend'
    ),
    //社交选项标签页结束
    //
    //样式选项标签页开始
    array(
        'title' => '样式设置',
        'id' => 'Stylesetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '请在此设置您的网站样式',
        'type' => 'subtitle'
    ),
    array(
        'name' => '您的网站分类ID为：',
        'desc' => Bing_show_category(),
        'type' => 'text_show'
    ),
    array(
        'title' => '全局样式设置',
        'type' => 'subtitle'
    ),
    array(
        'name' => '您的网站类型',
        'desc' => '选择您的网站类型【CMS样式请到CMS选项卡中设置，博客模式在本页设置】',
        'id' => "waitig_site_type",
        'type' => 'radio',
        'options' => array(
            '博客模式' => 'waitig_site_blog',
            'CMS 模式' => 'waitig_site_cms',
        ),
        'std' => 'waitig_site_blog'
    ),
    array(
        'name' => '侧边栏跟随',
        'desc' => '开启【开启后为下面的选项选择侧边栏序号】',
        'id' => "waitig_sideroll_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '第一个侧边栏：',
        'desc' => '跟随',
        'id' => "waitig_sideroll_1",
        'type' => 'number',
        'std' => ''
    ),
    array(
        'name' => '第二个侧边栏：',
        'desc' => '跟随',
        'id' => "waitig_sideroll_2",
        'type' => 'number',
        'std' => ''
    ),
    array(
        'name' => '热门排行',
        'desc' => '开启热门排行',
        'id' => 'hot_list_check',
        'type' => 'checkbox'
    ),
    array(
        'name' => '热门排行-排序根据',
        'desc' => '选择一个参数作为排序的根据，可以选择评论数目，浏览数目或者点赞数目',
        'id' => "waitig_hot",
        'type' => 'radio',
        'options' => array(
            '评论数目' => 'waitig_hot_comment',
            '浏览数目' => 'waitig_hot_views',
            '点赞数目' => 'waitig_hot_zan'
        ),
        'std' => 'waitig_hot_comment'
    ),
    array(
        'name' => '热门排行-显示条目',
        'desc' => '设置显示的文章数量，建议不要大于10',
        'id' => "hot_list_number",
        'type' => 'number',
        'std' => 5
    ),
    array(
        'name' => '热门排行-显示名称',
        'desc' => '显示的名称',
        'id' => "hot_list_title",
        'type' => 'text',
        'std' => '本周热门'
    ),
    array(
        'title' => '【博客模式】设置',
        'type' => 'subtitle'
    ),
    array(
        'name' => '文章无图时不显示缩略图',
        'desc' => '注意：选择此项目可能导致文章显示错位',
        'id' => 'waitig_thumbnail_un',
        'type' => 'checkbox'
    ),
    array(
        'name' => '文章列表Ajax下拉加载',
        'desc' => '开启后，网站会采用Ajax方式自动下拉加载【非CMS模式】',
        'id' => 'waitig_ajaxpager_en',
        'type' => 'checkbox'
    ),
    array(
        'name' => '首页屏蔽分类',
        'desc' => '【启用】,启用后，这些分类下的文章将不会在首页显示。',
        'id' => "waitiglockcat",
        'type' => 'checkbox'
    ),
    array(
        'name' => '屏蔽分类',
        'desc' => '填入您想屏蔽的分类ID，多个ID间用"|"号分割',
        'id' => 'waitiglockcat_array',
        'type' => 'text',
        'std' => ''
    ),
    array(
        'type' => 'panelend'
    ),
    //样式设置标签页结束
    //
    //混合布局标签页开始
    array(
        'title' => 'CMS设置',
        'id' => 'mixsetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '在此页面配置您的CMS布局模式，首先要在样式设置中选择CMS布局模式',
        'type' => 'subtitle'
    ),
    array(
        'name' => '您的网站分类ID为：',
        'desc' => Bing_show_category(),
        'type' => 'text_show'
    ),
    /*array(
            'name'  => 'CMS模式',
            'desc'  => '启用 【不启用的话，显示是博客模式】',
            'id'    => "waitig_cms_en",
            'type'  => 'checkbox'
    ),*/
    array(
        'name' => '热门文章模块',
        'desc' => '开启',
        'id' => 'waitig_hot_list',
        'type' => 'checkbox'
    ),
    array(
        'name' => '最近文章模块',
        'desc' => '开启',
        'id' => 'waitig_excerptlist',
        'type' => 'checkbox'
    ),
    array(
        'name' => '最新文章类型',
        'desc' => '选择最新文章的显示类型',
        'id' => "waitig_excerpt_type",
        'type' => 'radio',
        'options' => array(
            '列表模块模式[小]' => 'waitig_excerpt_small',
            '文章摘要模式[大]' => 'waitig_excerpt_big',
        ),
        'std' => 'waitig_excerpt_big'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量【文章摘要模式】',
        'id' => 'waitig_excerptlist_num',
        'type' => 'number'
    ),
    array(
        'name' => '分类一',
        'desc' => '开启',
        'id' => 'waitig_cat1',
        'type' => 'checkbox'
    ),
    array(
        'name' => '要显示的分类ID',
        'desc' => '填写你希望显示的分类的ID',
        'id' => 'waitig_cat1_id',
        'type' => 'number'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量',
        'id' => 'waitig_cat1_num',
        'type' => 'number'
    ),
    array(
        'name' => '以图片模式显示数量',
        'desc' => '填写你分类中希望以【图片模式】显示的文章数量',
        'id' => 'waitig_cat1_img_num',
        'type' => 'number'
    ),
    array(
        'name' => '分类二',
        'desc' => '开启',
        'id' => 'waitig_cat2',
        'type' => 'checkbox'
    ),
    array(
        'name' => '要显示的分类ID',
        'desc' => '填写你希望显示的分类的ID',
        'id' => 'waitig_cat2_id',
        'type' => 'number'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量',
        'id' => 'waitig_cat2_num',
        'type' => 'number'
    ),
    array(
        'name' => '以图片模式显示的数量',
        'desc' => '填写你分类中希望以【图片模式】显示的文章数量',
        'id' => 'waitig_cat2_img_num',
        'type' => 'number'
    ),
    array(
        'name' => '分类三',
        'desc' => '开启',
        'id' => 'waitig_cat3',
        'type' => 'checkbox'
    ),
    array(
        'name' => '要显示的分类ID',
        'desc' => '填写你希望显示的分类的ID',
        'id' => 'waitig_cat3_id',
        'type' => 'number'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量',
        'id' => 'waitig_cat3_num',
        'type' => 'number'
    ),
    array(
        'name' => '以图片模式显示的数量',
        'desc' => '填写你分类中希望以【图片模式】显示的文章数量',
        'id' => 'waitig_cat3_img_num',
        'type' => 'number'
    ),
    array(
        'name' => '分类四',
        'desc' => '开启',
        'id' => 'waitig_cat4',
        'type' => 'checkbox'
    ),
    array(
        'name' => '要显示的分类ID',
        'desc' => '填写你希望显示的分类的ID',
        'id' => 'waitig_cat4_id',
        'type' => 'number'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量',
        'id' => 'waitig_cat4_num',
        'type' => 'number'
    ),
    array(
        'name' => '以图片模式显示的数量',
        'desc' => '填写你分类中希望以【图片模式】显示的文章数量',
        'id' => 'waitig_cat4_img_num',
        'type' => 'number'
    ),
    array(
        'name' => '分类五',
        'desc' => '开启',
        'id' => 'waitig_cat5',
        'type' => 'checkbox'
    ),
    array(
        'name' => '要显示的分类ID',
        'desc' => '填写你希望显示的分类的ID',
        'id' => 'waitig_cat5_id',
        'type' => 'number'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量',
        'id' => 'waitig_cat5_num',
        'type' => 'number'
    ),
    array(
        'name' => '以图片模式显示的数量',
        'desc' => '填写你分类中希望以【图片模式】显示的文章数量',
        'id' => 'waitig_cat5_img_num',
        'type' => 'number'
    ),
    array(
        'name' => '分类六',
        'desc' => '开启',
        'id' => 'waitig_cat6',
        'type' => 'checkbox'
    ),
    array(
        'name' => '要显示的分类ID',
        'desc' => '填写你希望显示的分类的ID',
        'id' => 'waitig_cat6_id',
        'type' => 'number'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量',
        'id' => 'waitig_cat6_num',
        'type' => 'number'
    ),
    array(
        'name' => '以图片模式显示的数量',
        'desc' => '填写你分类中希望以【图片模式】显示的文章数量',
        'id' => 'waitig_cat6_img_num',
        'type' => 'number'
    ),
    array(
        'name' => '底部大分类模块',
        'desc' => '开启',
        'id' => 'waitig_big_list',
        'type' => 'checkbox'
    ),
    array(
        'name' => '显示文章数',
        'desc' => '填写你希望显示的文章数量',
        'id' => 'waitig_big_list_num',
        'type' => 'number'
    ),
    array(
        'name' => '要显示的分类ID',
        'desc' => '填写你希望显示的分类ID,可填写多个，尽量为2的倍数，多个ID之间用“|”号分割',
        'id' => 'waitig_big_list_cat',
        'type' => 'text'
    ),
    array(
        'type' => 'panelend'
    ),
    //混合布局标签页结束
    //
    //文章设置标签页开始
    array(
        'title' => '文章设置',
        'id' => 'Ariticalsetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '列表文章属性【非CMS模式】',
        'type' => 'subtitle'
    ),
    array(
        'name' => '访客数',
        'desc' => '不显示',
        'id' => 'waitig_post_views_un',
        'type' => 'checkbox'
    ),
    array(
        'name' => '作者名',
        'desc' => '不显示',
        'id' => 'waitig_post_author_un',
        'type' => 'checkbox'
    ),
    array(
        'name' => '评论数',
        'desc' => '不显示',
        'id' => 'waitig_post_comment_un',
        'type' => 'checkbox'
    ),
    array(
        'name' => '发布时间',
        'desc' => '不显示',
        'id' => 'waitig_post_time_un',
        'type' => 'checkbox'
    ),
    array(
        'name' => '喜欢数',
        'desc' => '不显示',
        'id' => 'waitig_post_like_un',
        'type' => 'checkbox'
    ),
    array(
        'title' => '文章页选项',
        'type' => 'subtitle'
    ),
    array(
        'name' => '百度分享',
        'desc' => '开启',
        'id' => 'waitig_bdshare_en',
        'type' => 'checkbox'
    ),
    /*array(
            'name'  => '文章面包屑',
            'desc'  => '开启',
            'id'    => 'waitig_singleMenu_en',
            'type'  => 'checkbox'
    ),*/
    array(
        'name' => '文章摘要',
        'desc' => '个字',
        'id' => 'waitig_excerpt_length',
        'type' => 'number',
        'std' => 180
    ),
    array(
        'name' => '文章二维码',
        'desc' => '启用',
        'id' => 'waitig_qr_en',
        'type' => 'checkbox'
    ),
    array(
        'name' => '相关文章显示条数',
        'desc' => '条&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 文章下面的相关文章数目【尽量设置为2的倍数】',
        'id' => "waitig_related_count",
        'type' => 'number',
        'std' => 8
    ),
    array(
        'name' => '文章底部版权信息',
        'desc' => '输入您文章底部的版权标识，您可以使用如下代码：{{title}}--文章标题，{{link}}--文章链接，{{blog_name}}--博客名称，{{blog_link}}--博客主页链接，{{display_name}}--作者显示的名字，{{nickname}}--作者昵称，{{description}}--作者描述，{{user_link}}--作者页面链接，完美支持HTML标签，留空代表关闭，',
        'id' => 'waitig_copyright',
        'type' => 'textarea'
    ),
    array(
        'title' => '垃圾评论屏蔽',
        'type' => 'subtitle'
    ),
    array(
        'name' => '过滤外语评论',
        'desc' => '开启 【启用后，将屏蔽所有含有日文以及英语的评论，外贸站慎用】',
        'id' => 'waitig_spam_lang',
        'type' => 'checkbox'
    ),
    /*array(
            'name'  => '自动超链接',
            'desc'  => '启用 【就是那种可以把一个链接自动变成可以点击的超链接】',
            'id'    => 'waitig_linktrue_en',
            'type'  => 'checkbox'
    ),*/
    array(
        'type' => 'panelend'
    ),
    //文章设置标签结束
    //
    //幻灯设置标签开始
    array(
        'title' => '幻灯设置',
        'id' => 'Slidesetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '本主题支持两种尺寸幻灯片，请选择其中一种',
        'type' => 'subtitle'
    ),
    array(
        'name' => '幻灯片尺寸选择',
        'desc' => '选择您需要的尺寸，【注意，如果选择小款，则请设置4篇以上的置顶文章,文章第一张图片为716*297，默认同时打开热门排行，即便你的热门排行没开启】',
        'id' => "waitig_slide",
        'type' => 'radio',
        'options' => array(
            '小款[716*297]' => 'waitig_sticky_en',
            '大款[855*300]' => 'waitig_slick_en',
            '关闭' => 'waitig_slick_un'
        ),
        'std' => 'waitig_slick_un'
    ),
    array(
        'name' => '移动端不显示',
        'desc' => '开启',
        'id' => "waitig_mobilesticky",
        'type' => 'checkbox'
    ),
    array(
        'title' => '小款[716*297]幻灯设置',
        'type' => 'subtitle'
    ),
    array(
        'name' => '幻灯片显示数目',
        'desc' => '个',
        'id' => 'waitig_sticky_count',
        'type' => 'number',
        'std' => '4'
    ),
    array(
        'title' => '大款[855*300]幻灯设置',
        'type' => 'subtitle'
    ),
    array(
        'name' => '幻灯片高度',
        'desc' => '在这里输入您的幻灯片图片高度',
        'id' => "waitig_slick_height",
        'type' => 'number',
        'std' => '300'
    ),
    array(
        'name' => '幻灯片一图片',
        'desc' => '在这里输入您的幻灯片的图片路径',
        'id' => "waitig_slick1img",
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '幻灯片一链接',
        'desc' => '在这里输入您的幻灯片的引用链接',
        'id' => "waitig_slick1url",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片一标题',
        'desc' => '在这里输入您的幻灯片的标题',
        'id' => "waitig_slick1title",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片二图片',
        'desc' => '在这里输入您的幻灯片的图片路径',
        'id' => "waitig_slick2img",
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '幻灯片二链接',
        'desc' => '在这里输入您的幻灯片的引用链接',
        'id' => "waitig_slick2url",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片二标题',
        'desc' => '在这里输入您的幻灯片的标题',
        'id' => "waitig_slick2title",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片三图片',
        'desc' => '在这里输入您的幻灯片的图片路径',
        'id' => "waitig_slick3img",
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '幻灯片三链接',
        'desc' => '在这里输入您的幻灯片的引用链接',
        'id' => "waitig_slick3url",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片三标题',
        'desc' => '在这里输入您的幻灯片的标题',
        'id' => "waitig_slick3title",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片四图片',
        'desc' => '在这里输入您的幻灯片的图片路径',
        'id' => "waitig_slick4img",
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '幻灯片四链接',
        'desc' => '在这里输入您的幻灯片的引用链接',
        'id' => "waitig_slick4url",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片四标题',
        'desc' => '在这里输入您的幻灯片的标题',
        'id' => "waitig_slick4title",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片五图片',
        'desc' => '在这里输入您的幻灯片的图片路径',
        'id' => "waitig_slick5img",
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '幻灯片五链接',
        'desc' => '在这里输入您的幻灯片的引用链接',
        'id' => "waitig_slick5url",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片五标题',
        'desc' => '在这里输入您的幻灯片的标题',
        'id' => "waitig_slick5title",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片六图片',
        'desc' => '在这里输入您的幻灯片的图片路径',
        'id' => "waitig_slick6img",
        'type' => 'images',
        'std' => ''
    ),
    array(
        'name' => '幻灯片六链接',
        'desc' => '在这里输入您的幻灯片的引用链接',
        'id' => "waitig_slick6url",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'name' => '幻灯片六标题',
        'desc' => '在这里输入您的幻灯片的标题',
        'id' => "waitig_slick6title",
        'type' => 'text',
        'std' => ''
    ),
    array(
        'type' => 'panelend'
    ),
    //幻灯设置标签页结束
    //
    //高级设置标签页开始
    array(
        'title' => '高级设置',
        'id' => 'Pluginsetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '本页面中的一些功能主要是为了替代一些插件，可能会和一些插件发生冲突',
        'type' => 'subtitle'
    ),
    //waitig_enable_https
    array(
        'name' => '网站开启HTTPS',
        'desc' => '开启   【如果你的网站开启了HTTPS，请勾选此项，并按照<a class="button-primary" rel="nofollow" href="https://www.waitig.com/wordpress-baidu-share-dont-support-https.html" target="lank">教程链接</a>中的方法来解决百度分享不支持HTTPS问题】',
        'id' => "waitig_enable_https",
        'type' => 'checkbox'
    ),
    array(
        'name' => '新式登陆界面',
        'desc' => '启用   【将会修改默认的登陆界面，用新式登陆界面代替】',
        'id' => "waitig_diy_login_page",
        'type' => 'checkbox'
    ),
    //login_redirect_url
    array(
        'name' => '登陆后跳转页面',
        'desc' => 'WordPress默认登陆后跳转到后台主页，可以在这里自定义登陆后跳转到的页面',
        'id' => "login_redirect_url",
        'type' => 'text'
    ),
    array(
        'name' => '百度收录提示',
        'desc' => '启用   【开启后，将会在文章标题下显示百度收录状态，需要curl扩展的支持，否则不生效】',
        'id' => "waitig_baidurecord_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '文章页面显示“赏”按钮',
        'desc' => '启用【使用在社交设置中的支付宝账号作为收款账号】',
        'id' => "waitig_payme_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '禁止站内文章Pingback',
        'desc' => '开启&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 开启后，不会发送站内Pingback，建议开启',
        'id' => "waitig_pingback_un",
        'type' => 'checkbox'
    ),
    array(
        'name' => '禁止后台编辑时自动保存',
        'desc' => '开启&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 开启后，后台编辑文章时候不会定时保存，有效缩减数据库存储量；但是，一般不建议开启，除非你的数据库容量很小',
        'id' => "waitig_autosave_un",
        'type' => 'checkbox'
    ),
    array(
        'name' => '屏蔽谷歌字体',
        'desc' => '启用  【开启后，将屏蔽加载谷歌字体文件，建议开启】',
        'id' => "waitig_google_un",
        'type' => 'checkbox'
    ),
    array(
        'name' => '链接去掉Categroy',
        'desc' => '启用 【开启后，需要至设置——固定连接——重新保存一下，否则会发生404错误】',
        'id' => "waitig_uncategroy_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '自动在文章中加入文章标签超链接',
        'desc' => '启用 【开启后，将在文章中自动加入文章标签的超链接】',
        'id' => "waitig_autotaglink_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '文章自动添加文字超链接',
        'desc' => '启用 【开启后，系统自动将自订文字加上自定义超链接】',
        'id' => "waitig_autotextlink_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '需添加的文字和超链接',
        'desc' => '举例:【文字1,链接1|文字2,链接2】逗号为英文半角',
        'id' => "waitig_autotextlink_text",
        'type' => 'text'
    ),
    /*array(
            'name'  => '头像旋转',
            'desc'  => '启用',
            'id'    => "waitig_avatar_en",
            'type'  => 'checkbox'
    ),*/
    array(
        'name' => '用户登陆信息',
        'desc' => '启用',
        'id' => "waitig_sign_en",
        'type' => 'checkbox'
    ),
    array(
        'name' => '评论开启go跳转',
        'desc' => '启用 【请在页面中新建go跳转页面，并把页面别名设为go】',
        'id' => "waitig_go",
        'type' => 'checkbox'
    ),
    array(
        'name' => '禁止主题自动更新',
        'desc' => '禁止自动更新 【不推荐】',
        'id' => "waitig_updates_un",
        'type' => 'checkbox'
    ),
    array(
        'name' => '网站登录页面保护',
        'desc' => '启用 【启用后请填写下面的名称与参数来登陆，格式：http://xxxx/wp-login.php?名称=参数  （请使用英文！）】',
        'id' => "waitig_admin_lock",
        'type' => 'checkbox'
    ),
    array(
        'name' => '名称',
        'desc' => '输入名称',
        'id' => "waitig_admin_q",
        'type' => 'text'
    ),
    array(
        'name' => '参数',
        'desc' => '输入参数',
        'id' => "waitig_admin_a",
        'type' => 'text'
    ),
    array(
        'type' => 'panelend'
    ),
    //高级设置标签页结束
    //
    //标签页‘公共代码’开始
    array(
        'title' => '公共代码',
        'id' => 'codeseting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '您可以在此编辑您网站的公共代码，这些代码将直接显示',
        'type' => 'subtitle'
    ),
    array(
        'name' => '流量统计代码',
        'desc' => '统计网站流量，推荐使用百度统计，国内比较优秀且速度快；还可使用Google统计、CNZZ等',
        'id' => 'waitig_track',
        'type' => 'textarea'
    ),
    array(
        'name' => '网站头部代码',
        'desc' => '会自动出现在页面头部（head区域），可放置广告代码等自定义（css或js）的全局代码块',
        'id' => 'waitig_headcode',
        'type' => 'textarea'
    ),
    array(
        'name' => '文章页自定义代码',
        'desc' => '此选项可放置作用于文章的css代码或者JavaScript代码块',
        'id' => "waitig_singlecode",
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '网站footer公共代码',
        'desc' => '在全站页面footer部分出现，可放置网站的版权信息等等',
        'id' => 'waitig_footercode',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '全站底部脚本代码',
        'desc' => '可放置广告代码等自定义（css或js）的全局代码块',
        'id' => 'waitig_footcode',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'type' => 'panelend'
    ),
    //公共代码设置标签页结束
    //
    //广告设置标签页开始
    array(
        'title' => '广告设置',
        'id' => 'ADsetting',
        'type' => 'panelstart'
    ),
    array(
        'title' => '您可以在本页面管理您网站广告位',
        'type' => 'subtitle'
    ),
    array(
        'name' => '广告：全站 - logo右侧广告',
        'desc' => '显示在网站LOGO的右侧，请注意宽度！',
        'id' => 'waitig_nav_ad',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：全站 - 导航下横幅',
        'desc' => '显示在公告栏下',
        'id' => 'waitig_adsite_01',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：全站 - 正文列表最前',
        'desc' => '显示在正文列表之前',
        'id' => 'waitig_adsite_02',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：首页 - 导航下横幅',
        'desc' => '显示在首页的导航下横幅',
        'id' => 'waitig_adindex_01',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：幻灯片下广告',
        'desc' => '如果幻灯没开启，则不显示',
        'id' => 'waitig_adindex_02',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：文章页 - 页面标题下',
        'desc' => '开启',
        'id' => 'waitig_adpost_01',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：文章页 - 相关文章下',
        'desc' => '开启',
        'id' => 'waitig_adpost_02',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：文章页 - 网友评论下',
        'desc' => '开启',
        'id' => 'waitig_adpost_03',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '手机广告：全站正文列表最',
        'desc' => '开启【手机广告只适合在手机中投放。例如百度联盟移动广告，PC端不会显示。下同】',
        'id' => 'Mobiled_adindex_02',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '手机广告：文章页 - 页面标题下',
        'desc' => '开启',
        'id' => 'Mobiled_adpost_01',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '手机广告：文章页 - 相关文章下',
        'desc' => '开启',
        'id' => 'Mobiled_adpost_02',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'name' => '广告：404页面广告',
        'desc' => '开启',
        'id' => 'waitig_404ad',
        'type' => 'textarea',
        'std' => ''
    ),
    array(
        'type' => 'panelend'
    ),

);
$notice = array(
    //将选项放入数组中，管理更加方便
    //
    //右侧公告
    array(
        'name' => '赞助作者',
        'desc' => '欢迎您使用<a href="http://www.waitig.com">Wait主题</a>！，如果您感觉这款主题给您带来了方便，可以通过支付宝对作者进行赞助，我将万分感谢！<br/>支付宝账号：waitig@hotmail.com，<br/>二维码：<img src="http://img.waitig.com/img/alipay.gif"/>',
    ),
);