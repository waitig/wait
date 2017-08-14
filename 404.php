<?php get_header();
$homeUrl = home_url('/');
?>
<div class="wrap-404">
<style type="text/css">
    .wrap-404 {
        /*min-height: 400px;*/
        padding:200px 100px 200px 100px;
        background-color: #0099CC;
        color: #FFFFFF;
        font-family: Microsoft Yahei, "Helvetica Neue", Helvetica, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;
    }
    .face {
        font-size: 100px;
    }
    a {
        color: #ffffff;
    }
    p{
        font-size: 24px;
        padding: 8px;
        line-height: 40px;
    }
    .tips {
        font-size: 16px
    }

    /*针对小屏幕的优化*/
    @media screen and (max-width: 600px) {
        body{
            margin: 0 10px;
        }
        .wrap-404 {
            padding:100px 10px 100px 10px;
        }
        p{
            font-size: 18px;
            line-height: 30px;
        }
        .tips {
            display: inline-block;
            padding-top: 10px;
            font-size: 14px;
            line-height: 20px;
        }
    }
</style>
    <script>
        var i = 5;  //这里是倒计时的秒数
        var intervalid;
        intervalid = setInterval("cutdown()", 1000);
        function cutdown() {
            if (i === 0) {
                window.location.href = "<?=$homeUrl?>"; //倒计时完成后跳转的地址
                clearInterval(intervalid);
            }
            document.getElementById("mes").innerHTML = i;
            i--;
        }
        window.onload = cutdown;
    </script>

    <span class="face">:(</span>
    <p>404,您访问的页面没有找到。<br>
        <span id="mes"></span> 秒后转至<a href="<?=$homeUrl?>">首页</a>，您可以在那里试着找找您所需要的信息。<br>
        <span class="tips">如果您想了解更多信息，则可以稍后在线搜索此错误……算了你还是别搜了……</span>
    </p>
    <?php get_footer(); ?>
