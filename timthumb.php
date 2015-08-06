<?php
//定义版本信息
define ('VERSION', '2.8.10');
//如果有配置文件，则加载timthumb-config.php，没有的话使用下面的值
if( file_exists(dirname(__FILE__) . '/timthumb-config.php')){
  require_once('timthumb-config.php');
}
//调试日志记录到web服务器日志中
if(! defined('DEBUG_ON') ){
  define ('DEBUG_ON', false);
}
//调试级别，高于这个值的level都不会记录，1最低，3最高
if(! defined('DEBUG_LEVEL') ){
  define ('DEBUG_LEVEL', 1);
}
//最大占用内存限制30M
if(! defined('MEMORY_LIMIT') ){
  define ('MEMORY_LIMIT', '30M');
}
//关闭仿盗链
if(! defined('BLOCK_EXTERNAL_LEECHERS') ){
  define ('BLOCK_EXTERNAL_LEECHERS', true);
} 					
// 允许从外部获取<strong><strong>图片</strong></strong>
if(! defined('ALLOW_EXTERNAL') ){
  define ('ALLOW_EXTERNAL', TRUE);
}
//允许获取所有外部站点url
if(! defined('ALLOW_ALL_EXTERNAL_SITES') ){
  define ('ALLOW_ALL_EXTERNAL_SITES', TRUE);
}
//启用文件缓存
if(! defined('FILE_CACHE_ENABLED') ){
  define ('FILE_CACHE_ENABLED', TRUE);
}
//文件缓存更新时间，s
if(! defined('FILE_CACHE_TIME_BETWEEN_CLEANS')){
  define ('FILE_CACHE_TIME_BETWEEN_CLEANS', 86400);
}
//文件缓存生存时间，s，过了这个时间的缓存文件就会被删除
if(! defined('FILE_CACHE_MAX_FILE_AGE') ){
  define ('FILE_CACHE_MAX_FILE_AGE', 86400);
}
//缓存文件后缀
if(! defined('FILE_CACHE_SUFFIX') ){
  define ('FILE_CACHE_SUFFIX', '.timthumb.txt');
}
//缓存文件前缀
if(! defined('FILE_CACHE_PREFIX') ){
  define ('FILE_CACHE_PREFIX', 'timthumb');
}
//缓存文件目录，留空则使用系统临时目录（推荐）
if(! defined('FILE_CACHE_DIRECTORY') ){
  define ('FILE_CACHE_DIRECTORY', './cache');
}
//<strong><strong>图片</strong></strong>最大尺寸，此脚本最大能<strong>处理</strong>10485760字节的<strong><strong>图片</strong></strong>，也就是10M
if(! defined('MAX_FILE_SIZE') ){
  define ('MAX_FILE_SIZE', 10485760);
}  
//CURL的超时时间
if(! defined('CURL_TIMEOUT') ){
  define ('CURL_TIMEOUT', 20);
}
//清理错误缓存的时间
if(! defined('WAIT_BETWEEN_FETCH_ERRORS') ){
  define ('WAIT_BETWEEN_FETCH_ERRORS', 3600);
}
//浏览器缓存时间
if(! defined('BROWSER_CACHE_MAX_AGE') ){
  define ('BROWSER_CACHE_MAX_AGE', 864000);
}
//关闭所有浏览器缓存
if(! defined('BROWSER_CACHE_DISABLE') ){
  define ('BROWSER_CACHE_DISABLE', false);
}
//最大图像宽度
if(! defined('MAX_WIDTH') ){
  define ('MAX_WIDTH', 1500);
}
//最大图像高度
if(! defined('MAX_HEIGHT') ){
  define ('MAX_HEIGHT', 1500);
}
//404错误时显示的提示<strong><strong>图片</strong></strong>地址，设置测值则不会显示具体的错误信息
if(! defined('NOT_FOUND_IMAGE') ){
  define ('NOT_FOUND_IMAGE', '');
}
//其他错误时显示的提示<strong><strong>图片</strong></strong>地址，设置测值则不会显示具体的错误信息
if(! defined('ERROR_IMAGE') ){
  define ('ERROR_IMAGE', '');
}
//PNG<strong><strong>图片</strong></strong>背景颜色，使用false代表透明
if(! defined('PNG_IS_TRANSPARENT') ){
  define ('PNG_IS_TRANSPARENT', FALSE);
}
//默认<strong><strong>图片</strong></strong>质量
if(! defined('DEFAULT_Q') ){
  define ('DEFAULT_Q', 90);
}
//默认 缩放/裁剪 模式，0：根据传入的值进行缩放（不裁剪）， 1：以最合适的比例裁剪和调整大小（裁剪）， 2：按比例调整大小，并添加边框（裁剪），2：按比例调整大小，不添加边框（裁剪）
if(! defined('DEFAULT_ZC') ){
  define ('DEFAULT_ZC', 1);
}
//默认需要对<strong><strong>图片</strong></strong>进行的<strong>处理</strong>操作，可选值和参数格式请参看processImageAndWriteToCache函数中的$filters和$imageFilters的注释
if(! defined('DEFAULT_F') ){
  define ('DEFAULT_F', '');
}
//是否对<strong><strong>图片</strong></strong>进行锐化
if(! defined('DEFAULT_S') ){
  define ('DEFAULT_S', 0);
}
//默认画布颜色
if(! defined('DEFAULT_CC') ){
  define ('DEFAULT_CC', 'ffffff');
}
//以下是<strong><strong>图片</strong></strong>压缩设置，前提是你的主机中有optipng或者pngcrush这两个工具，否则的话不会启用此功能
//此功能只对png<strong><strong>图片</strong></strong>有效
if(! defined('OPTIPNG_ENABLED') ){
  define ('OPTIPNG_ENABLED', false);
}  
if(! defined('OPTIPNG_PATH') ){
  define ('OPTIPNG_PATH', '/usr/bin/optipng');
} //优先使用optipng,因为有更好的压缩比 
if(! defined('PNGCRUSH_ENABLED') ){
  define ('PNGCRUSH_ENABLED', false);
} 
if(! defined('PNGCRUSH_PATH') ){
  define ('PNGCRUSH_PATH', '/usr/bin/pngcrush');
} //optipng不存在的话，使用pngcrush
//<strong><strong>图片</strong></strong>压缩设置结束


/* 
 * * 以下是网站截图配置
 * 首先，网站截图需要root权限
 * Ubuntu 上使用网站截图的步骤：
 *  1.用这个命令安装Xvfb  sudo apt-get install subversion libqt4-webkit libqt4-dev g++ xvfb
 *  2.新建一个文件夹，并下载下面的源码
 *  3.用这个命令下载最新的CutyCapt  svn co https://cutycapt.svn.sourceforge.net/svnroot/cutycapt
 *  4.进入CutyCapt文件夹
 *  5.编译并安装CutyCapt
 *  6.尝试运行以下命令：  xvfb-run --server-args="-screen 0, 1024x768x24" CutyCapt --url="http://markmaunder.com/" --out=test.png
 *  7.如果生成了一个 test.php的<strong><strong>图片</strong></strong>，证明一切正常，现在通过浏览器试试，访问下面的地址：http://yoursite.com/path/to/timthumb.php?src=http://markmaunder.com/&webshot=1
 *
 * 需要注意的地方：
 *  1.第一次webshot加载时，需要数秒钟，之后加载就很快了
 *
 * 高级用户：
 *  1.如果想提速大约25%，并且你了解linux，可以运行以下命令：
 *  nohup Xvfb :100 -ac -nolisten tcp -screen 0, 1024x768x24 > /dev/null 2>&1 &
 *  并设置 WEBSHOT_XVFB_RUNNING 的值为true
 *
 * */
//测试的功能，如果设置此值为true, 并在查询字符串中加上webshot=1,会让脚本返回浏览器的截图，而不是获取图像
if(! defined('WEBSHOT_ENABLED') ){
  define ('WEBSHOT_ENABLED', false);
}
//定义CutyCapt地址
if(! defined('WEBSHOT_CUTYCAPT') ){
  define ('WEBSHOT_CUTYCAPT', '/usr/local/bin/CutyCapt');
}
//Xvfb地址
if(! defined('WEBSHOT_XVFB') ){
  define ('WEBSHOT_XVFB', '/usr/bin/xvfb-run');
}
//截图屏幕宽度1024
if(! defined('WEBSHOT_SCREEN_X') ){
  define ('WEBSHOT_SCREEN_X', '1024');
}
//截图屏幕高度768
if(! defined('WEBSHOT_SCREEN_Y') ){
  define ('WEBSHOT_SCREEN_Y', '768');
}
//色深，作者说他只测试过24
if(! defined('WEBSHOT_COLOR_DEPTH') ){
  define ('WEBSHOT_COLOR_DEPTH', '24');	
}
//截图格式
if(! defined('WEBSHOT_IMAGE_FORMAT') ){
  define ('WEBSHOT_IMAGE_FORMAT', 'png');
}
//截图超时时间，单位s
if(! defined('WEBSHOT_TIMEOUT') ){
  define ('WEBSHOT_TIMEOUT', '20');
}
//user_agent头
if(! defined('WEBSHOT_USER_AGENT') ){
  define ('WEBSHOT_USER_AGENT', "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.9.2.18) Gecko/20110614 Firefox/3.6.18");
}
//是否启用JS
if(! defined('WEBSHOT_JAVASCRIPT_ON') ){
  define ('WEBSHOT_JAVASCRIPT_ON', true);
}
//是否启用java
if(! defined('WEBSHOT_JAVA_ON') ){
  define ('WEBSHOT_JAVA_ON', false);
}
//开启flash和其他插件
if(! defined('WEBSHOT_PLUGINS_ON') ){
  define ('WEBSHOT_PLUGINS_ON', true);
}
//代理服务器
if(! defined('WEBSHOT_PROXY') ){
  define ('WEBSHOT_PROXY', '');	
}
//如果运行了XVFB,此项设为true
if(! defined('WEBSHOT_XVFB_RUNNING') ){
  define ('WEBSHOT_XVFB_RUNNING', false);
}
// 如果 ALLOW_EXTERNAL 的值为真 并且 ALLOW_ALL_EXTERNAL_SITES 的值为假，那么截图的<strong><strong>图片</strong></strong>只能从下面这些数组中的域和子域进行
if(! isset($ALLOWED_SITES)){
  $ALLOWED_SITES = array (
    'flickr.com',
    'staticflickr.com',
    'picasa.com',
    'img.youtube.com',
    'upload.wikimedia.org',
    'photobucket.com',
    'imgur.com',
    'imageshack.us',
    'tinypic.com',
  );
}
/*截图配置结束*/

