//这儿共有四对引号，分别是按钮的ID、显示名、点一下输入内容、再点一下关闭内容（此为空则一次输入全部内容），\n表示换行。
QTags.addButton( 'hr', 'hr', "\n<hr />\n", '' );//添加横线
QTags.addButton( 'h2', 'h2', "\n<h2>", "</h2>\n" ); //添加标题2
QTags.addButton( 'h3', 'h3', "\n<h3>", "</h3>\n" ); //添加标题3
QTags.addButton( 'task', 'task', "\n[task]\n灰色项目面板\n", "[/task]\n" );//添加灰色项目面板
QTags.addButton( 'noway', 'noway', "\n[noway]\n红色禁止面板\n", "[/noway]\n" );//添加红色禁止面板
QTags.addButton( 'warning', 'warn', "\n[warning]\n黄色警告面板\n", "[/warning]\n" );//添加黄色警告面板
QTags.addButton( 'buy', 'buy', "\n[buy]\n绿色购买面板\n", "[/buy]\n" );//添加绿色购买面板
QTags.addButton( 'Down', 'down', "\n[Downlink href='下载链接']点此下载：", "[/Downlink]\n" );//添加下载链接
QTags.addButton( 'mp3', 'mp3', "\n[mp3]", "[/mp3]\n" );//添加音乐播放器
QTags.addButton( 'flv', 'flv', "\n[flv]", "[/flv]\n" );//添加flv播放器
QTags.addButton( 'embed', 'embed', "\n[embed]", "[/embed]\n" );//添加网络视频
