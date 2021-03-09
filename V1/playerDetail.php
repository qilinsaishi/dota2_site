<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$player_id = $_GET['player_id']??0;
if($player_id<=0)
{
    render404($config);
}
$data = [
    "totalPlayerInfo"=>[$player_id],
    "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
    "keywordMapList"=>["fields"=>"content_id","source_type"=>"player","source_id"=>$player_id,"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>6,"fields"=>"id,title,create_time"]],
    "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>12,"source"=>"wanplus","fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>86400*7],
    "defaultConfig"=>["keys"=>["contact","sitemap","default_player_img","default_team_img"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "currentPage"=>["name"=>"player","id"=>$player_id,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(!isset($return["totalPlayerInfo"]['data']['player_id']) || $return["totalPlayerInfo"]['data']['game'] != $config['game'] )
{
    render404($config);
}
if(count($return['keywordMapList']['data'])==0)
{
    $data2 = [
        "keywordMapList"=>["fields"=>"content_id","source_type"=>"team","source_id"=>$player_id,"page_size"=>100,"content_type"=>"information","list"=>["page_size"=>6,"fields"=>"id,title,create_time"]],
        "currentPage"=>["name"=>"player","id"=>$player_id,"site_id"=>$config['site_id']]
    ];
    $return2 = curl_post($config['api_get'],json_encode($data2),1);
    $connectedInformation = $return2['keywordMapList']['data'];
}
else
{
    $connectedInformation = $return['keywordMapList']['data'];
}
$data3 = [
    "playerList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>"wanplus","fields"=>'player_id,player_name,logo',"rand"=>1,"except_team"=>$return['totalPlayerInfo']['data']['team_id'],"cacheWith"=>"currentPage"],
    "currentPage"=>["name"=>"player","id"=>$player_id,"site_id"=>$config['site_id']]
];
$return3 = curl_post($config['api_get'],json_encode($data3),1);
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $return['totalPlayerInfo']['data']['player_name'];?>个人资料_<?php echo $return['totalPlayerInfo']['data']['teamInfo']['team_name'];?><?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo $return['totalPlayerInfo']['data']['position'];}?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>信息简介-<?php echo $config['site_name']?></title>
    <meta name="description" content="<?php echo $return['totalPlayerInfo']['data']['player_name'];?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>，真名为<?php echo $return['totalPlayerInfo']['data']['player_name'];?>，<?php echo $return['totalPlayerInfo']['data']['country'];?>人，<?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo "在".$return['totalTeamInfo']['data']['team_name']."中长期打".$return['totalPlayerInfo']['data']['position'].".位置，";}?><?php if(count($return['totalPlayerInfo']['data']['playerList'])>0){echo "与".implode(",",array_column($return['totalPlayerInfo']['data']['playerList'],"player_name"))."为队友";}?>。">
    <meta name=”Keywords” Content=”<?php echo $return['totalPlayerInfo']['data']['player_name'];?>个人资料,<?php echo $return['totalPlayerInfo']['data']['teamInfo']['team_name'];?><?php if(!in_array($return['totalPlayerInfo']['data']['position'],["","?"])){echo $return['totalPlayerInfo']['data']['position'];}?><?php echo $return['totalPlayerInfo']['data']['player_name'];?>信息简介">
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
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <a href="">选手列表</a> > 选手详情</div>
  <div class="cy_js">
    <div class="row">
      <div class="col-lg-2 col-4">
        <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
      </div>
      <div class="col-lg-10 col-8">
        <div class="j_s">
          <div class="x_m"><?php echo $return['totalPlayerInfo']['data']['player_name']?></div>
          <div class="j_j">地域：<?php echo $return['totalPlayerInfo']['data']['country'];?><br>
          中文名：<?php echo $return['totalPlayerInfo']['data']['cn_name'];?><br>
          英文名：<?php echo $return['totalPlayerInfo']['data']['en_name'];?><br>
          游戏ID/位置：<?php echo $return['totalPlayerInfo']['data']['position'];?><br>
          个人简介：<?php echo $return['totalPlayerInfo']['data']['description'];?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="zd_cy">
    <div class="sy_bt">
      <div class="b_t">同队成员介绍</div>
      <div class="clear"></div>
    </div>
    <div class="mx_tj">
      <ul class="row">
        <?php foreach($return['totalPlayerInfo']['data']['playerList'] as $player){?>
          <li class="col-lg-2 col-4">
              <div class="n_r"><a href="<?php echo $config['site_url']."/playerdetail/".$player['player_id'];?>">
                      <div class="t_p">
                          <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                              <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                          <?php }else{?>
                              <img src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                          <?php }?>
                      </div>
                      <div class="w_z">
                          <div class="x_m"><?php echo $player['player_name'];?></div>
                          <div class="j_s">位置: <?php echo $player['position'];?></div>
                      </div>
                  </a></div>
        <?php }?>
      </ul>
    </div>
  </div>
  <div class="ls_zj">
    <div class="sy_bt">
      <div class="b_t">历史比赛</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="bs_cj">
      <table width="100%" border="1">
        <tr>
          <th scope="col">时间</th>
          <th scope="col">对阵</th>
          <th scope="col">英雄</th>
          <th scope="col">結果</th>
          <th scope="col">K</th>
          <th scope="col">D</th>
          <th scope="col">A</th>
          <th scope="col">正補</th>
          <th scope="col">反補</th>
          <th scope="col" class="w_h">出裝</th>
        </tr>
        <tr>
          <td>2020-02-05</td>
          <td>VG vs TYU</td>
          <td><img src="<?php echo $config['site_url'];?>/images/yx1.jpg"></td>
          <td><span>勝</span></td>
          <td>8</td>
          <td>1</td>
          <td>14</td>
          <td>206</td>
          <td>5</td>
          <td class="w_h"><img src="<?php echo $config['site_url'];?>/images/cz1.jpg"><img src="<?php echo $config['site_url'];?>/images/cz2.jpg"><img src="<?php echo $config['site_url'];?>/images/cz3.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz5.jpg"></td>
        </tr>
        <tr>
          <td>2020-02-05</td>
          <td>VG vs TYU</td>
          <td><img src="<?php echo $config['site_url'];?>/images/yx1.jpg"></td>
          <td><span>勝</span></td>
          <td>8</td>
          <td>1</td>
          <td>14</td>
          <td>206</td>
          <td>5</td>
          <td class="w_h"><img src="<?php echo $config['site_url'];?>/images/cz1.jpg"><img src="<?php echo $config['site_url'];?>/images/cz2.jpg"><img src="<?php echo $config['site_url'];?>/images/cz3.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz5.jpg"></td>
        </tr>
        <tr>
          <td>2020-02-05</td>
          <td>VG vs TYU</td>
          <td><img src="<?php echo $config['site_url'];?>/images/yx1.jpg"></td>
          <td><span>勝</span></td>
          <td>8</td>
          <td>1</td>
          <td>14</td>
          <td>206</td>
          <td>5</td>
          <td class="w_h"><img src="<?php echo $config['site_url'];?>/images/cz1.jpg"><img src="<?php echo $config['site_url'];?>/images/cz2.jpg"><img src="<?php echo $config['site_url'];?>/images/cz3.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz5.jpg"></td>
        </tr>
        <tr>
          <td>2020-02-05</td>
          <td>VG vs TYU</td>
          <td><img src="<?php echo $config['site_url'];?>/images/yx1.jpg"></td>
          <td><span>勝</span></td>
          <td>8</td>
          <td>1</td>
          <td>14</td>
          <td>206</td>
          <td>5</td>
          <td class="w_h"><img src="<?php echo $config['site_url'];?>/images/cz1.jpg"><img src="<?php echo $config['site_url'];?>/images/cz2.jpg"><img src="<?php echo $config['site_url'];?>/images/cz3.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz4.jpg"><img src="<?php echo $config['site_url'];?>/images/cz5.jpg"></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/playerlist/">MORE +</a>
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
          <div class="b_t">相关资讯</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/newslist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="yx_gl">
            <ul>
                <?php foreach($connectedInformation as $key => $value) {?>
                    <li>
                        <span>视频</span>
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
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="zx_nr">
      <div class="tw_lb">
        <ul class="row">
          <li class="col-3">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp5.jpg"></a></div>
          </li>
          <li class="col-3">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp6.jpg"></a></div>
          </li>
          <li class="col-3">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp7.jpg"></a></div>
          </li>
          <li class="col-3">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp8.jpg"></a></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="zd_cy m_b">
    <div class="sy_bt">
      <div class="b_t">相关队员推荐</div>
      <div class="clear"></div>
    </div>
    <div class="mx_tj">
      <ul class="row">
        <?php foreach($return3['playerList']['data'] as $player){?>
            <li class="col-lg-2 col-4">
                <div class="n_r"><a href="<?php echo $config['site_url']."/playerdetail/".$player['player_id'];?>">
                        <div class="t_p">
                            <?php if(isset($return['defaultConfig']['data']['default_player_img'])){?>
                                <img lazyload="true" data-original="<?php echo $return['defaultConfig']['data']['default_player_img']['value'];?>" src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                            <?php }else{?>
                                <img src="<?php echo $player['logo'];?>" title="<?php echo $player['player_name'];?>" />
                            <?php }?>
                        </div>
                    </a></div>
            </li>
        <?php }?>
      </ul>
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