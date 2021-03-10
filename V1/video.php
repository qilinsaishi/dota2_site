<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$id = $_GET['id']??1;
if($id<=0)
{
    render404($config);
}
$data = [
    "information"=>[$id],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "playerList"=>["dataType"=>"totalPlayerList","page"=>1,"page_size"=>9,"game"=>$config['game'],"source"=>"wanplus","rand"=>1,"cacheWith"=>"currentPage","fields"=>'player_id,player_name,logo',"cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "video_list"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>3,"type"=>"7","rand"=>1,"fields"=>"id,title,logo,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    "informationList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>5,"type"=>"1,2,3,5","fields"=>"id,title,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    //"tournament"=>["dataType"=>"tournamentList","game"=>$config['game'],"page"=>1,"page_size"=>4,"source"=>"gamedota2"],
    "currentPage"=>["name"=>"video","id"=>$id,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $return['information']['data']['title'];?>_<?php echo $config['game_name'];?>视频-<?php echo $config['site_name'];?></title>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php generateNav($config,"video");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <a href="">游戏视频</a> > 分组情况、整体赛程了解一下</div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="xq_nr">
          <div class="xw_xq">
              <div class="b_t"><?php echo $return['information']['data']['title'];?></div>
              <div class="author">作者：<?php echo $return['information']['data']['author'];?></div>
              <div class="c_time">发布时间：<?php echo date("Y-m-d H:i:s",strtotime($return['information']['data']['create_time'])+8*3600);?> </div>
            <div class="n_r">
                <?php echo html_entity_decode($return['information']['data']['content']);?><br>
                <?php echo $return['information']['data']['title'];?>
          </div>
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">相关视频</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/videolist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="sp_lb">
            <ul class="row">
                <?php foreach($return['video_list']['data'] as $key => $video) {?>
                    <li class="col-4">
                        <div class="t_p"><a href="<?php echo $config['site_url'];?>/videodetail/<?php echo $video['id'];?>"><img src="<?php echo $video['logo'];?>"></a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url']."/teamlist/";?>">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_zd zx_tj">
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
        <div class="sy_bt">
          <div class="b_t">明星选手</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/playerlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_xs">
            <ul class="row">
                <?php foreach($return['playerList']['data'] as $player){?>
                    <li class="col-4">
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
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">最新资讯</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/newslist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="rm_zx">
            <ul>
                <?php foreach($return['informationList']['data'] as $info){?>
                    <li>
                        <a href="<?php echo $config['site_url']."/newsdetail/".$info['id']?>" title="<?php echo $info['title'];?>" target="_blank"><?php echo $info['title'];?></a>
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