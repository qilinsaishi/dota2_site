<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$team_id = $_GET['team_id']??0;
if($team_id<=0)
{
    render404($config);
}
$data = [
    "totalTeamInfo"=>[$team_id],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "keywordMapList"=>["fields"=>"content_id","source_type"=>"team","source_id"=>$team_id,"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>6,"fields"=>"id,title,create_time"]],
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>7,"except_team"=>$team_id,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "currentPage"=>["name"=>"team","id"=>$team_id,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(!isset($return["totalTeamInfo"]['data']['team_id']) || $return["totalTeamInfo"]['data']['game'] != $config['game'] )
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
    <title><?php echo $return['totalTeamInfo']['data']['team_name'];?>电子竞技俱乐部_<?php echo $return['totalTeamInfo']['data']['team_name'];?>战队_<?php echo $return['totalTeamInfo']['data']['team_name'];?>电竞俱乐部成员介绍-<?php echo $config['site_name'];?></title>
    <meta name="description" content="<?php /*echo $return['totalTeamInfo']['data']['description'];*/?>">
    <meta name=”Keywords” Content=”<?php echo $return['totalTeamInfo']['data']['team_name'];?>电子竞技俱乐部,<?php
    if(substr_count($return['totalTeamInfo']['data']['team_name'],"战队")==0){echo $return['totalTeamInfo']['data']['team_name'].'战队,';}?><?php echo $return['totalTeamInfo']['data']['team_name'];?>电竞俱乐部成员介绍″>
    <?php renderHeaderJsCss($config);?>
</head>

<body>
<div class="header">
  <div class="container">
    <div class="logo"><a href="<?php echo $config['site_url'];?>"><img src="<?php echo $config['site_url'];?>/images/logo.png"></a></div>
    <div class="an"><span class="a1"></span><span class="a2"></span><span class="a3"></span></div>
    <div class="nav">
      <ul>
          <?php generateNav($config,"team");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <a href="">游戏战队</a> > <?php echo $return['totalTeamInfo']['data']['team_name'];?></div>
  <div class="zd_js">
    <div class="row">
      <div class="col-lg-3 col-4">
        <div class="t_p">
            <?php if(isset($return['defaultConfig']['data']['default_team_img'])){?>
                <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_team_img']['value'];?>" src="<?php echo $return['totalTeamInfo']['data']['logo'];?>" title="<?php echo $return['totalTeamInfo']['data']['team_name'];?>" />
            <?php }else{?>
                <img src="<?php echo $return['totalTeamInfo']['data']['logo'];?>" title="<?php echo $return['totalTeamInfo']['data']['team_name'];?>" />
            <?php }?>
        </div>
      </div>
      <div class="col-lg-9 col-8">
        <div class="w_z">
          <div class="x_m"><?php echo $return['totalTeamInfo']['data']['team_name'];?></div>
          <div class="j_s">
            <ul>
              <li><span>国家</span><?php echo $return['totalTeamInfo']['data']['location'];?></li>
              <li><span>英文名</span><?php echo $return['totalTeamInfo']['data']['en_name'];?></li>
              <li><span>游戏战绩</span><?php echo implode("/",json_decode($return['totalTeamInfo']['data']['race_stat'],true));?></li>
            </ul>
          </div>
          <div class="j_j"><?php echo $return['totalTeamInfo']['data']['description'];?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="jq_zs">
    <div class="b_t">
      <div class="l_m">近期比赛</div>
      <div class="q_b">全部对手</div>
    </div>
    <div class="zs_xx">
      <ul>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
        <li>
          <div class="row">
            <div class="col-2">
              <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/zs.jpg"></div>
            </div>
            <div class="col-lg-6 col-4">
              <div class="x_x">
                <span>FORZE</span>
                <img src="<?php echo $config['site_url'];?>/images/a2.jpg">
                <span>(50%)</span>
                <span class="v_s">VS</span>
                <span>(50%)</span>
                <img src="<?php echo $config['site_url'];?>/images/a10.jpg">
                <span>Cyberium</span>
              </div>
            </div>
            <div class="col-lg-1 col-2">
              <div class="j_g"><font color="#ff6850">2</font>&nbsp;:&nbsp;3</div>
            </div>
            <div class="col-lg-3 col-4">
              <div class="s_s"><img src="<?php echo $config['site_url'];?>/images/ss4.jpg"></div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="s_q">收起对手</div>
  </div>
  <div class="zd_cy">
    <div class="sy_bt">
      <div class="b_t">战队成员</div>
      <div class="clear"></div>
    </div>
    <div class="mx_tj">
      <ul class="row">
          <?php
          foreach($return['totalTeamInfo']['data']['playerList'] as $playerInfo)
          {
              ?>
              <li class="col-lg-2 col-4">
                  <div class="n_r"><a href="<?php echo $config['site_url']; ?>/playerdetail/<?php echo $playerInfo['player_id'];?>" title="<?php echo $playerInfo['player_name']?>" target="_blank">
                          <div class="t_p">
                              <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                                  <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                              <?php }else{?>
                                  <img src="<?php echo $playerInfo['logo'];?>" title="<?php echo $playerInfo['player_name'];?>" />
                              <?php }?>
                          </div>
                          <div class="w_z">
                              <div class="x_m"><?php echo $playerInfo['player_name']?></div>
                              <div class="j_s">位置：<?php echo $playerInfo['position']?></div>
                          </div>
                      </a></div>
              </li>
          <?php }?>
      </ul>
    </div>
  </div>
  <div class="zd_tw">
    <div class="sy_bt">
      <div class="b_t">战队赛事</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="zx_nr">
      <div class="tw_lb">
        <ul class="row">
          <li class="col-lg-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp1.jpg"></a></div>
          </li>
          <li class="col-lg-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp2.jpg"></a></div>
          </li>
          <li class="col-lg-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp3.jpg"></a></div>
          </li>
          <li class="col-lg-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp4.jpg"></a></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">战队资讯</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/newslist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="zx_zx">
            <ul>
                <?php foreach($return['keywordMapList']['data'] as $key => $value) {?>
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
          <div class="b_t">战队视频</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="zd_sp">
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
              <li class="col-4">
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp8.jpg"></a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp5.jpg"></a></div>
              </li>
              <li class="col-4">
                <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp6.jpg"></a></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="sy_bt">
      <div class="b_t">相关战队</div>
      <div class="clear"></div>
    </div>
    <div class="zy_nr">
      <div class="xg_zd">
        <ul class="row">
            <?php $i = 1;foreach($return['teamList']['data'] as $team){?>
                <li><a href="<?php echo $config['site_url']."/teamdetail/".$team['team_id'];?>">
                        <div class="t_b">
                            <?php if(isset($return['defaultConfig']['data']['default_team_img'])){?>
                                <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_team_img']['value'];?>" src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                            <?php }else{?>
                                <img src="<?php echo $team['logo'];?>" title="<?php echo $team['team_name'];?>" />
                            <?php }?>
                        </div>
                        <p><?php echo $team['team_name'];?></p>
                    </a></li>
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