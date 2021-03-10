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
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "informationList"=>["game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"type"=>$info['type']=="info"?"1,2,3,5":"4","fields"=>"*"],
    "informationList_2"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>$info['type']!="info"?"1,2,3,5":"4","fields"=>"*"],
    "tournament"=>["dataType"=>"tournament","game"=>$config['game'],"page"=>1,"page_size"=>4,"source"=>"gamedota2"],
    "currentPage"=>["name"=>"infoList","type"=>$zxtype,"page"=>$page,"page_size"=>$info['page']['page_size'],"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(count($return["informationList"]['data'])==0)
{
    render404($config);
}
$info['page']['total_count'] = $return['informationList']['count'];
$info['page']['total_page'] = intval($return['informationList']['count']/$info['page']['page_size']);
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>_<?php echo $config['game_name'];?>电竞头条-<?php echo $config['site_name'];?></title>
    <?php if($info['type']=="info"){?>
        <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>，了解<?php echo $config['game_name'];?>电子竞技头条<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>，尽在<?php echo $config['site_name'];?>。">
    <?php }else{?>
        <meta name="description" content="<?php echo $config['site_name'];?>提供<?php echo $config['game_name'];?>游戏攻略，众多大神玩家为您介绍最新版本下<?php echo $config['game_name'];?>新玩法。">
    <?php }?>
    <meta name=”Keywords” Content=”<?php echo $config['game_name'];?>最新<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>,<?php echo $config['game_name'];?>电竞<?php if($info['type']=="info"){echo "资讯";}else{echo "攻略";}?>″>    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php
          $type = $info['type']=="info" ?"info":"stra";
          generateNav($config, $type);
          ?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <?php echo ($info['type']!="info")?"游戏攻略":"游戏资讯";?></div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="zx_nr">
          <div class="zx_lb">
            <ul>
                <?php foreach($return['informationList']['data'] as $key => $value) {?>
                    <li class="row">
                        <div class="col-lg-2 col-5">
                            <div class="t_p"><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>"><img src="<?php echo $value['logo'];?>"></a></div>
                        </div>
                        <div class="col-lg-10 col-7">
                            <div class="w_z">
                                <h3><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></h3>
                                <p><?php echo strip_tags(html_entity_decode($value['content'])); ?></p>
                                <a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $value['id'];?>" class="m_r">read more +</a>
                            </div>
                        </div>
                    </li>
                <?php }?>
            </ul>
          </div>
          <div class="page">
              <?php render_page_pagination($info['page']['total_count'],$info['page']['page_size'],$page,$zxtype); ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">热门赛事</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url']."/matchlist/";?>">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_ss">
            <ul>
                <?php foreach ($return['tournament']['data'] as $tournament){?>
                    <li>
                        <div class="t_p"><a href=""><img src="<?php echo $tournament['logo'];?>"></a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
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
          <div class="b_t">最新<?php if($info['type']=="info"){echo "攻略";}else{echo "资讯";}?></div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'].(($info['type']=="info")?"/strategylist/":"/newslist/")?>">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="rm_zx">
            <ul>
                <?php foreach($return['informationList_2']['data'] as $key => $value) {?>
                    <li><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $info['id'];?>"><?php echo $value['title'];?></a></li>
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