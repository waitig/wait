<?php 
//载入热门文章板块
include ('hotlist.php');
//载入最新文章板块
include ('recent.php');
//载入分类一模块
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
/*
if(waitig_gopt('waitig_cat2'))
{
		$catId=waitig_gopt('waitig_cat2_id');
		$postNum=waitig_gopt('waitig_cat2_num');
		$imgNum=waitig_gopt('waitig_cat2_img_num');
		include ("mixlist.php");
}
if(waitig_gopt('waitig_cat3'))
{
		$catId=waitig_gopt('waitig_cat3_id');
		$postNum=waitig_gopt('waitig_cat3_num');
		$imgNum=waitig_gopt('waitig_cat3_img_num');
		include ("mixlist.php?catId=$catId&postNum=$postNum&imgNum=$imgNum");
}
if(waitig_gopt('waitig_cat4'))
{
		$catId=waitig_gopt('waitig_cat4_id');
		$postNum=waitig_gopt('waitig_cat4_num');
		$imgNum=waitig_gopt('waitig_cat4_img_num');
		include ("mixlist.php?catId=$catId&postNum=$postNum&imgNum=$imgNum");
}
if(waitig_gopt('waitig_cat5'))
{
		$catId=waitig_gopt('waitig_cat5_id');
		$postNum=waitig_gopt('waitig_cat5_num');
		$imgNum=waitig_gopt('waitig_cat5_img_num');
		include ("mixlist.php?catId=$catId&postNum=$postNum&imgNum=$imgNum");
}
 */
if(waitig_gopt('waitig_big_list'))
{
		$bigPostNum=waitig_gopt('waitig_big_list_num');
		$cat_array=get_cat_array();
		foreach($cat_array as $cat_id)
		{
				if ($cat_id) {
						include ("biglist.php?catId=$cat_id&postNum=$bigPostNum");
				}
		}
}
?>

