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
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "informationList"=>["game"=>$config['game'],"page"=>$page,"page_size"=>$info['page']['page_size'],"type"=>$info['type']=="info"?"1,2,3,5":"4","fields"=>"*"],
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
                            <div class="t_p"><a href="<?php echo $config['site_url']; ?>/newsdetail/<?php echo $info['id'];?>"><img src="<?php echo $value['logo'];?>"></a></div>
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
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_ss">
            <ul>
              <li>
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/ss1.jpg"></a></div>
              </li>
              <li>
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/ss2.jpg"></a></div>
              </li>
              <li>
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/ss3.jpg"></a></div>
              </li>
              <li>
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></a></div>
              </li>
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
          <div class="b_t">最新攻略</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="rm_zx">
            <ul>
              <li><a href="">[打野思路] 16.0玄策实战复盘教学</a></li>
              <li><a href="">TS暖阳FMVP英雄镜第一视角：世冠总决赛巅峰</a></li>
              <li><a href="">公爵自创玄策闪电鞭打法让你玄策不再迷茫</a></li>
              <li><a href="">8分钟掌握玄策18个操作技巧+8种自主练习技</a></li>
              <li><a href="">艾琳不再珍貴，入坑1270天的玩家告訴你，它才是珍寶！</a></li>
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