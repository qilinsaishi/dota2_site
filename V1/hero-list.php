<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$info['page']['page_size'] = 21;
$page = $_GET['page']??1;
if($page==''){
    $page=1;
}
$type = $_GET['type']??key($config['hero_type']);
if(!isset($config['hero_type'][$type]))
{
    $type = key($config['hero_type']);
}
$data = [
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "dota2HeroList"=>["page"=>1,"hero_type"=>$type,"page_size"=>21,"page"=>$page,"fields"=>"hero_type,hero_id,hero_name,logo","cacheWith"=>"currentPage"],
    "informationList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"1,2,3,5","fields"=>"id,title,site_time,create_time"],
    "informationList_2"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"4","fields"=>"id,title,site_time,create_time"],
    "playerList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"wanplus","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>12,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "video_list"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>4,"type"=>"7","fields"=>"id,title,logo,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "tournament"=>["dataType"=>"tournament","game"=>$config['game'],"page"=>1,"page_size"=>4,"source"=>"gamedota2"],
    "currentPage"=>["name"=>"hero-list","site_id"=>$config['site_id'],"page"=>$page,"type"=>$type]
];
$return = curl_post($config['api_get'],json_encode($data),1);
$info['page']['total_count'] = $return['dota2HeroList']['count'];
$info['page']['total_page'] = ceil($return['dota2HeroList']['count']/$info['page']['page_size']);
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?>英雄列表_<?php echo $config['game_name'];?>有哪些英雄-<?php echo $config['site_name'];?></title>
    <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>英雄列表，想了解<?php echo $config['game_name'];?>有哪些英雄，以及<?php echo $config['game_name'];?>英雄玩法攻略等，尽在<?php echo $config['site_name'];?>。">
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>英雄列表,<?php echo $config['game_name'];?>有哪些英雄″>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php generateNav($config,"hero");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > 英雄列表</div>
  <div class="yx_lb">
    <div class="sy_bt">
      <div class="b_t">英雄列表</div>
      <div class="clear"></div>
    </div>
    <div class="yx_nr">
      <div class="row f_b">
        <div class="yx_lx">
          <ul>
              <?php
              foreach ($config['hero_type'] as $hero_type => $type_name) {?>
                  <li name="<?php echo $hero_type;?>" <?php if($hero_type==$type){?>class="on"<?php }?>><a href="<?php echo $config['site_url'];?>/herolist/<?php echo $hero_type;?>/"><?php echo $type_name;?>型</a></li>
              <?php }?>
          </ul>
        </div>
        <div class="yx_zs yx_fy">
          <ul class="row">
              <?php foreach ($return['dota2HeroList']['data'] as $hero) {?>
              <li>
              <div class="n_r"><a href="<?php echo $config['site_url']."/herodetail/".$hero['hero_id'];?>">
                <div class="t_b"><img src="<?php echo $hero['logo'];?>"></div>
                <div class="w_z"><?php echo $hero['hero_name'];?></div>
              </a></div>
            </li>
              <?php }?>
          </ul>
        </div>
      </div>
      <div class="page">
          <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$config['site_url']."/herolist/".$type); ?>
      </div>
    </div>
  </div>
  <div class="zd_tw">
    <div class="sy_bt">
      <div class="b_t">热门赛事</div>
      <div class="m_r">
        <div class="bg"></div>
          <a href="<?php echo $config['site_url']."/matchlist/";?>">MORE +</a>
      </div>
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
          <div class="rm_zd">
            <ul>
                <?php $i=1;foreach ($return['teamList']['data'] as $team){
                    if($i%2==1){?>
                        <li>
                        <div class="row"><?php } ?>
                    <div class="col-6">
                        <div class="n_r"><a href="<?php echo $config['site_url']."/teamdetail/".$team['team_id'];?>">
                            <div class="t_b">
                                <?php if(isset($return['defaultConfig']['data']['default_team_img'])){?>
                                    <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_team_img']['value'];?>" src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                                <?php }else{?>
                                    <img src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                                <?php }?>
                            </div>
                            <div class="w_z"><?php echo $team['team_name'];?></div>
                            </a></div>
                    </div>
                    <?php if($i%2==0){?>
                        </div>
                        </li>
                    <?php }$i++;}?>
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
                                <div class="t_p">
                                    <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                                        <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                                    <?php }else{?>
                                        <img src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                                    <?php }?>
                                </div>
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
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门资讯</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/newslist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
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
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">游戏攻略</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/stralist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
          <div class="xw_nr">
              <div class="zx_zx">
            <ul>
                <?php foreach($return['informationList_2']['data'] as $key => $value) {?>
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
  <div class="zd_tw">
    <div class="sy_bt">
      <div class="b_t">热门视频</div>
      <div class="m_r">
        <div class="bg"></div>
          <a href="<?php echo $config['site_url'];?>/videolist/">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="zx_nr">
      <div class="tw_lb">
        <ul class="row">
            <?php foreach($return['video_list']['data'] as $key => $video) {?>
                <li class="col-md-3 col-6">
                    <div class="t_p"><a href="<?php echo $config['site_url'];?>/videodetail/<?php echo $video['id'];?>"><img src="<?php echo $video['logo'];?>" title="<?php echo $video['title'];?>"></a></div>
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
    <?php renderCertification();?>
</div>
<div class="fh_top"><img src="<?php echo $config['site_url'];?>/images/fh_top.png"></div>
</body>
</html>