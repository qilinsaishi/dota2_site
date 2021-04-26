<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$tournament_id = $_GET['tournament_id']??0;
if(strlen($tournament_id)<32)
{
    render404($config);
}
$data = [
    "tournament"=>["source"=>"gamedota2","tournament_id"=>$tournament_id],
    "tournamentList"=>["dataType"=>"tournamentList","game"=>$config['game'],"page"=>1,"page_size"=>12,"source"=>"gamedota2"],
    "matchList"=>["source"=>"gamedota2","dataType"=>"matchList","tournament_id"=>$tournament_id,"page"=>1,"page_size"=>4],
    "video_list"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>9,"type"=>"7","fields"=>"id,title,logo,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
	"hotTeamList"=>["dataType"=>"intergratedTeamList","page"=>1,"page_size"=>6,"game"=>$config['game'],"rand"=>1,"fields"=>'tid,team_name,logo',"cacheWith"=>"currentPage","cache_time"=>86400*7],
	"hotPlayerList"=>["dataType"=>"intergratedPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>6,"fields"=>'pid,position,player_name,logo,team_id',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "informationList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>12,"type"=>"3","fields"=>"id,title,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    "currentPage"=>["name"=>"tournament","id"=>$tournament_id,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(!isset($return["tournament"]['data']['tournament_id']) || $return["tournament"]['data']['game'] != $config['game'] )
{
    render404($config);
}
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
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <a href="<?php echo $config['site_url'];?>/tournamentlist/">游戏赛事</a> > <?php echo $return['tournament']['data']['tournament_name'];?></div>
  <?php if(count($return['matchList']['data'])>0) {?>
    <div class="jq_sc">
    <div class="sy_bt">
      <div class="b_t">近期赛程</div>
      <div class="clear"></div>
    </div>
      <div class="sc_nr">
          <div class="swiper-container swiper-ss">
              <div class="swiper-wrapper">
                  <?php foreach($return['matchList']['data'] as $match){?>
                      <div class="swiper-slide"><a href="">
                              <div class="s_j">2021年2月2日16:00</div>
                              <div class="x_x">
                                  <div class="z_d">
                                      <img src="<?php echo $match['home_team_info']['logo']??$return['defaultConfig']['data']['default_team_img']['value'];?>">
                                      <p><?php echo $match['home_team_info']['team_name']??"未知队伍";?></p>
                                  </div>
                                  <div class="s_g">
                                      <strong><?php echo $match['home_score'];?>&nbsp;:&nbsp;<?php echo $match['away_score'];?></strong>
                                      <?php $start_time = strtotime($match['start_time']);
                                      if(time()<$start_time){$status = "即将开始";}
                                      elseif(time()>($start_time+3600)){$status = "已经结束";}
                                      else{$status = "进行中";}
                                      ?>
                                      <p><?php echo $status;?></p>
                                  </div>
                                  <div class="z_d">
                                      <img src="<?php echo $match['away_team_info']['logo']??$return['defaultConfig']['data']['default_team_img']['value'];?>">
                                      <p><?php echo $match['away_team_info']['team_name']??"未知队伍";?></p>
                                  </div>
                                  <div class="clear"></div>
                              </div>
                              <div class="s_s"></div>
                          </a></div>
                  <?php }?>
              </div>
              <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
      </div>
  </div>
    <?php }?>
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
                <?php foreach($return['video_list']['data'] as $key => $video) {?>
                    <li class="col-4">
                        <div class="t_p"><a href="<?php echo $config['site_url'];?>/videodetail/<?php echo $video['id'];?>"><img src="<?php echo $video['logo'];?>" title="<?php echo $video['title'];?>"></a></div>
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
              <a href="<?php echo $config['site_url'];?>/newslist/">MORE +</a>
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
              <a href="<?php echo $config['site_url'];?>/teams/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="zd_ph">
            <ul>
                <?php $i=1;foreach ($return['hotTeamList']['data'] as $team){?>
                        <li>
                            <span class="s_z">NO.<?php echo $i;?></span>
                            <a href = "<?php echo $config['site_url']."/team/".$team['tid'];?>"><span class="z_d">
                        <?php if(isset($return['defaultConfig']['data']['default_team_img'])){?>
                            <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_team_img']['value'];?>" src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                        <?php }else{?>
                            <img src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                        <?php }?>
                                    <em><?php echo $team['team_name'];?></em></span></a>
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
              <a href="<?php echo $config['site_url'];?>/players/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="mx_tj">
            <ul class="row">
                <?php foreach($return['hotPlayerList']['data'] as $player){?>
                    <li class="col-4">
                        <div class="n_r"><a href="<?php echo $config['site_url']."/player/".$player['pid'];?>">
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
          <div class="t_p"><img src="<?php echo $return['tournament']['data']['logo'];?>"></div>
        </div>
        <div class="col-lg-7 col-12">
          <div class="w_z">
            <h3><?php echo $return['tournament']['data']['tournament_name'];?></h3>
            <p></p>
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
          <?php foreach ($return['tournamentList']['data'] as $tournament){?>
              <li class="col-lg-3 col-6">
                  <div class="t_p"><a href="<?php echo $config['site_url']."/tournament/".$tournament['tournament_id'];?>"><img src="<?php echo $tournament['logo'];?>" title="<?php echo $tournament['tournament_name'];?>"></a></div>
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