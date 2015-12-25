<?php 
//载入热门文章板块
include ('hotlist.php');
//载入最近文章模块
if(waitig_gopt('waitig_excerptlist'))
{
		if(waitig_gopt('waitig_excerpt_type')=='waitig_excerpt_small')
		{
			include("recent.php");
		}
		else
		{
			include("excerptlist.php");
		}
}
//载入小分类模块
for($i='1';$i<'6';$i++)
{
	if(waitig_gopt('waitig_cat'.$i))
	{
			$GLOBALS['catId']=waitig_gopt('waitig_cat'.$i.'_id');
			$GLOBALS['postNum']=waitig_gopt('waitig_cat'.$i.'_num');
			$GLOBALS['imgNum']=waitig_gopt('waitig_cat'.$i.'_img_num');
			include ("bannerbox.php");
	}
}
?>
