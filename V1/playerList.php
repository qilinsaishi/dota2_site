<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$info['page']['page_size'] = 24;
$page = $_GET['page']??1;
if($page==''){
    $page=1;
}
$data = [
    "tournament"=>["dataType"=>"tournament","game"=>$config['game'],"page"=>1,"page_size"=>4,"source"=>"gamedota2"],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "informationList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"1,2,3,5","fields"=>"id,title,site_time,create_time"],
    "playerList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"source"=>"wanplus","fields"=>'player_id,player_name,logo'],
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>10,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "video_list"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"7","fields"=>"id,title,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    "currentPage"=>["name"=>"team-list","site_id"=>$config['site_id'],"page"=>$page],
];
$return = curl_post($config['api_get'],json_encode($data),1);
$info['page']['total_count'] = $return['playerList']['count'];
$info['page']['total_page'] = ceil($return['playerList']['count']/$info['page']['page_size']);
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?>职业选手名单大全-<?php echo $config['site_name'];?></title>
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>职业选手名单,<?php echo $config['game_name'];?>职业选手大全″>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php generateNav($config,"player");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > 游戏选手</div>
  <div class="xs_lb">
    <div class="sy_bt">
      <div class="b_t">选手列表</div>
      <div class="clear"></div>
    </div>
    <div class="xs_nr">
      <ul class="row">
        <?php foreach($return['playerList']['data'] as $player){?>
            <li>
                <div class="t_p"><a href="<?php echo $config['site_url']."/playerdetail/".$player['player_id'];?>">
                        <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                            <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                        <?php }else{?>
                            <img src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                        <?php }?>
                        <div class="w_z"><?php echo $player['player_name'];?></div>
                    </a></div>
            </li>
        <?php }?>
      </ul>
      <div class="page">
          <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$config['site_url']."/playerlist"); ?>
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
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="<?php echo $config['site_url']."/teamlist/";?>">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="rm_zd">
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
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">热门资讯</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="<?php echo $config['site_url']."/newslist/";?>">MORE +</a>
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
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">队员视频</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/videolist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="yx_gl">
            <ul>
                <?php foreach($return['video_list']['data'] as $key => $value) {?>
                    <li>
                        <span>视频</span>
                        <div class="t_p"><a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
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