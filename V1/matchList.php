<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$info['page']['page_size'] = 10;
$info['type'] = $_GET['type']??"info";
$page = $_GET['page']??1;
if($page==''){
    $page=1;
}
$zxtype=($info['type']!="info")?"/strategylist":"/newslist";
$data = [
    "tournament"=>["dataType"=>"tournament","game"=>$config['game'],"page"=>1,"page_size"=>4,"source"=>"gamedota2"],
    "video_list"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>9,"type"=>"7","fields"=>"id,title,logo,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "playerList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"wanplus","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "informationList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>12,"type"=>"1,2,3,5","fields"=>"id,title,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    "currentPage"=>["name"=>"infoList","type"=>$zxtype,"page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
<title>夺塔电竞</title>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php generateNav($config,"match");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <a href="">游戏赛事</a> > DPC中国赛事</div>
  <div class="jq_sc">
    <div class="sy_bt">
      <div class="b_t">近期赛程</div>
      <div class="clear"></div>
    </div>
    <div class="sc_nr">
      <div class="swiper-container swiper-ss">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><a href="">
            <div class="s_j">2021年2月2日16:00</div>
            <div class="x_x">
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a1.jpg">
                <p>Newbee</p>
              </div>
              <div class="s_g">
                <strong>0&nbsp;:&nbsp;1</strong>
                <p>进行中</p>
              </div>
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a3.jpg">
                <p>Predator</p>
              </div>
              <div class="clear"></div>
            </div>
            <div class="s_s">S级联赛</div>
          </a></div>
          <div class="swiper-slide"><a href="">
            <div class="s_j">2021年2月2日16:00</div>
            <div class="x_x">
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a1.jpg">
                <p>Newbee</p>
              </div>
              <div class="s_g">
                <strong>0&nbsp;:&nbsp;1</strong>
                <p>进行中</p>
              </div>
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a3.jpg">
                <p>Predator</p>
              </div>
              <div class="clear"></div>
            </div>
            <div class="s_s">S级联赛</div>
          </a></div>
          <div class="swiper-slide"><a href="">
            <div class="s_j">2021年2月2日16:00</div>
            <div class="x_x">
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a1.jpg">
                <p>Newbee</p>
              </div>
              <div class="s_g">
                <strong>0&nbsp;:&nbsp;1</strong>
                <p>进行中</p>
              </div>
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a3.jpg">
                <p>Predator</p>
              </div>
              <div class="clear"></div>
            </div>
            <div class="s_s">S级联赛</div>
          </a></div>
          <div class="swiper-slide"><a href="">
            <div class="s_j">2021年2月2日16:00</div>
            <div class="x_x">
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a1.jpg">
                <p>Newbee</p>
              </div>
              <div class="s_g">
                <strong>0&nbsp;:&nbsp;1</strong>
                <p>进行中</p>
              </div>
              <div class="z_d">
                <img src="<?php echo $config['site_url'];?>/images/a3.jpg">
                <p>Predator</p>
              </div>
              <div class="clear"></div>
            </div>
            <div class="s_s">S级联赛</div>
          </a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">赛事视频</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/videolist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="zd_sp">
            <ul class="row">
                <?php foreach($return['video_list']['data'] as $key => $value) {?>
                    <li class="col-4">
                        <div class="t_p"><a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $value['id'];?>"><img src="<?php echo $value['logo'];?>" title="<?php echo $value['title'];?>"></a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">赛事新闻</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="zx_zx">
            <ul>
                <?php foreach($return['informationList']['data'] as $key => $value) {?>
                    <li>
                        <div class="s_j"><?php echo substr($value['create_time'],0,10);?></div>
                        <a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/teamlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="zd_ph">
            <ul>
                <?php $i=1;foreach ($return['teamList']['data'] as $team){?>
                        <li>
                            <span class="s_z">NO.<?php echo $i;?></span>
                            <span class="z_d">
                        <?php if(isset($return['defaultConfig']['data']['default_team_img'])){?>
                            <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_team_img']['value'];?>" src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                        <?php }else{?>
                            <img src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                        <?php }?>
                    <em><?php echo $team['team_name'];?></em></span>
                            <div class="clear"></div>
                        </li>
                    <?php $i++;}?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门选手</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/playerlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="mx_tj">
            <ul class="row">
                <?php foreach($return['playerList']['data'] as $player){?>
                    <li class="col-4">
                        <div class="n_r"><a href="<?php echo $config['site_url']."/playerdetail/".$player['player_id'];?>">
                                <div class="t_p"><img src="<?php echo $player['logo'];?>"></div>
                                <div class="w_z"><?php echo $player['player_name'];?></div>
                            </a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ss_js">
    <div class="sy_bt">
      <div class="b_t">赛事介绍</div>
      <div class="clear"></div>
    </div>
    <div class="js_nr">
      <div class="row">
        <div class="col-lg-5 col-12">
          <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/ss5.jpg"></div>
        </div>
        <div class="col-lg-7 col-12">
          <div class="w_z">
            <h3>TH E INTERNATIONAL XI</h3>
            <p>赛事开始于： 15 八月，2022<br>
            奖金池： $ 1,600,000<br>
            赛季： The International</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="zd_tw">
    <div class="sy_bt">
      <div class="b_t">相关赛事</div>
      <div class="clear"></div>
    </div>
    <div class="zx_nr">
      <div class="tw_lb">
        <ul class="row">
          <?php foreach ($return['tournament']['data'] as $tournament){?>
              <li class="col-lg-3 col-6">
                  <div class="t_p"><a href=""><img src="<?php echo $tournament['logo'];?>"></a></div>
              </li>
          <?php }?>
        </ul>
      </div>
    </div>
  </div>
  <div class="sy_yl">
    <div class="sy_bt">
      <div class="b_t">友情链接</div>
      <div class="clear"></div>
    </div>
    <div class="lj_nr"><a href="" target="_blank">王者荣耀</a><a href="" target="_blank">英雄联盟</a><a href="" target="_blank">DOTA21</a><a href="" target="_blank">CS:GO</a><a href="" target="_blank">凤凰电竞</a></div>
  </div>
</div>
<div class="banquan">
  <div class="container"><span>Copyright©2021 www.qilindianjing.com All rights reserved</span><span>琼ICP备19001306号-2</span></div>
</div>
<div class="fh_top"><img src="<?php echo $config['site_url'];?>/images/fh_top.png"></div>
<script type="text/javascript" src="js/swiper.min.js"></script> 
<script>
  var galleryThumbs = new Swiper('.swiper-ss', {
	prevButton:'.swiper-button-prev',
    nextButton:'.swiper-button-next',
	pagination:'.swiper-pagination',
    slidesPerView:4,
    spaceBetween:20,
    paginationClickable: true,
	slideToClickedSlide: true,
	autoplay:5000,
	loop:true,
	breakpoints: {
	  1200: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
	},
    });
</script>
</body>
</html>