// -------------------------------------------------------------
// -------------------------- 配置结束 ------------------------
// -------------------------------------------------------------

timthumb::start();

class timthumb {
	protected $src = "";  //需要获取的<strong><strong>图片</strong></strong>url
	protected $is404 = false;  //404错误码
	protected $docRoot = "";  //服务器文档根目录
	protected $lastURLError = false; //上一次请求外部url的错误信息
	protected $localImage = ""; //如果请求的url是本地<strong><strong>图片</strong></strong>，则为本地<strong><strong>图片</strong></strong>的地址
	protected $localImageMTime = 0;  //本地<strong><strong>图片</strong></strong>的修改时间
	protected $url = false;  //用parse_url解析src后的数组
        protected $myHost = "";  //本机域名
	protected $isURL = false;  //是否为外部<strong><strong>图片</strong></strong>地址
	protected $cachefile = ''; //缓存文件地址
	protected $errors = array();  //错误信息列表
	protected $toDeletes = array(); //析构函数中需要删除的资源列表
	protected $cacheDirectory = ''; //缓存地址
	protected $startTime = 0;  //开始时间
	protected $lastBenchTime = 0; //上一次debug完成的时间
	protected $cropTop = false;  //是否启用裁剪
	protected $salt = "";  //文件修改时间和inode连接的字符串的盐值
	protected $fileCacheVersion = 1; //文件缓存版本，当这个类升级或者被更改时，这个值应该改变，从而重新生成缓存
	protected $filePrependSecurityBlock = "<?php die('Execution denied!'); //"; //缓存文件安全头，防止直接访问
	protected static $curlDataWritten = 0;  //将curl获取到的数据写入缓存文件的长度
	protected static $curlFH = false;  //curl请求成功后要将获取到的数据写到此文件内
	/*外部调用接口*/
	public static function start(){
	  	//实例化模型
	  	$tim = new timthumb();
		//检查实例化模型时是否有错误
		$tim->handleErrors();
		//此函数为空，用做自定义的数据验证
		$tim->securityChecks();
		//尝试读取浏览器缓存
		if($tim->tryBrowserCache()){
		  	//成功的话就输出缓存
			exit(0);
		}
		//检测错误
		$tim->handleErrors();
		//如果启用了文件缓存，并且读取服务端缓存
		if(FILE_CACHE_ENABLED && $tim->tryServerCache()){
		  	//成功的话输出缓存
			exit(0);
		}
		//检测读取服务端缓存时的错误
		$tim->handleErrors();
		//生成和<strong>处理</strong><strong><strong>图片</strong></strong>主函数
		$tim->run();
		//检测<strong><strong>图片</strong></strong>生成和<strong>处理</strong>时的错误
		$tim->handleErrors();
		//程序执行完毕运行析构方法并退出
		exit(0);
	}
	/*构造方法，用来获取和设置一些基本属性*/
	public function __construct(){
	  	//将允许的域设为全局变量
	  	global $ALLOWED_SITES;
		//记录开始时间
		$this->startTime = microtime(true);
		//设置时区
		date_default_timezone_set('UTC');
		//写日志，记录请求IP和请求URL
		$this->debug(1, "Starting new request from " . $this->getIP() . " to " . $_SERVER['REQUEST_URI']);
		//获取服务器文档根目录
		$this->calcDocRoot();
		//获取文件的修改时间和inode,inode只在linux系统下有效
		$this->salt = @filemtime(__FILE__) . '-' . @fileinode(__FILE__);
		//记录salt信息，级别3
		$this->debug(3, "Salt is: " . $this->salt);
		//如果定义了缓存文件地址
		if(FILE_CACHE_DIRECTORY){
		  	//如果这个地址不存在，或为非目录
		  	if(! is_dir(FILE_CACHE_DIRECTORY)){
		    		//建立这个目录
			  	@mkdir(FILE_CACHE_DIRECTORY);
				//如果建立失败
				if(! is_dir(FILE_CACHE_DIRECTORY)){
				  	//记录错误信息，停止执行
					$this->error("Could not create the file cache directory.");
					return false;
				}
			}
			//将缓存地址写入成员属性
			$this->cacheDirectory = FILE_CACHE_DIRECTORY;
			//在缓存目录下创建一个index.html文件，防止列目录
			if (!touch($this->cacheDirectory . '/index.html')) {
			  	//如果出错，记录错误信息
				$this->error("Could not create the index.html file - to fix this create an empty file named index.html file in the cache directory.");
			}
		//如果没定义缓存文件地址，则用系统的临时文件目录做为缓存文件目录
		} else {
			$this->cacheDirectory = sys_get_temp_dir();
		}
		//进行缓存检查，清除过期缓存
		$this->cleanCache();
		//记录本机域名
		$this->myHost = preg_replace('/^www\./i', '', $_SERVER['HTTP_HOST']);
		//获取<strong><strong>图片</strong></strong>地址，此地址应该由$_GET中的src参数传递
		$this->src = $this->param('src');
		//此数组是解析src后的结果，包括scheme,host,port,user,pass,path,query,fragment其中一个或多个值
		$this->url = parse_url($this->src);
		//如果<strong><strong>图片</strong></strong>地址是本机的，则删除<strong><strong>图片</strong></strong>url中本机的域名部分
		$this->src = preg_replace('/https?:\/\/(?:www\.)?' . $this->myHost . '/i', '', $this->src);
		//如果<strong><strong>图片</strong></strong>地址的长度小于3，则是无效地址
		if(strlen($this->src) <= 3){
		  	//添加错误信息
			$this->error("No image specified");
			return false;
		}
		//如果开启了防盗链，并且存在来源地址，也就是HTTP_REFERER头，并且来源地址不是本机，则进行防盗链<strong>处理</strong>
		if(BLOCK_EXTERNAL_LEECHERS && array_key_exists('HTTP_REFERER', $_SERVER) && (! preg_match('/^https?:\/\/(?:www\.)?' . $this->myHost . '(?:$|\/)/i', $_SERVER['HTTP_REFERER']))){
			//此base64编码的内容是一张显示 No Hotlinking的<strong><strong>图片</strong></strong>
		  	$imgData = base64_decode("R0lGODlhUAAMAIAAAP8AAP///yH5BAAHAP8ALAAAAABQAAwAAAJpjI+py+0Po5y0OgAMjjv01YUZ\nOGplhWXfNa6JCLnWkXplrcBmW+spbwvaVr/cDyg7IoFC2KbYVC2NQ5MQ4ZNao9Ynzjl9ScNYpneb\nDULB3RP6JuPuaGfuuV4fumf8PuvqFyhYtjdoeFgAADs=");
			//显示内容为gif<strong><strong>图片</strong></strong>
			header('Content-Type: image/gif');
			//内容长度
			header('Content-Length: ' . sizeof($imgData));
			//无<strong>网页</strong>缓存
			header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
			//兼容http1.0和https
			header("Pragma: no-cache");
			//内容立即过期
			header('Expires: ' . gmdate ('D, d M Y H:i:s', time()));
			//输出<strong><strong>图片</strong></strong>
			echo $imgData;
			return false;
			//退出脚本
			exit(0);
		}
		//如果此时的src属性包含http等字符，说明是外部链接
		if(preg_match('/^https?:\/\/[^\/]+/i', $this->src)){
		  	//写日志，说明这个链接是外部的，级别2
		  	$this->debug(2, "Is a request for an external URL: " . $this->src);
			//将isURL设为true，说明是外部url
			$this->isURL = true;
		//如果不包含的话，说明是内部链接
		} else {
			$this->debug(2, "Is a request for an internal file: " . $this->src);
		}
		//如果<strong><strong>图片</strong></strong>的src是外部网站，并且配置文件不允许从外部获取<strong><strong>图片</strong></strong>，则退出
		if($this->isURL && (! ALLOW_EXTERNAL)){
			$this->error("You are not allowed to fetch images from an external website.");
			return false;
		}
		//如果允许从外部网站获取<strong><strong>图片</strong></strong>
		if($this->isURL){
		  	//并且配置文件允许从所有的外部网站获取<strong><strong>图片</strong></strong>
		  	if(ALLOW_ALL_EXTERNAL_SITES){
				//写日志，允许从外部网站取回<strong><strong>图片</strong></strong>，级别2
			  	$this->debug(2, "Fetching from all external sites is enabled.");
			//如果配置文件不允许从所有的外部网站获取<strong><strong>图片</strong></strong>
			} else {
			  	//写日志，只能从指定的外部网站获取<strong><strong>图片</strong></strong>，级别2
			  	$this->debug(2, "Fetching only from selected external sites is enabled.");
				//此为验证位，默认为false
				$allowed = false;
				//遍历配置文件中允许站点的列表
				foreach($ALLOWED_SITES as $site){
				  	//这里对<strong><strong>图片</strong></strong>的url跟允许访问站点的列表进行验证，前面的条件对应的是有主机名的，后面的内容对应的是没有主机名的，写的很精巧
				  	if ((strtolower(substr($this->url['host'],-strlen($site)-1)) === strtolower(".$site")) || (strtolower($this->url['host'])===strtolower($site))) {
						//通过验证则写一条日志，验证成功，级别3
					  	$this->debug(3, "URL hostname {$this->url['host']} matches $site so allowing.");
						//验证位为true
						$allowed = true;
					}
				}
				//如果没通过验证， 写错误信息并退出
				if(! $allowed){
					return $this->error("You may not fetch images from that site. To enable this site in timthumb, you can either add it to \$ALLOWED_SITES and set ALLOW_EXTERNAL=true. Or you can set ALLOW_ALL_EXTERNAL_SITES=true, depending on your security needs.");
				}
			}
		}
		//缓存文件的前缀，如果是内部<strong><strong>图片</strong></strong>，用_int_，外部<strong><strong>图片</strong></strong>用_ext_
		$cachePrefix = ($this->isURL ? '_ext_' : '_int_');
		//如果是外部<strong><strong>图片</strong></strong>地址
		if($this->isURL){
		  	//得到GET字符串的数组
		  	$arr = explode('&', $_SERVER ['QUERY_STRING']);
			//按字母顺序对数组元素排序
			asort($arr);
			//生成缓存文件地址  缓存目录 + / + 缓存前缀 + $cachePrefix + 唯一散列值  + 缓存后缀
			$this->cachefile = $this->cacheDirectory . '/' . FILE_CACHE_PREFIX . $cachePrefix . md5($this->salt . implode('', $arr) . $this->fileCacheVersion) . FILE_CACHE_SUFFIX;
		//如果是本地<strong><strong>图片</strong></strong>
		} else {
		  	//获取本地<strong><strong>图片</strong></strong>地址
		  	$this->localImage = $this->getLocalImagePath($this->src);
			//如果获取不到地址
			if(! $this->localImage){
			  	//写日志，没有找到此文件，级别1
			  	$this->debug(1, "Could not find the local image: {$this->localImage}");
				//记录错误信息
				$this->error("Could not find the internal image you specified.");
				//设置404错误信息
				$this->set404();
				//终止执行程序
				return false;
			}
			//写日志，记录本地<strong><strong>图片</strong></strong>信息，级别1
			$this->debug(1, "Local image path is {$this->localImage}");
			//获取文件修改时间
			$this->localImageMTime = @filemtime($this->localImage);
			//生成缓存文件地址,  缓存目录 + / + 缓存前缀 + $cachePrefix + 唯一散列值 + 缓存后缀
			$this->cachefile = $this->cacheDirectory . '/' . FILE_CACHE_PREFIX . $cachePrefix . md5($this->salt . $this->localImageMTime . $_SERVER ['QUERY_STRING'] . $this->fileCacheVersion) . FILE_CACHE_SUFFIX;
		}
		//记录缓存文件地址
		$this->debug(2, "Cache file is: " . $this->cachefile);
		//构造函数完成
		return true;
	}
	/*析构方法，删除toDeletes数组中的每一个文件*/
	public function __destruct(){
		foreach($this->toDeletes as $del){
			$this->debug(2, "Deleting temp file $del");
			@unlink($del);
		}
	}
	/*主函数，通过不同参数调用不同的<strong><strong>图片</strong></strong><strong>处理</strong>函数*/
	public function run(){
	  	//如果是外部的<strong><strong>图片</strong></strong>链接
	  	if($this->isURL){
			//但是配置文件不允许从外部获取链接
		  	if(! ALLOW_EXTERNAL){
				//写日志，说明配置文件禁止访问外部<strong><strong>图片</strong></strong>，级别1
			  	$this->debug(1, "Got a request for an external image but ALLOW_EXTERNAL is disabled so returning error msg.");
				//写错误记录
				$this->error("You are not allowed to fetch images from an external website.");
				//退出执行
				return false;
			}
			//配置文件允许从外部获取链接，则写日志，接着运行，级别3
			$this->debug(3, "Got request for external image. Starting serveExternalImage.");
			//如果get了webshot参数并且为真，则进行截图操作
			if($this->param('webshot')){
			  	//如果配置文件允许截图
			  	if(WEBSHOT_ENABLED){
			    		//写日志，说明要进行截图操作，级别3
				  	$this->debug(3, "webshot param is set, so we're going to take a webshot.");
					//截图操作
					$this->serveWebshot();
				//如果配置文件不允许截图
				} else {
				  	//记录错误信息并退出
					$this->error("You added the webshot parameter but webshots are disabled on this server. You need to set WEBSHOT_ENABLED == true to enable webshots.");
				}
			//如果不存在sebshot参数或为假
			} else {
			  	//写日志，记录不进行截图操作，级别3
			  	$this->debug(3, "webshot is NOT set so we're going to try to fetch a regular image.");
				//从外部URL获得<strong><strong>图片</strong></strong>并<strong>处理</strong>
				$this->serveExternalImage();

			}
		//否则的话就是内部<strong><strong>图片</strong></strong>
		} else {
		  	//写日志，记录是内部<strong><strong>图片</strong></strong>，级别3
		  	$this->debug(3, "Got request for internal image. Starting serveInternalImage()");
			//获得内部<strong><strong>图片</strong></strong>并<strong>处理</strong>
			$this->serveInternalImage();
		}
		//程序执行完毕
		return true;
	}
	/*此函数用来<strong>处理</strong>错误*/
	protected function handleErrors(){
	  	//如果错误列表中有内容
	  	if($this->haveErrors()){
			//首先检测404错误，如果设置了404<strong><strong>图片</strong></strong>地址并且的确有404错误
		  	if(NOT_FOUND_IMAGE && $this->is404()){
				//那么输出错误<strong><strong>图片</strong></strong>，并退出脚本
				if($this->serveImg(NOT_FOUND_IMAGE)){
				  	exit(0);
				//输出失败的话记录错误信息
				} else {
					$this->error("Additionally, the 404 image that is configured could not be found or there was an error serving it.");
				}
			}
			//如果没有404错误，并且定义了错误<strong><strong>图片</strong></strong>，那么输出此<strong><strong>图片</strong></strong>
			if(ERROR_IMAGE){
			  	//输出其他错误提示<strong><strong>图片</strong></strong>，并退出脚本
				if($this->serveImg(ERROR_IMAGE)){
				  	exit(0);
				//输出失败的话记录错误信息
				} else {
					$this->error("Additionally, the error image that is configured could not be found or there was an error serving it.");
				}
			}
			//如果上面两个常量都没定义，则根据模板输出详细错误信息
			$this->serveErrors(); 
			exit(0); 
		}
		//没有错误的话返回假
		return false;
	}
	/*此函数用来读取浏览器缓存文件，前提是浏览器缓存的文件有效，具体的实现请看函数内部*/
	protected function tryBrowserCache(){
	  	//如果配置文件关闭了所有浏览器缓存，则写日志，并返回假
	  	if(BROWSER_CACHE_DISABLE){ 
		  	$this->debug(3, "Browser caching is disabled"); return false; 
		}
		//如果浏览器记录了页面上次修改的时间
		if(!empty($_SERVER['HTTP_IF_MODIFIED_SINCE']) ){
		  	//写日志，记录，级别3
		  	$this->debug(3, "Got a conditional get");
			//缓存文件最后修改时间
			$mtime = false;
			//如果缓存地址无效
			if(! is_file($this->cachefile)){
				//说明没有缓存，返回假
				return false;
			}
			//如果存在本地<strong><strong>图片</strong></strong>修改时间，也就是说所请求的<strong><strong>图片</strong></strong>是本机的
			if($this->localImageMTime){
			  	//缓存文件修改时间设置为本地<strong><strong>图片</strong></strong>修改时间
			  	$mtime = $this->localImageMTime;
				//写日志，记录实际文件修改时间，级别3
				$this->debug(3, "Local real file's modification time is $mtime");
			//如果请求的<strong><strong>图片</strong></strong>不是本地的
			} else if(is_file($this->cachefile)){
			  	//获取缓存文件修改时间
			  	$mtime = @filemtime($this->cachefile);
				//写日志，记录缓存文件修改时间，级别3
				$this->debug(3, "Cached file's modification time is $mtime");
			}
			//如果没有获取到缓存文件最后修改时间，说明没有缓存，退出
			if(! $mtime){ return false; }
			//将浏览器中存储的上次修改时间转为时间戳
			$iftime = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);
			//写日志，记录UNIX时间戳，级别3
			$this->debug(3, "The conditional get's if-modified-since unixtime is $iftime");
			//如果这个时间小于1秒，说明值无效，退出
			if($iftime < 1){
			  	//写日志，记录此值无效
				$this->debug(3, "Got an invalid conditional get modified since time. Returning false.");
				return false;
			}
			//如果浏览器存储的时间小于实际缓存文件的最后修改时间，也就是说距上次访问后，文件被更改了，要重新请求页面
			if($iftime < $mtime){
			  	//写日志，记录文件已被更改，级别3
				$this->debug(3, "File has been modified since last fetch.");
				return false;
			//否则就不用重新请求页面，直接读取缓存
			} else {
			  	//写日志，记录缓存有效，直接读取缓存，级别3
			  	$this->debug(3, "File has not been modified since last get, so serving a 304.");
				//设置HTTP头响应码为304
				header ($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
				//记录此次操作，级别1
				$this->debug(1, "Returning 304 not modified");
				//读取成功返回真
				return true;
			}
		}
		//没有读取到缓存，返回假
		return false;
	}
	/*此函数用来运行缓存文件的GC和读取服务器上的缓存文件*/
	protected function tryServerCache(){
	  	//写日志，记录将读取服务端缓存，级别3
	  	$this->debug(3, "Trying server cache");
	  	//如果缓存文件存在
		if(file_exists($this->cachefile)){
		  	//写日志，记录缓存文件存在
		  	$this->debug(3, "Cachefile {$this->cachefile} exists");
			//如果请求的是外部<strong><strong>图片</strong></strong>地址
			if($this->isURL){
			  	//写日志，记录这是一次外部请求，级别3
			  	$this->debug(3, "This is an external request, so checking if the cachefile is empty which means the request failed previously.");
				//如果缓存文件的大小小于1，也就是说是一个无效的缓存文件
				if(filesize($this->cachefile) < 1){
				  	//写日志，记录这是一个空的缓存文件，级别3
					$this->debug(3, "Found an empty cachefile indicating a failed earlier request. Checking how old it is.");
					//如果已到了配置文件中清理无效缓存的时间
					if(time() - @filemtime($this->cachefile) > WAIT_BETWEEN_FETCH_ERRORS){
					  	//写日志，记录这次删除操作，级别3
					  	$this->debug(3, "File is older than " . WAIT_BETWEEN_FETCH_ERRORS . " seconds. Deleting and returning false so app can try and load file.");
						//删除此缓存文件
						@unlink($this->cachefile);
						//返回假，说明没有读取到服务端缓存
						return false;
					//否则，空的缓存文件说明上次请求失败，所以要写错误记录
					} else {
					  	//写日志，记录空的缓存文件依然有效，级别3
					  	$this->debug(3, "Empty cachefile is still fresh so returning message saying we had an error fetching this image from remote host.");
						//设置404错误
						$this->set404();
						//设置错误信息
						$this->error("An error occured fetching image.");
						//返回假代表没有得到缓存
						return false; 
					}
				}
			//否则就是正确的缓存文件
			} else {
			  	//写日志，记录将要直接读取缓存文件，级别3
				$this->debug(3, "Trying to serve cachefile {$this->cachefile}");
			}
			//如果输出图像缓存成功
			if($this->serveCacheFile()){
			  	//写日志，记录缓存文件信息，级别3
				$this->debug(3, "Succesfully served cachefile {$this->cachefile}");
				return true;
			//如果不成功
			} else {
			  	//写日志，记录错误信息，级别3
				$this->debug(3, "Failed to serve cachefile {$this->cachefile} - Deleting it from cache.");
				//删除此无效缓存，以便下次请求能重新创建
				@unlink($this->cachefile);
				//同样返回真,因为在serverCacheFile已经记录了错误信息
				return true;
			}
		}
	}
	/*此函数用来记录错误信息*/
	protected function error($err){
	  	//写记录，记录错误信息，级别3
	  	$this->debug(3, "Adding error message: $err");
		//记录到错误信息数组
		$this->errors[] = $err;
		return false;
	}
	/*测函数用来检测存储错误信息的数组中是否有内容，也就是说在上一个操作中，是否有错误*/
	protected function haveErrors(){
		if(sizeof($this->errors) > 0){
			return true;
		}
		return false;
	}
	/*此函数输出已存储的错误信息*/
	protected function serveErrors(){
	  	//设置http头
	  header ($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
	  	//循环输出错误列表信息
		$html = '<ul>';
		foreach($this->errors as $err){
			$html .= '<li>' . htmlentities($err) . '</li>';
		}
		$html .= '</ul>';
		//输出其他错误信息
		echo '<h1>A TimThumb error has occured</h1>The following error(s) occured:<br />' . $html . '<br />';
		echo '<br />Query String : ' . htmlentities ($_SERVER['QUERY_STRING']);
		echo '<br />TimThumb version : ' . VERSION . '</pre>';
	}
	/*此函数用来读取本地<strong><strong>图片</strong></strong>*/
	protected function serveInternalImage(){
	  	//写日志，记录本地<strong><strong>图片</strong></strong>地址
	  	$this->debug(3, "Local image path is $this->localImage");
	  	//如果地址无效
		if(! $this->localImage){
		  	//记录此错误，并退出执行
			$this->sanityFail("localImage not set after verifying it earlier in the code.");
			return false;
		}
		//获取本地<strong><strong>图片</strong></strong>大小
		$fileSize = filesize($this->localImage);
		//如果本地<strong><strong>图片</strong></strong>的尺寸超过配置文件的相关设置
		if($fileSize > MAX_FILE_SIZE){
		  	//记录错误原因，并退出
			$this->error("The file you specified is greater than the maximum allowed file size.");
			return false;
		}
		//如果获取到的<strong><strong>图片</strong></strong>尺寸无效
		if($fileSize <= 0){
		  	//记录错误并退出
			$this->error("The file you specified is <= 0 bytes.");
			return false;
		}
		//如果通过了以上验证，则写日志，记录将用processImageAndWriteToCache函数<strong>处理</strong>本地<strong><strong>图片</strong></strong>
		$this->debug(3, "Calling processImageAndWriteToCache() for local image.");
		//<strong>处理</strong>成功则从缓存返回<strong><strong>图片</strong></strong>
		if($this->processImageAndWriteToCache($this->localImage)){
			$this->serveCacheFile();
			return true;
		//失败则返回假
		} else { 
			return false;
		}
	}
	/*此函数用来清理缓存*/
	protected function cleanCache(){
		//如果定义的缓存时间小于0，则退出
		if (FILE_CACHE_TIME_BETWEEN_CLEANS < 0) {
			return;
		}
		//写日志，记录清除缓存操作，级别3
		$this->debug(3, "cleanCache() called");
		//此文件为记录上次进行清除缓存操作的时间戳文件
		$lastCleanFile = $this->cacheDirectory . '/timthumb_cacheLastCleanTime.touch';
		
		//如果上面定义的文件不存在，说明这是第一次进行清除缓存操作，创建此文件并返回空即可
		if(! is_file($lastCleanFile)){
		  	//写日志，记录创建文件，级别1
		  	$this->debug(1, "File tracking last clean doesn't exist. Creating $lastCleanFile");
			//创建此文件
			if (!touch($lastCleanFile)) {
			  	//失败的话报错并退出
				$this->error("Could not create cache clean timestamp file.");
			}
			return;
		}
		//如果已超过缓存时间
		if(@filemtime($lastCleanFile) < (time() - FILE_CACHE_TIME_BETWEEN_CLEANS) ){
		  	//写日志，记录下面进行的清除缓存操作
			$this->debug(1, "Cache was last cleaned more than " . FILE_CACHE_TIME_BETWEEN_CLEANS . " seconds ago. Cleaning now.");
			//创建新的清除缓存时间戳文件
			if (!touch($lastCleanFile)) {
			  	//失败的话记录错误信息
				$this->error("Could not create cache clean timestamp file.");
			}
			//此数组存的是所有缓存文件，根据前面定义的缓存文件目录和缓存文件后缀得到的
			$files = glob($this->cacheDirectory . '/*' . FILE_CACHE_SUFFIX);
			//如果有缓存文件
			if ($files) {
			  	//计算当前时间和缓存最大生存时间的差值，用于下面判断缓存文件是否删除
			  	$timeAgo = time() - FILE_CACHE_MAX_FILE_AGE;
				//遍历缓存文件数组
				foreach($files as $file){
				  	//如果文件创建时间小于上面计算的值，也就是说此缓存文件的死期到了，就删除它
				  	if(@filemtime($file) < $timeAgo){
				    		//记录删除缓存文件，级别3
						$this->debug(3, "Deleting cache file $file older than max age: " . FILE_CACHE_MAX_FILE_AGE . " seconds");
						@unlink($file);
					}
				}
			}
			return true;
		//如果没超过缓存时间，则不用清除
		} else {
		  	//写日志，记录不用清除缓存
			$this->debug(3, "Cache was cleaned less than " . FILE_CACHE_TIME_BETWEEN_CLEANS . " seconds ago so no cleaning needed.");
		}
		return false;
	}
	/*核心函数，<strong>处理</strong><strong><strong>图片</strong></strong>并写入缓存*/
	protected function processImageAndWriteToCache($localImage){
	  	//获取<strong><strong>图片</strong></strong>信息
	  	$sData = getimagesize($localImage);
		//图像类型标记
		$origType = $sData[2];
		//mime类型
		$mimeType = $sData['mime'];
		//写日志，记录传入图像的mime类型
		$this->debug(3, "Mime type of image is $mimeType");
		//进行图像mime类型验证，只允许gif , jpg 和 png
		if(! preg_match('/^image\/(?:gif|jpg|jpeg|png)$/i', $mimeType)){
		  	//如果不是这四种类型，记录错误信息，并退出脚本
			return $this->error("The image being resized is not a valid gif, jpg or png.");
		}
		//<strong><strong>图片</strong></strong><strong>处理</strong>需要GD库支持，这里检测是否安装了GD库
		if (!function_exists ('imagecreatetruecolor')) {
		    //没有安装的话推出脚本
		    return $this->error('GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library');
		}
		//如果安装了GD库，并且支持图像过滤器函数imagefilter，且支持IMG_FILTER_NEGATE常量
		if (function_exists ('imagefilter') && defined ('IMG_FILTER_NEGATE')) {
		  	//定义一个过滤器效果数组，后面的数字代表需要额外传入的参数
		  	$imageFilters = array (
		    		//负片
			  	1 => array (IMG_FILTER_NEGATE, 0),
				//黑白的
				2 => array (IMG_FILTER_GRAYSCALE, 0),
				//亮度级别
				3 => array (IMG_FILTER_BRIGHTNESS, 1),
				//对比度级别
				4 => array (IMG_FILTER_CONTRAST, 1),
				//图像转换为制定颜色
				5 => array (IMG_FILTER_COLORIZE, 4),
				//突出边缘
				6 => array (IMG_FILTER_EDGEDETECT, 0),
				//浮雕
				7 => array (IMG_FILTER_EMBOSS, 0),
				//用高斯算法模糊图像
				8 => array (IMG_FILTER_GAUSSIAN_BLUR, 0),
				//模糊图像
				9 => array (IMG_FILTER_SELECTIVE_BLUR, 0),
				//平均移除法来达到轮廓效果
				10 => array (IMG_FILTER_MEAN_REMOVAL, 0),
				//平滑<strong>处理</strong>
				11 => array (IMG_FILTER_SMOOTH, 0),
			);
		}

		//生成<strong><strong>图片</strong></strong>宽度，由get中w参数指定，默认为0		
		$new_width =  (int) abs ($this->param('w', 0));
		//生成<strong><strong>图片</strong></strong>高度，由get中h参数指定，默认为0
		$new_height = (int) abs ($this->param('h', 0));
		//生成<strong><strong>图片</strong></strong>缩放模式，由get中zc参数指定，默认为配置文件中DEFAULT_ZC的值
		$zoom_crop = (int) $this->param('zc', DEFAULT_ZC);
		//生成<strong><strong>图片</strong></strong>的质量，由get中q参数指定，默认为配置文件中DEFAULT_Q的值
		$quality = (int) abs ($this->param('q', DEFAULT_Q));
		//裁剪的位置
		$align = $this->cropTop ? 't' : $this->param('a', 'c');
		//需要进行的<strong><strong>图片</strong></strong><strong>处理</strong>操作，多个过滤器用"|"分割，可选参数请参看$imageFilters处的注释，由于不同的过滤器需要的参数不同，如一个过滤器需要多个参数，多个参数用,分隔。例:1,2|3,1,1  代表对图像分别应用1和3过滤效果，1和3所对应的过滤效果是由$imageFilters数组确定的，其中1号过滤器还需要一个额外的参数，这里传了1，3号过滤器还需要2个额外的参数，这里传了1和1.
		$filters = $this->param('f', DEFAULT_F);
		//是否对<strong><strong>图片</strong></strong>进行锐化，由get中s参数指定，默认为配置文件中DEFAULT_S的值
		$sharpen = (bool) $this->param('s', DEFAULT_S);
		//生成<strong><strong>图片</strong></strong>的默认背景画布颜色，由get中cc参数指定，默认为配置文件中DEFAULT_CC的值
		$canvas_color = $this->param('cc', DEFAULT_CC);
		//生成png<strong><strong>图片</strong></strong>的背景是否透明
		$canvas_trans = (bool) $this->param('ct', '1');

		// 如果高度和宽度都没有指定，设置他们为100*100
		if ($new_width == 0 && $new_height == 0) {
		    $new_width = 100;
		    $new_height = 100;
		}

		// 限制最大高度和最大宽度
		$new_width = min ($new_width, MAX_WIDTH);
		$new_height = min ($new_height, MAX_HEIGHT);

		// 检测并设置php运行最大占用内存
		$this->setMemoryLimit();

		// 打开图像资源
		$image = $this->openImage ($mimeType, $localImage);
		//如果打开失败，记录信息并退出脚本
		if ($image === false) {
			return $this->error('Unable to open image.');
		}

		// 获得原始<strong><strong>图片</strong></strong>，也就是上面打开<strong><strong>图片</strong></strong>的宽和高
		$width = imagesx ($image);
		$height = imagesy ($image);
		$origin_x = 0;
		$origin_y = 0;

		// 如果新生成<strong><strong>图片</strong></strong>的宽或高没有指定，则用此等比算法算出高或宽的值
		if ($new_width && !$new_height) {
			$new_height = floor ($height * ($new_width / $width));
		} else if ($new_height && !$new_width) {
			$new_width = floor ($width * ($new_height / $height));
		}

		// 如果缩放模式选择的是3，也就是说get中zc=3或者配置文件中DEFAULT_ZC=3，则进行等比缩放,不裁剪
		if ($zoom_crop == 3) {

			$final_height = $height * ($new_width / $width);
			//根据等比算法设置等比计算后的宽或高
			if ($final_height > $new_height) {
				$new_width = $width * ($new_height / $height);
			} else {
				$new_height = $final_height;
			}

		}

		// 利用<strong>处理</strong>完毕的长和宽创建新画布，
		$canvas = imagecreatetruecolor ($new_width, $new_height);
		//关闭混色模式，也就是把PNG的alpha值保存，从而使背景透明
		imagealphablending ($canvas, false);
		//进行默认画布颜色的检测并转换，如果给出的是3个字符长度表示的颜色值
		if (strlen($canvas_color) == 3) { //if is 3-char notation, edit string into 6-char notation
		  	//转换为6个字符表示的颜色值
		  	$canvas_color =  str_repeat(substr($canvas_color, 0, 1), 2) . str_repeat(substr($canvas_color, 1, 1), 2) . str_repeat(substr($canvas_color, 2, 1), 2); 
		//如果不是3个长度也不是6个长度的字符串，则为非法字符串，设置为默认值
		} else if (strlen($canvas_color) != 6) {
			$canvas_color = DEFAULT_CC;
 		}
		//将上面得到的R 、G 、B 三种颜色值转换为10进制表示
		$canvas_color_R = hexdec (substr ($canvas_color, 0, 2));
		$canvas_color_G = hexdec (substr ($canvas_color, 2, 2));
		$canvas_color_B = hexdec (substr ($canvas_color, 4, 2));

		// 如果传入<strong><strong>图片</strong></strong>的格式是png，并且配置文件设置png背景颜色为透明，并且在get传入了ct的值为真，那么就设置背景颜色为透明
		if(preg_match('/^image\/png$/i', $mimeType) && !PNG_IS_TRANSPARENT && $canvas_trans){ 
		  	$color = imagecolorallocatealpha ($canvas, $canvas_color_R, $canvas_color_G, $canvas_color_B, 127);
		//反之设置为不透明
		}else{
			$color = imagecolorallocatealpha ($canvas, $canvas_color_R, $canvas_color_G, $canvas_color_B, 0);
		}

		// 使用分配的颜色填充背景
		imagefill ($canvas, 0, 0, $color);
		

		// 如果缩放模式选择的是2，那么画布的体积是按传入的值创建的，并计算出边框的宽度
		if ($zoom_crop == 2) {
		  	//等比缩放的高度
			$final_height = $height * ($new_width / $width);
			//如果计算出的等比高度，大于传入的高度
			if ($final_height > $new_height) {
				//origin_x等于传入的新高度的二分之一
			  	$origin_x = $new_width / 2;
			  	//设置新宽度为等比计算出的值
				$new_width = $width * ($new_height / $height);
				//计算出两次origin_x的差值
				$origin_x = round ($origin_x - ($new_width / 2));
			//否则，计算出两次origin_y的差值
			} else {
				$origin_y = $new_height / 2;
				$new_height = $final_height;
				$origin_y = round ($origin_y - ($new_height / 2));

			}

		}

		// 保存图像时保存完整的alpha信息
		imagesavealpha ($canvas, true);

		//如果缩放模式选择的是1或2或3
		if ($zoom_crop > 0) {

		  	$src_x = $src_y = 0;
			//<strong><strong>图片</strong></strong>原宽度
			$src_w = $width;
			//<strong><strong>图片</strong></strong>原高度
			$src_h = $height;

			//<strong><strong>图片</strong></strong>纵横比
			$cmp_x = $width / $new_width;
			$cmp_y = $height / $new_height;

			//裁剪算法
			if ($cmp_x > $cmp_y) {
				$src_w = round ($width / $cmp_x * $cmp_y);
				$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

			} else if ($cmp_y > $cmp_x) {

				$src_h = round ($height / $cmp_y * $cmp_x);
				$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

			}

			// 根据传入参数算出裁剪的位置
			if ($align) {
				if (strpos ($align, 't') !== false) {
					$src_y = 0;
				}
				if (strpos ($align, 'b') !== false) {
					$src_y = $height - $src_h;
				}
				if (strpos ($align, 'l') !== false) {
					$src_x = 0;
				}
				if (strpos ($align, 'r') !== false) {
					$src_x = $width - $src_w;
				}
			}

			//将图像根据算法进行裁剪，并拷贝到背景<strong><strong>图片</strong></strong>上
			imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

		} else {

			//裁剪模式选择的是0，则不进行裁剪，并生成图像
			imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		}
		//如果定义了<strong><strong>图片</strong></strong><strong>处理</strong>操作，并且支持<strong><strong>图片</strong></strong><strong>处理</strong>函数
		if ($filters != '' && function_exists ('imagefilter') && defined ('IMG_FILTER_NEGATE')) {
			// 分割每个过滤<strong>处理</strong>
			$filterList = explode ('|', $filters);
			foreach ($filterList as $fl) {
			  	//分割一个过滤操作中的参数
			  	$filterSettings = explode (',', $fl);
				//如果所选的过滤操作存在
				if (isset ($imageFilters[$filterSettings[0]])) {
					//将所有参数转为int类型
					for ($i = 0; $i < 4; $i ++) {
						if (!isset ($filterSettings[$i])) {
							$filterSettings[$i] = null;
						} else {
							$filterSettings[$i] = (int) $filterSettings[$i];
						}
					}
					//根据$imageFilters中定义的每个过滤效果需要的参数的不同，对图像应用过滤器效果
					switch ($imageFilters[$filterSettings[0]][1]) {

						case 1:

							imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1]);
							break;

						case 2:

							imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2]);
							break;

						case 3:

							imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2], $filterSettings[3]);
							break;

