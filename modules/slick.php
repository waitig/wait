<?php 
if((!waitig_gopt(waitig_mobilesticky))||(!waitig_is_mobile())):
?>
<!--<div class="ps_box" style="height:300px">-->
	<div class="pics_switch">
		<div class="pb">
<?php
if (waitig_gopt('waitig_slick1img')) { ?>
<div class="pic_box"><a class="pic_banner" target="_blank" href="<?php
    echo waitig_gopt('waitig_slick1url'); ?>"><img src="<?php
	echo waitig_gopt('waitig_slick1img'); ?>" alt="<?php
    echo waitig_gopt('waitig_slick1title'); ?>" style="width:855px"><span class="spanfuck"><?php
    echo waitig_gopt('waitig_slick1title'); ?></span></a></div>
<?php } 

if (waitig_gopt('waitig_slick2img')) { ?>
<div class="pic_box"><a class="pic_banner" target="_blank" href="<?php
    echo waitig_gopt('waitig_slick2url'); ?>"><img src="<?php
	echo waitig_gopt('waitig_slick2img'); ?>" alt="<?php
    echo waitig_gopt('waitig_slick2title'); ?>" style="width:855px"><span class="spanfuck"><?php
    echo waitig_gopt('waitig_slick2title'); ?></span></a></div>
<?php } 

if (waitig_gopt('waitig_slick3img')) { ?>
<div class="pic_box"><a class="pic_banner" target="_blank" href="<?php
    echo waitig_gopt('waitig_slick3url'); ?>"><img src="<?php
	echo waitig_gopt('waitig_slick3img'); ?>" alt="<?php
    echo waitig_gopt('waitig_slick3title'); ?>" style="width:855px"><span class="spanfuck"><?php
    echo waitig_gopt('waitig_slick3title'); ?></span></a></div>
<?php } 

if (waitig_gopt('waitig_slick4img')) { ?>
<div class="pic_box"><a class="pic_banner" target="_blank" href="<?php
    echo waitig_gopt('waitig_slick4url'); ?>"><img src="<?php
	echo waitig_gopt('waitig_slick4img'); ?>" alt="<?php
    echo waitig_gopt('waitig_slick4title'); ?>" style="width:855px"><span class="spanfuck"><?php
    echo waitig_gopt('waitig_slick4title'); ?></span></a></div>
<?php }

if (waitig_gopt('waitig_slick5img')) { ?>
<div class="pic_box"><a class="pic_banner" target="_blank" href="<?php
    echo waitig_gopt('waitig_slick5url'); ?>"><img src="<?php
	echo waitig_gopt('waitig_slick5img'); ?>" alt="<?php
    echo waitig_gopt('waitig_slick5title'); ?>" style="width:855px"><span class="spanfuck"><?php
    echo waitig_gopt('waitig_slick5title'); ?></span></a></div>
<?php } ?>
<?php
if (waitig_gopt('waitig_slick6img')) { ?>
<div class="pic_box"><a class="pic_banner" target="_blank" href="<?php
    echo waitig_gopt('waitig_slick6url'); ?>"><img src="<?php
	echo waitig_gopt('waitig_slick6img'); ?>" alt="<?php
    echo waitig_gopt('waitig_slick6title'); ?>" style="width:855px"><span class="spanfuck"><?php
    echo waitig_gopt('waitig_slick6title'); ?></span></a></div>
<?php } ?>
</div>
<div class="viewArrows prev">上一张</div>
        <div class="viewArrows next">下一张</div>
        <div class="pics_switch_clients">
		  <ul>
<?php 
if (waitig_gopt('waitig_slick1img')) 
		echo '<li class="li_1"><span class="current">1</span></li>';
if (waitig_gopt('waitig_slick2img')) 
		echo '<li class="li_2"><span>2</span></li>';
if (waitig_gopt('waitig_slick3img')) 
		echo '<li class="li_3"><span>3</span></li>';
if (waitig_gopt('waitig_slick4img')) 
		echo '<li class="li_4"><span>4</span></li>';
if (waitig_gopt('waitig_slick5img')) 
		echo '<li class="li_5"><span>5</span></li>';
if (waitig_gopt('waitig_slick6img')) 
		echo '<li class="li_6"><span>6</span></li>';
?>
          </ul>
        </div>
      </div>
    <!--</div>-->
<?php
endif
?>
