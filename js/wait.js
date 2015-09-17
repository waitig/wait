function MarqueeNews(){
 $('#news').find("ul").animate({
  marginTop : "-20px"
 }, 1000, function () {
  $(this).css({
    marginTop : "0px"
   }).find("li:first").appendTo(this)
 })
}

var MarNews = setInterval(MarqueeNews, 3000);

function gstop(){
 clearInterval(MarNews);
}

function gstart(){
 MarNews = setInterval(MarqueeNews, 3000);
}

function goup(){

 $('#news').find("ul li").last().insertBefore($('#news').find("ul li").first());
 
 $('#news').find("ul").css({marginTop:'-20px'});
 
 $('#news').find("ul").animate({
  marginTop : "0px"
 }, 500)
}
function godown(){
 
 $('#news').find("ul").animate({
  marginTop : "-20px"
 }, 500, function () {
  $(this).css({
    marginTop : "0px"
   }).find("li:first").appendTo(this)
 })
}