						case 4:

							imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2], $filterSettings[3], $filterSettings[4]);
							break;

						default:

							imagefilter ($canvas, $imageFilters[$filterSettings[0]][0]);
							break;

					}
				}
			}
		}

		// 如果设置了锐化值，并且系统支持锐化函数，则进行锐化操作
		if ($sharpen && function_exists ('imageconvolution')) {

			$sharpenMatrix = array (
					array (-1,-1,-1),
					array (-1,16,-1),
					array (-1,-1,-1),
					);

			$divisor = 8;
			$offset = 0;

			imageconvolution ($canvas, $sharpenMatrix, $divisor, $offset);

		}
		//如果<strong><strong>图片</strong></strong>是PNG或者GIF，则用imagetruecolortopalette来减小他们的体积
		if ( (IMAGETYPE_PNG == $origType || IMAGETYPE_GIF == $origType) && function_exists('imageistruecolor') && !imageistruecolor( $image ) && imagecolortransparent( $image ) > 0 ){
			imagetruecolortopalette( $canvas, false, imagecolorstotal( $image ) );
		}
		//根据生成的不同<strong><strong>图片</strong></strong>类型，生成<strong><strong>图片</strong></strong>缓存,$imgType的值用于生成安全头
		$imgType = "";
		$tempfile = tempnam($this->cacheDirectory, 'timthumb_tmpimg_');
		if(preg_match('/^image\/(?:jpg|jpeg)$/i', $mimeType)){ 
			$imgType = 'jpg';
			imagejpeg($canvas, $tempfile, $quality); 
		} else if(preg_match('/^image\/png$/i', $mimeType)){ 
			$imgType = 'png';
			imagepng($canvas, $tempfile, floor($quality * 0.09));
		} else if(preg_match('/^image\/gif$/i', $mimeType)){
			$imgType = 'gif';
			imagegif($canvas, $tempfile);
		} else {
		  	//如果不是以上三种类型，记录这次错误并退出
			return $this->sanityFail("Could not match mime type after verifying it previously.");
		}
		//优先使用optipng工具进行png<strong><strong>图片</strong></strong>的压缩，前提是你装了这个工具
		if($imgType == 'png' && OPTIPNG_ENABLED && OPTIPNG_PATH && @is_file(OPTIPNG_PATH)){
		  	//记录optipng的地址
		  	$exec = OPTIPNG_PATH;
			//写日志，记录optipng将运行，级别3
			$this->debug(3, "optipng'ing $tempfile");
			//获取<strong><strong>图片</strong></strong>大小
			$presize = filesize($tempfile);
			//进行<strong><strong>图片</strong></strong>压缩操作
			$out = `$exec -o1 $tempfile`;
		       	//清除文件状态缓存	
			clearstatcache();
			//获取压缩后的文件大小
			$aftersize = filesize($tempfile);
			//算出压缩了多大
			$sizeDrop = $presize - $aftersize;
			//根据算出的不同的值，写日志，级别1
			if($sizeDrop > 0){
				$this->debug(1, "optipng reduced size by $sizeDrop");
			} else if($sizeDrop < 0){
				$this->debug(1, "optipng increased size! Difference was: $sizeDrop");
			} else {
				$this->debug(1, "optipng did not change image size.");
			}
		//optipng不存在，就尝试使用pngcrush
		} else if($imgType == 'png' && PNGCRUSH_ENABLED && PNGCRUSH_PATH && @is_file(PNGCRUSH_PATH)){
		  	$exec = PNGCRUSH_PATH;
			//和optipng不同的是，pngcrush会将<strong>处理</strong>完的文件新生成一个文件，所以这里新建个文件
			$tempfile2 = tempnam($this->cacheDirectory, 'timthumb_tmpimg_');
			//写日志，记录文件名
			$this->debug(3, "pngcrush'ing $tempfile to $tempfile2");
			//运行pngcrush
			$out = `$exec $tempfile $tempfile2`;
			$todel = "";
			//如果生成文件成功
			if(is_file($tempfile2)){
			  	//算出压缩后的文件大小的差值
			  	$sizeDrop = filesize($tempfile) - filesize($tempfile2);
				//如果是一次有效的压缩，则将压缩后的文件作为缓存文件
				if($sizeDrop > 0){
					$this->debug(1, "pngcrush was succesful and gave a $sizeDrop byte size reduction");
					$todel = $tempfile;
					$tempfile = $tempfile2;
				//否则的话则这个文件没有存在的必要
				} else {
					$this->debug(1, "pngcrush did not reduce file size. Difference was $sizeDrop bytes.");
					$todel = $tempfile2;
				}
			//没有运行成功也需要删除这个文件
			} else {
				$this->debug(3, "pngcrush failed with output: $out");
				$todel = $tempfile2;
			}
			//删除无效文件或压缩前比较大的文件
			@unlink($todel);
		}
		//在缓存<strong><strong>图片</strong></strong>上写入安全头
		$this->debug(3, "Rewriting image with security header.");
		//创建一个新的缓存文件
		$tempfile4 = tempnam($this->cacheDirectory, 'timthumb_tmpimg_');
		//
		$context = stream_context_create ();
		//读取生成的<strong><strong>图片</strong></strong>缓存内容
		$fp = fopen($tempfile,'r',0,$context);
		//向新缓存文件写入安全头，安全头的长度应该总是$this->filePrependSecurityBlock的长度 + 6
		file_put_contents($tempfile4, $this->filePrependSecurityBlock . $imgType . ' ?' . '>');
		//将读取出来的缓存<strong><strong>图片</strong></strong>内容写入新缓存文件
		file_put_contents($tempfile4, $fp, FILE_APPEND);
		//关闭文件资源
		fclose($fp);
		//删除之前不安全的<strong><strong>图片</strong></strong>缓存文件
		@unlink($tempfile);
		//写日志，给缓存文件加锁～～
		$this->debug(3, "Locking and replacing cache file.");
		//创建锁文件文件名
		$lockFile = $this->cachefile . '.lock';
		//创建或打开锁文件
		$fh = fopen($lockFile, 'w');
		//创建失败直接退出
		if(! $fh){
			return $this->error("Could not open the lockfile for writing an image.");
		}
		//如果给锁文件加入写入锁成功
		if(flock($fh, LOCK_EX)){
		  	//删除原缓存文件
		  	@unlink($this->cachefile); 
			//重命名覆盖，将安全的缓存文件作为缓存文件
			rename($tempfile4, $this->cachefile);
			//释放写入锁
			flock($fh, LOCK_UN);
			//释放资源
			fclose($fh);
			//删除锁文件
			@unlink($lockFile);
		//否则
		} else {
		  	//关闭资源
		  	fclose($fh);
			//删除锁文件
			@unlink($lockFile);
			//删除安全的缓存文件
			@unlink($tempfile4);
			//记录错误并退出
			return $this->error("Could not get a lock for writing.");
		}
		//写日志，记录操作完成
		$this->debug(3, "Done image replace with security header. Cleaning up and running cleanCache()");
		//释放<strong><strong>图片</strong></strong>资源
		imagedestroy($canvas);
		imagedestroy($image);
		//生成缓存成功返回真
		return true;
	}
	/*此函数用来获取服务器文档根目录*/
	protected function calcDocRoot(){
	  	//直接获取文档根目录
	  	$docRoot = @$_SERVER['DOCUMENT_ROOT'];
		//如果定义了LOCAL_FILE_BASE_DIRECTORY，则使用此值
		if (defined('LOCAL_FILE_BASE_DIRECTORY')) {
			$docRoot = LOCAL_FILE_BASE_DIRECTORY;   
		}
		//如果没有获取到文档根目录，也就是DOCUMENT_ROOT的值
		if(!isset($docRoot)){
		  	//写一条记录，说明DOCUMENT_ROOT没找到，注意level是3
		  	$this->debug(3, "DOCUMENT_ROOT is not set. This is probably windows. Starting search 1.");
			//用SCRIPT_FILENAME和PHP_SELF来得到文档根目录
			if(isset($_SERVER['SCRIPT_FILENAME'])){
			  	$docRoot = str_replace( '\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0-strlen($_SERVER['PHP_SELF'])));
				//写一条记录，说明DOCUMENT_ROOT的值是通过SCRIPT_FILENAME和PHP_SELF来得的，级别3
				$this->debug(3, "Generated docRoot using SCRIPT_FILENAME and PHP_SELF as: $docRoot");
			} 
		}
		//如果还是没有获取到文档根目录
		if(!isset($docRoot)){
		  	//先写一条记录，说明还是没得到DOCUMENT_ROOT，级别3
		  	$this->debug(3, "DOCUMENT_ROOT still is not set. Starting search 2.");
			//通过PATH_TRANSLATED和PHP_SELF来得到文档根目录，关于PATH_TRANSLATED的说明可以看这里：http://blogs.msdn.com/b/david.wang/archive/2005/08/04/what-is-path-translated.aspx
			if(isset($_SERVER['PATH_TRANSLATED'])){
			  	$docRoot = str_replace( '\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0-strlen($_SERVER['PHP_SELF'])));
				//写记录，说明说明DOCUMENT_ROOT的值是通过PATH_TRANSLATED和PHP_SELF来得的，级别3
				$this->debug(3, "Generated docRoot using PATH_TRANSLATED and PHP_SELF as: $docRoot");
			} 
		}
		//如果文档根目录不是服务器根目录，则去掉最后一个 '/'
		if($docRoot && $_SERVER['DOCUMENT_ROOT'] != '/'){ $docRoot = preg_replace('/\/$/', '', $docRoot); }
		//写记录，说明文档根目录的值，级别3
		$this->debug(3, "Doc root is: " . $docRoot);
		//赋值给成员属性
		$this->docRoot = $docRoot;

	}

	/*此函数用来获取本地<strong><strong>图片</strong></strong>地址，参数src是相对与文档根目录的地址*/
	protected function getLocalImagePath($src){
	  	//去掉开头的 / 
	 	 $src = ltrim($src, '/');
		 //如果前面没有获取到文档根目录，出于安全考虑，那么这里只能对timthumbs.php所在的目录下的<strong><strong>图片</strong></strong>进行操作
		 if(! $this->docRoot){
		   	//写日志，级别3，说明下面进行<strong><strong>图片</strong></strong>地址的检查
			$this->debug(3, "We have no document root set, so as a last resort, lets check if the image is in the current dir and serve that.");
			//获取去掉所有路径信息的文件名
			$file = preg_replace('/^.*?([^\/\\\\]+)$/', '$1', $src); 
			//如果<strong><strong>图片</strong></strong>文件和timthumb.php在同一目录下
			if(is_file($file)){
			  	//返回此<strong><strong>图片</strong></strong>的路径
				return $this->realpath($file);
			}
			//如果<strong><strong>图片</strong></strong>文件和timthumb.php不在同一目录下，写错误信息，出于安全考虑，不会允许一个没有文档根目录并且在timthumbs.php所在的目录以外的文件
			return $this->error("Could not find your website document root and the file specified doesn't exist in timthumbs directory. We don't support serving files outside timthumb's directory without a document root for security reasons.");
		}

		 //尝试找这张<strong><strong>图片</strong></strong>，如果<strong><strong>图片</strong></strong>地址存在
		 if(file_exists ($this->docRoot . '/' . $src)) {
		   	//写日志，记录文件地址，级别3
		   	$this->debug(3, "Found file as " . $this->docRoot . '/' . $src);
			//返回<strong><strong>图片</strong></strong>路径
			$real = $this->realpath($this->docRoot . '/' . $src);
			//验证<strong><strong>图片</strong></strong>路径是否在本机
			if(stripos($real, $this->docRoot) === 0){
			  	//是的话返回<strong><strong>图片</strong></strong>地址
				return $real;
			} else {
			  	//否则写日志，没找到指定文件，级别1
				$this->debug(1, "Security block: The file specified occurs outside the document root.");
			}
		}

		//接着找。。。
		 $absolute = $this->realpath('/' . $src);
		 //如果决定地址存在
		 if($absolute && file_exists($absolute)){
		  	//写日志，记录<strong><strong>图片</strong></strong>绝对地址，级别3 
		   	$this->debug(3, "Found absolute path: $absolute");
			//如果文档根目录没有定义，记录这个错误信息
			if(! $this->docRoot){ $this->sanityFail("docRoot not set when checking absolute path."); }
			//验证<strong><strong>图片</strong></strong>路径是否在本机
			if(stripos($absolute, $this->docRoot) === 0){
				//在的话返回<strong><strong>图片</strong></strong>地址    
				return $absolute;
			} else {
			  	//否则写日志，没找到指定的文件，级别1
				$this->debug(1, "Security block: The file specified occurs outside the document root.");
			}
		}

		//如果还没找到指定文件，则逐级向上查找
		$base = $this->docRoot;
		
		// 获取查询子目录列表
		if (strstr($_SERVER['SCRIPT_FILENAME'],':')) {
			$sub_directories = explode('\\', str_replace($this->docRoot, '', $_SERVER['SCRIPT_FILENAME']));
		} else {
			$sub_directories = explode('/', str_replace($this->docRoot, '', $_SERVER['SCRIPT_FILENAME']));
		}
		//遍历子目录数组
		foreach ($sub_directories as $sub){
		  	//重新组合请求地址
		  	$base .= $sub . '/';
			//写日志，记录搜索记录，级别3
			$this->debug(3, "Trying file as: " . $base . $src);
			//如果找到了这个文件
			if(file_exists($base . $src)){
			  	//写日志，记录文件地址，级别3
			  	$this->debug(3, "Found file as: " . $base . $src);
				//得到实际地址
				$real = $this->realpath($base . $src);
				//如果实际地址的确在本机中，那么返回这个地址
				if(stripos($real, $this->realpath($this->docRoot)) === 0){
					return $real;
				} else {
				  	//找不到就写日志，没找到,级别1
					$this->debug(1, "Security block: The file specified occurs outside the document root.");
				}
			}
		}
		//还找不到的话，就返回false;
		return false;
	}
	/*此函数用来获得传入文件参数的真实路径*/
	protected function realpath($path){
		//去除路径中带有..的相对路径
		$remove_relatives = '/\w+\/\.\.\//';
		while(preg_match($remove_relatives,$path)){
		    $path = preg_replace($remove_relatives, '', $path);
		}
		//如果去除后路径中仍有..的相对路径，则用realpath函数返回路径，否则直接返回即可
		return preg_match('#^\.\./|/\.\./#', $path) ? realpath($path) : $path;
	}
	/*此函数用来记录在析构函数中需要删除的资源列表*/
	protected function toDelete($name){
	  	//写日志，记录需要删除的文件信息
	  	$this->debug(3, "Scheduling file $name to delete on destruct.");
		//添加到待删除数组
		$this->toDeletes[] = $name;
	}
	/*此函数是截图操作的具体实现*/
	protected function serveWebshot(){
	  	//写日志，记录开始截图操作，级别3
	  	$this->debug(3, "Starting serveWebshot");
		//一段提示文字，可以到http://code.google.com/p/timthumb/上按照教程进行网站截图设置
		$instr = "Please follow the instructions at http://code.google.com/p/timthumb/ to set your server up for taking website screenshots.";
		//如果CutyCapt不存在
		if(! is_file(WEBSHOT_CUTYCAPT)){
		  	//退出执行并记录，CutyCapt未被安装
			return $this->error("CutyCapt is not installed. $instr");
		}
		//如果xvfb不存在
		if(! is_file(WEBSHOT_XVFB)){
		  	//退出执行并记录，xvfb未被安装
			return $this->Error("Xvfb is not installed. $instr");
		}
		//CUTYCAPT地址
		$cuty = WEBSHOT_CUTYCAPT;
		//xvfb地址
		$xv = WEBSHOT_XVFB;
		//截图屏幕宽度
		$screenX = WEBSHOT_SCREEN_X;
		//截图屏幕高度
		$screenY = WEBSHOT_SCREEN_Y;
		//截图色深
		$colDepth = WEBSHOT_COLOR_DEPTH;
		//截图保存格式
		$format = WEBSHOT_IMAGE_FORMAT;
		//截图超时时间，单位ms
		$timeout = WEBSHOT_TIMEOUT * 1000;
		//USER_AGENT头
		$ua = WEBSHOT_USER_AGENT;
		//是否启用js
		$jsOn = WEBSHOT_JAVASCRIPT_ON ? 'on' : 'off';
		//是否启用java
		$javaOn = WEBSHOT_JAVA_ON ? 'on' : 'off';
		//是否启用其他插件
		$pluginsOn = WEBSHOT_PLUGINS_ON ? 'on' : 'off';
		//是否启用代理
		$proxy = WEBSHOT_PROXY ? ' --http-proxy=' . WEBSHOT_PROXY : '';
		//在缓存文件目录，建立一个具有唯一文件名的文件，文件名前缀为timthumb_webshot，用户存储截图后的<strong><strong>图片</strong></strong>
		$tempfile = tempnam($this->cacheDirectory, 'timthumb_webshot');
		//目标网站地址
		$url = $this->src;
		//验证url合法性
		if(! preg_match('/^https?:\/\/[a-zA-Z0-9\.\-]+/i', $url)){
		  	//不合法退出执行
			return $this->error("Invalid URL supplied.");
		}
		//过滤掉非法字符
		$url = preg_replace('/[^A-Za-z0-9\-\.\_\~:\/\?\#\[\]\@\!\$\&\'\(\)\*\+\,\;\=]+/', '', $url);
		//优先使用CUTYCAPT
		if(WEBSHOT_XVFB_RUNNING){
		  	//设置系统变量，配置图形输出显示。
		  	putenv('DISPLAY=:100.0');
			//组装shell命令
			$command = "$cuty $proxy --max-wait=$timeout --user-agent=\"$ua\" --javascript=$jsOn --java=$javaOn --plugins=$pluginsOn --js-can-open-windows=off --url=\"$url\" --out-format=$format --out=$tempfile";
		//否则使用XVFB
		} else {
			$command = "$xv --server-args=\"-screen 0, {$screenX}x{$screenY}x{$colDepth}\" $cuty $proxy --max-wait=$timeout --user-agent=\"$ua\" --javascript=$jsOn --java=$javaOn --plugins=$pluginsOn --js-can-open-windows=off --url=\"$url\" --out-format=$format --out=$tempfile";
		}
		//写日志，记录执行的命令，级别3
		$this->debug(3, "Executing command: $command");
		//执行命令并捕获输出
		$out = `$command`;
		//写日志，记录输出，级别3
		$this->debug(3, "Received output: $out");
		//如果刚刚创建的唯一文件名的文件失败
		if(! is_file($tempfile)){
		  	//设置404错误
		  	$this->set404();
		  	//推出脚本
			return $this->error("The command to create a thumbnail failed.");
		}
		//启用裁剪
		$this->cropTop = true;
		//对截取到的<strong><strong>图片</strong></strong>文件<strong>处理</strong>并生成缓存
		if($this->processImageAndWriteToCache($tempfile)){
		  	//成功的话写日志，并从缓存读取此<strong><strong>图片</strong></strong>
		  	$this->debug(3, "Image processed succesfully. Serving from cache");
			//返回从缓存中读取的文件内容
			return $this->serveCacheFile();
		//没成功就返回假咯
		} else {
			return false;
		}
	}
	/*此函数用来从外部url获取图像*/
	protected function serveExternalImage(){
	  	//验证url合法性
		if(! preg_match('/^https?:\/\/[a-zA-Z0-9\-\.]+/i', $this->src)){
			$this->error("Invalid URL supplied.");
			return false;
		}
		//生成临时缓存文件
		$tempfile = tempnam($this->cacheDirectory, 'timthumb');
		//写日志，记录读取外部图像到临时文件，级别3
		$this->debug(3, "Fetching external image into temporary file $tempfile");
		//将临时缓存文件加入到待删除列表
		$this->toDelete($tempfile);
		//请求url并将结果写入到临时缓存文件中，如果没有成功
		if(! $this->getURL($this->src, $tempfile)){
		  	//删除此缓存文件
		  	@unlink($this->cachefile);
			//再创建一个新的缓存文件
			touch($this->cachefile);
			//写日志，记录错误信息，级别3
			$this->debug(3, "Error fetching URL: " . $this->lastURLError);
			//写错误信息，并退出
			$this->error("Error reading the URL you specified from remote host." . $this->lastURLError);
			return false;
		}
		//得到获取到<strong><strong>图片</strong></strong>的MIME类型
		$mimeType = $this->getMimeType($tempfile);
		//如果不在这三种类型中
		if(! preg_match("/^image\/(?:jpg|jpeg|gif|png)$/i", $mimeType)){
		  	//写日志，记录错误信息，级别3
		  	$this->debug(3, "Remote file has invalid mime type: $mimeType");
			//删除现有缓存文件
			@unlink($this->cachefile);
			//创建新缓存文件
			touch($this->cachefile);
			//写错误信息并退出
			$this->error("The remote file is not a valid image.");
			return false;
		}
		//<strong>处理</strong>图像并缓存
		if($this->processImageAndWriteToCache($tempfile)){
		  	$this->debug(3, "Image processed succesfully. Serving from cache");
		  	//成功的话返回缓存信息
			return $this->serveCacheFile();
		} else {
		  	//失败返回假
			return false;
		}
	}
	/*此函数用来将curl获取到的数据写入对应文件中*/
	public static function curlWrite($h, $d){
	  	//将数据写入文件
	  	fwrite(self::$curlFH, $d);
		//记录数据长度
		self::$curlDataWritten += strlen($d);
		//如果<strong><strong>图片</strong></strong>大小超过了配置文件的限制，则返回0
		if(self::$curlDataWritten > MAX_FILE_SIZE){
		  	return 0;
		//否则返回<strong><strong>图片</strong></strong>大小
		} else {
			return strlen($d);
		}
	}
	/*此函数用来读取并输出服务端缓存*/
	protected function serveCacheFile(){
	  	//写日志，记录读取缓存的地址
	  	$this->debug(3, "Serving {$this->cachefile}");
		//如果缓存地址无效
		if(! is_file($this->cachefile)){
		  	//添加到错误记录
		  	$this->error("serveCacheFile called in timthumb but we couldn't find the cached file.");
			//停止执行脚本
			return false;
		}
		//缓存地址有效的话，已只读方式打开文件
		$fp = fopen($this->cachefile, 'rb');
		//如果打开失败，直接退出脚本，并记录错误信息
		if(! $fp){ return $this->error("Could not open cachefile."); }
		//设定文件指针跳过filePrependSecurityBlock值，也就是跳过安全头后开始读
		fseek($fp, strlen($this->filePrependSecurityBlock), SEEK_SET);
		//读出文件的mime类型
		$imgType = fread($fp, 3);
		//再跳过这个mime类型的值
		fseek($fp, 3, SEEK_CUR);
		//如果现在文件的指针不是在安全头后6个字符的位置，说明缓存文件可能已损坏
		if(ftell($fp) != strlen($this->filePrependSecurityBlock) + 6){
		  	//删除此缓存文件
		  	@unlink($this->cachefile);
			//记录错误并退出执行
			return $this->error("The cached image file seems to be corrupt.");
		}
		//缓存<strong><strong>图片</strong></strong>的实际大小应该是文件大小 - 安全头大小
		$imageDataSize = filesize($this->cachefile) - (strlen($this->filePrependSecurityBlock) + 6);
		//设置输出必要的HTTP头
		$this->sendImageHeaders($imgType, $imageDataSize);
		//输出文件指针处所有剩余数据
		$bytesSent = @fpassthru($fp);
		//关闭文件资源
		fclose($fp);
		//如果此方法执行成功，则返回真
		if($bytesSent > 0){
			return true;
		}
		//如果fpassthru不成功，则用file_get_contents读取并输出
		$content = file_get_contents ($this->cachefile);
		//如果读取成功
		if ($content != FALSE) {
		  	//截取掉安全头
		  	$content = substr($content, strlen($this->filePrependSecurityBlock) + 6);
			//输出图像
			echo $content;
			//写日志，记录读取缓存的方式
			$this->debug(3, "Served using file_get_contents and echo");
			return true;
		//读取失败的话记录错误信息并退出执行
		} else {
			$this->error("Cache file could not be loaded.");
			return false;
		}
	}
	/*此函数设置<strong><strong>图片</strong></strong>输出必要的http头*/
	protected function sendImageHeaders($mimeType, $dataSize){
	  	//补全<strong><strong>图片</strong></strong>的mime信息
		if(! preg_match('/^image\//i', $mimeType)){
			$mimeType = 'image/' . $mimeType;
		}
		//将jpg的mime类型写标准，这里不标准的原因是在验证文件安全头时追求了便利性
		if(strtolower($mimeType) == 'image/jpg'){
			$mimeType = 'image/jpeg';
		}
		//浏览器缓存失效时间
		$gmdate_expires = gmdate ('D, d M Y H:i:s', strtotime ('now +10 days')) . ' GMT';
		//文档最后被修改时间，用来让浏览器判断是否需要重新请求页面
		$gmdate_modified = gmdate ('D, d M Y H:i:s') . ' GMT';
		// 设置HTTP头
		header ('Content-Type: ' . $mimeType);
		header ('Accept-Ranges: none'); 
		header ('Last-Modified: ' . $gmdate_modified);
		header ('Content-Length: ' . $dataSize);
		//如果配置文件禁止浏览器缓存，则设置相应的HTTP头信息
		if(BROWSER_CACHE_DISABLE){
			$this->debug(3, "Browser cache is disabled so setting non-caching headers.");
			header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
			header("Pragma: no-cache");
			header('Expires: ' . gmdate ('D, d M Y H:i:s', time()));
		//否则按配置文件设置缓存时间
		} else {
			$this->debug(3, "Browser caching is enabled");
			header('Cache-Control: max-age=' . BROWSER_CACHE_MAX_AGE . ', must-revalidate');
			header('Expires: ' . $gmdate_expires);
		}
		//运行成功返回真
		return true;
	}
	/*自定义的验证函数*/
	protected function securityChecks(){
	}
	/*此函数用来获取$_GET数组中的参数，并允许设置默认值*/
	protected function param($property, $default = ''){
	  	//如果参数存在则返回此参数
		if (isset ($_GET[$property])) {
		  	return $_GET[$property];
		//不存在的话返回默认值
		} else {
			return $default;
		}
	}
	/*此函数根据传入mime类型，打开图像资源*/
	protected function openImage($mimeType, $src){
		switch ($mimeType) {
			case 'image/jpeg':
				$image = imagecreatefromjpeg ($src);
				break;

			case 'image/png':
				$image = imagecreatefrompng ($src);
				break;

			case 'image/gif':
				$image = imagecreatefromgif ($src);
				break;
			//不是这三种的话，脚本退出
			default:
				$this->error("Unrecognised mimeType");
		}
		//返回图像资源
		return $image;
	}
	/*没啥说的，获取客户端IP*/
	protected function getIP(){
		$rem = @$_SERVER["REMOTE_ADDR"];
		$ff = @$_SERVER["HTTP_X_FORWARDED_FOR"];
		$ci = @$_SERVER["HTTP_CLIENT_IP"];
		if(preg_match('/^(?:192\.168|172\.16|10\.|127\.)/', $rem)){ 
			if($ff){ return $ff; }
			if($ci){ return $ci; }
			return $rem;
		} else {
			if($rem){ return $rem; }
			if($ff){ return $ff; }
			if($ci){ return $ci; }
			return "UNKNOWN";
		}
	}
	/*debug运行日志函数，用来向系统日志记录操作信息*/
	protected function debug($level, $msg){
	  	//如果开启了debug，并且$level也就是调试级别小于等于配置文件中的值，则开始记录
	  	if(DEBUG_ON && $level <= DEBUG_LEVEL){
			//格式化并记录开始时间，保留小数点后6位,这个时间代表实例化类后到这个debug执行所经历的时间
		  	$execTime = sprintf('%.6f', microtime(true) - $this->startTime);
			//这个值代表从上次debug结束，到这次debug的用时
			$tick = sprintf('%.6f', 0);
			//如果上次debug时间存在，则用当前时间减去上次debug时间，得出差值
			if($this->lastBenchTime > 0){
				$tick = sprintf('%.6f', microtime(true) - $this->lastBenchTime);
			}
			//将时间更新
			$this->lastBenchTime = microtime(true);
			//将debug信息写到系统日志中
			error_log("TimThumb Debug line " . __LINE__ . " [$execTime : $tick]: $msg");
		}
	}
	/*此函数用来记录未知BUG*/
	protected function sanityFail($msg){
	  	//记录BUG信息
		return $this->error("There is a problem in the timthumb code. Message: Please report this error at <a href='http://code.google.com/p/timthumb/issues/list'>timthumb's bug tracking page</a>: $msg");
	}
	/*此函数用来返回<strong><strong>图片</strong></strong>文件的MIME信息*/
	protected function getMimeType($file){
	  	//获取<strong><strong>图片</strong></strong>文件的信息
	  	$info = getimagesize($file);
		//成功则返回MIME信息
		if(is_array($info) && $info['mime']){
			return $info['mime'];
		}
		//失败返回空
		return '';
	}
	/*此函数用来检测并设置php运行时最大占用内存的值*/
	protected function setMemoryLimit(){
	  	//获取php.ini中的最大内存占用的值
	  	$inimem = ini_get('memory_limit');
		//将上面得到的值转换为以字节为单位的数值
		$inibytes = timthumb::returnBytes($inimem);
		//算出配置文件中内存限制的值
		$ourbytes = timthumb::returnBytes(MEMORY_LIMIT);
		//如果php配置文件中的值小于自己设定的值
		if($inibytes < $ourbytes){
		  	//则将php.ini配置中关于最大内存的值设置为自己设定的值
		  	ini_set ('memory_limit', MEMORY_LIMIT);
		  	//写日志，记录改变内存操作，级别3
			$this->debug(3, "Increased memory from $inimem to " . MEMORY_LIMIT);
		//如果自己设置的值小于php.ini中的值
		} else {
		  	//则不进行任何操作，写日志记录此条信息即可，级别3
			$this->debug(3, "Not adjusting memory size because the current setting is " . $inimem . " and our size of " . MEMORY_LIMIT . " is smaller.");
		}
	}
	/*此函数将G, KB, MB 转为B(字节)*/
	protected static function returnBytes($size_str){
	  	//取最后一个单位值，进行转换操作，并返回转换后的值
		switch (substr ($size_str, -1))
		{
			case 'M': case 'm': return (int)$size_str * 1048576;
			case 'K': case 'k': return (int)$size_str * 1024;
			case 'G': case 'g': return (int)$size_str * 1073741824;
			default: return $size_str;
		}
	}
	/*此函数用来将url中的资源读取到tempfile文件中*/
	protected function getURL($url, $tempfile){
	  	//重置上次url请求错误信息
	  	$this->lastURLError = false;
	  	//进行url编码
		$url = preg_replace('/ /', '%20', $url);
		//优先使用curl扩展
		if(function_exists('curl_init')){
		  	//写日志，记录将使用curl扩展访问url，级别3
		  	$this->debug(3, "Curl is installed so using it to fetch URL.");
			//打开文件
			self::$curlFH = fopen($tempfile, 'w');
			//如果打开失败，记录错误信息并退出
			if(! self::$curlFH){
				$this->error("Could not open $tempfile for writing.");
				return false;
			}
			//重置写入长度
			self::$curlDataWritten = 0;
			//写日志，记录访问的url信息，级别3
			$this->debug(3, "Fetching url with curl: $url");
			//初始化curl
			$curl = curl_init($url);
			//curl选项设置
			curl_setopt ($curl, CURLOPT_TIMEOUT, CURL_TIMEOUT);
			curl_setopt ($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.122 Safari/534.30");
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt ($curl, CURLOPT_HEADER, 0);
			curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			//关闭会话时执行curlWrite
			curl_setopt ($curl, CURLOPT_WRITEFUNCTION, 'timthumb::curlWrite');
			@curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, true);
			@curl_setopt ($curl, CURLOPT_MAXREDIRS, 10);
			//执行本次请求，并将结果赋给$curlResult
			$curlResult = curl_exec($curl);
			//释放文件资源
			fclose(self::$curlFH);
			//获取最后一个受到的HTTP码
			$httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			//如果是404，那么设置404错误并退出
			if($httpStatus == 404){
				$this->set404();
			}
			//如果请求成功
			if($curlResult){
			  	//关闭curl，并执行curlWrite将数据写到文件中
			  	curl_close($curl);
			  	//返回真，请求完成
				return true;
			//如果请求不成功
			} else {
			  	//记录错误信息
			  	$this->lastURLError = curl_error($curl);
				//关闭资源
				curl_close($curl);
				//执行不成功
				return false;
			}
		//如果不支持curl，用file_get_contents获取数据
		} else {
		  	//获取数据
		  	$img = @file_get_contents ($url);
			//如果获取失败
			if($img === false){
			  	//记录返回的错误信息数组
			  	$err = error_get_last();
			  	//如果记录到了，并且有错误信息
				if(is_array($err) && $err['message']){
				  	//则记录这个错误信息
				  	$this->lastURLError = $err['message'];
				//否则的话记录整个错误信息
				} else {
					$this->lastURLError = $err;
				}
				//如果错误信息中有404，则设置为404错误
				if(preg_match('/404/', $this->lastURLError)){
					$this->set404();
				}
				//返回假
				return false;
			}
			//如果将读取的<strong><strong>图片</strong></strong>写入文件失败
			if(! file_put_contents($tempfile, $img)){
			  	//写错误信息并退出执行
				$this->error("Could not write to $tempfile.");
				return false;
			}
			//没问题的话执行成功
			return true;
		}

	}
	/*此函数输出指定的<strong><strong>图片</strong></strong>，用于输出错误信息中*/
	protected function serveImg($file){
	  	//获取图像信息
	  	$s = getimagesize($file);
		//如果获取不到图像信息，推出
		if(! ($s && $s['mime'])){
			return false;
		}
		//设置http头，输出<strong><strong>图片</strong></strong>
		header ('Content-Type: ' . $s['mime']);
		header ('Content-Length: ' . filesize($file) );
		header ('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
		header ("Pragma: no-cache");
		//使用readfile输出<strong><strong>图片</strong></strong>
		$bytes = @readfile($file);
		if($bytes > 0){
			return true;
		}
		//如果失败，使用file_get_contents和echo输出<strong><strong>图片</strong></strong>
		$content = @file_get_contents ($file);
		if ($content != FALSE){
			echo $content;
			return true;
		}
		//还失败的话返回假
		return false;
	}
	/*此函数设置404 错误码*/
	protected function set404(){
		$this->is404 = true;
	}
	/*此函数返回404错误码*/
	protected function is404(){
		return $this->is404;
	}
}
