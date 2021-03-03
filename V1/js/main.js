$(document).ready(function(){
  $(".header .an").click(function(){
	$(".nav").toggleClass("on");
    $(this).toggleClass("n");
  });
  $(".fh_top").click(function(){
    $("html,body").animate({scrollTop:0},500);
  });
  $(".jq_zs .q_b").click(function(){
    $(this).parent(".b_t").siblings(".zs_xx").toggleClass("d_k");
	$(this).parent(".b_t").siblings(".s_q").slideToggle(0);
  });
  $(".jq_zs .s_q").click(function(){
    $(this).siblings(".zs_xx").toggleClass("d_k");
	$(this).slideToggle(0);
  });
  jQuery(".jn_js").slide({mainCell:".bd",delayTime:0,});
  jQuery(".yx_gx").slide({mainCell:".bd",delayTime:0,});
  jQuery(".mw_dp").slide({mainCell:".bd",delayTime:0,});
  $(".yx_gx .t_x ul li").mouseenter(function(){
    var index=$(".yx_gx .t_x ul li").index(this);
    $(this).addClass("on").siblings().removeClass("on");
    $(".yx_gx .w_z p").eq(index).addClass("dk").siblings().removeClass("dk");
  })
});

$(window).scroll(function(){
  var top = $(window).scrollTop();
  if(top>100){
    $(".fh_top").fadeIn();
  }else{
    $(".fh_top").fadeOut();
  }
});