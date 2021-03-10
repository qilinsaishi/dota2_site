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
    //"tournament"=>["page"=>1,"page_size"=>8],
    //"playerList"=>["dataType"=>"totalPlayerList","page"=>1,"page_size"=>9,"game"=>$config['game'],"source"=>"wanplus","rand"=>1,"cacheWith"=>"currentPage","fields"=>'player_id,player_name,logo'],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    //"video_list"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>"7","rand"=>1,"fields"=>"id,title,logo,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    //"tournament"=>["dataType"=>"tournament","game"=>$config['game'],"page"=>1,"page_size"=>4,"source"=>"gamedota2"],
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
            <div class="b_t">分组情况、整体赛程了解一下</div>
            <div class="n_r"><img src="<?php echo $config['site_url'];?>/images/xq3.jpg"><br>
            TGA王者荣耀女子赛线上积分赛打响!分组情况、整体赛程了解一下内容由yida7788整理编辑，关键词是:信用卡线上消费有积分吗悦卡积分中信5倍积分线上交易悦卡8倍积分王者打野什么意思王者鲁班怎么玩王者怎么玩王者排位人机王者庄周相关信息，具体详情请阅读下文。</div>
            <div class="b_q"><a href="">关键词</a><a href="">关键词</a><a href="">关键词</a></div>
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">相关视频</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="sp_lb">
            <ul class="row">
              <li class="col-4">
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp5.jpg"></a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp6.jpg"></a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp7.jpg"></a></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
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
          <div class="b_t">明星选手</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_xs">
            <ul class="row">
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t1.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t2.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t3.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t4.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t5.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t6.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t7.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t8.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href="">
                  <img src="<?php echo $config['site_url'];?>/images/t9.png">
                  <div class="w_z">名字</div>
                </a></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">最新资讯</div>
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