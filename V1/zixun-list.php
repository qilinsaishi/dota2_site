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
    "totalTeamList"=>["page"=>1,"page_size"=>12,"game"=>$config['game'],"source"=>$config['source'],"fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "totalPlayerList"=>["game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>$config['source'],"fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
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
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw1.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw2.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw3.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw4.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw5.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw1.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw2.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw3.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw4.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw5.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
              <li class="row">
                <div class="col-lg-2 col-5">
                  <div class="t_p"><a href="zixunxiangqing.html"><img src="<?php echo $config['site_url'];?>/images/xw1.jpg"></a></div>
                </div>
                <div class="col-lg-10 col-7">
                  <div class="w_z">
                    <h3><a href="zixunxiangqing.html">TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下</a></h3>
                    <p>即使最后一场比赛3-0获胜，积分最高为7，净胜分最高为0，也无法超越GK，所以GK锁定西部最后一个季后赛名额!恭喜GK</p>
                    <a href="zixunxiangqing.html" class="m_r">read more +</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="page">
            <a href=""><</a>
            <a href="" class="on">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">></a>
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
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_zd zx_tj">
            <ul>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zd1.jpg"></div>
                      <div class="w_z">Newbee</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zd2.jpg"></div>
                      <div class="w_z">FORZE</div>
                    </a></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zd3.jpg"></div>
                      <div class="w_z">SAG</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zd4.jpg"></div>
                      <div class="w_z">DCEAW</div>
                    </a></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zd5.jpg"></div>
                      <div class="w_z">Elephant</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zd6.jpg"></div>
                      <div class="w_z">Predator</div>
                    </a></div>
                  </div>
                </div>
              </li>
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
  <div class="container"><span>Copyright©2021 www.qilindianjing.com All rights reserved</span><span>琼ICP备19001306号-2</span></div>
</div>
<div class="fh_top"><img src="<?php echo $config['site_url'];?>/images/fh_top.png"></div>
</body>
</html>