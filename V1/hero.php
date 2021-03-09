<!DOCTYPE html>
<html lang="zh-CN">
<?php
 $hero_id = $_GET['hero_id'];
 if($hero_id<=0)
 {
     render404($config);
 }
 require_once "function/init.php";
$data = [
    "dota2Hero"=>[$hero_id],
    "playerList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>9,"source"=>"wanplus","fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage","cache_time"=>7*86400],
    "keywordMapList"=>["fields"=>"content_id","source_type"=>"hero","source_id"=>$hero_id,"page_size"=>8,"content_type"=>"information","list"=>["page_size"=>6,"type"=>4,"fields"=>"id,title,create_time"],"cacheWith"=>"currentPage","cache_time"=>7*86400],
    "currentPage"=>["name"=>"gameInt","site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(!isset($return["dota2Hero"]['data']['hero_id']))
{
    render404($config);
}
$return['dota2Hero']['data']['roles'] = json_decode($return['dota2Hero']['data']['roles'],true);
$return['dota2Hero']['data']['stat'] = json_decode($return['dota2Hero']['data']['stat'],true);
$return['dota2Hero']['data']['skill'] = json_decode($return['dota2Hero']['data']['skill'],true);
$return['dota2Hero']['data']['talent'] = json_decode($return['dota2Hero']['data']['talent'],true);

array_multisort(array_column($return['dota2Hero']['data']['talent'],"level"),SORT_ASC,$return['dota2Hero']['data']['talent']);
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $config['game_name'];?><?php echo $return['dota2Hero']['data']['cn_name'].$return['dota2Hero']['data']['hero_name'];?>介绍_<?php echo $return['dota2Hero']['data']['cn_name'].$return['dota2Hero']['data']['hero_name'];?>攻略-<?php echo $config['site_name'];?></title>
    <?php $desctiption = mb_str_split($return['dota2Hero']['data']['description'],200);
    if(strlen($desctiption)<10){$desctiption = "";}?>
    <meta name="description" content="<?php echo $desctiption;?>">
    <meta name=”Keywords” Content=”<?php echo $return['dota2Hero']['data']['hero_name'];?>,<?php echo $config['game_name'];?><?php echo $return['dota2Hero']['data']['hero_name'];?>″>    <?php renderHeaderJsCss($config);?>
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
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <a href="<?php echo $config['site_url']."/herolist/";?>">英雄介绍</a> > <?php echo $return['dota2Hero']['data']['hero_name'];?></div>
  <div class="yx_js">
    <div class="row">
      <div class="col-lg-5 col-12">
        <div class="t_p"><img src="<?php echo $return['dota2Hero']['data']['logo'];?>"></div>
      </div>
      <div class="col-lg-5 col-12">
        <div class="w_z">
          <div class="x_m"><img src="<?php echo $return['dota2Hero']['data']['logo_icon'];?>"><?php echo $return['dota2Hero']['data']['hero_name'];?></div>
          <div class="j_s">
            <ul>
              <li><span>攻击类型</span>远程</li>
              <li><span>定位</span><?php echo implode("-",$return['dota2Hero']['data']['roles']);?></li>
              <li><span>阵营</span><img src="<?php echo $return['dota2Hero']['data']['logo_rediant'];?>"><?php echo $return['dota2Hero']['data']['rediant'];?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="yx_gs">
    <div class="sy_bt">
      <div class="b_t">英雄故事</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="gs_nr"><?php echo $return['dota2Hero']['data']['description'];?>
    <div class="clear"></div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-7 col-12">
        <div class="sy_bt">
          <div class="b_t">英雄属性</div>
          <div class="clear"></div>
        </div>
        <div class="ny_nr">
          <div class="jn_js">
            <div class="hd">
              <ul>
                  <?php foreach($return['dota2Hero']['data']['stat'] as $stat){?>
                <li><img src="<?php echo $stat['stat_logo'];?>" title="<?php echo $stat['property_title'];?>"></li>
                  <?php }?>
              </ul>
            </div>
            <div class="bd">
                <?php foreach($return['dota2Hero']['data']['stat'] as $stat){?>
                    <div class="n_r">
                        <?php foreach($stat['property_cont'] as $detail){
                            $detail = str_replace("span","strong",$detail);
                            echo $detail."<br>";?>
                    <?php }?>
                    </div>
                <?php }?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-12">
        <div class="sy_bt">
          <div class="b_t">天赋树</div>
          <div class="clear"></div>
        </div>
        <div class="ny_nr">
          <div class="mw_dp">
            <div class="hd">
              <ul class="row">
                <?php foreach($return['dota2Hero']['data']['talent'] as $talent){?>
                  <li><?php echo $talent['level'];?></li>
                  <?php }?>
              </ul>
            </div>
            <div class="bd">
                <?php foreach($return['dota2Hero']['data']['talent'] as $talent){?>
                    <div class="n_r">
                        <div class="j_n">
                            <span><?php echo $talent['explain']['0'];?></span>
                            <span><?php echo $talent['explain']['1'];?></span>
                        </div>
                        <div class="j_g"><?php echo $talent['explain']['0'].",".$talent['explain']['1'];?></div>
                    </div>
                <?php }?>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
  <div class="sy_zh">
    <div class="sy_bt">
      <div class="b_t">技能介绍</div>
      <div class="clear"></div>
    </div>
    <div class="zy_nr">
      <div class="yx_gx">
        <div class="hd">
          <ul>
              <?php foreach($return['dota2Hero']['data']['skill'] as $skill){?>
                  <li><img src="<?php echo $skill['skill_logo'];?>"></li>
              <?php }?>
          </ul>
        </div>
        <div class="bd">
            <?php foreach($return['dota2Hero']['data']['skill'] as $skill){?>
                <div class="n_r">
                    <h3><?php echo $skill['title'];?></h3>
                    <p><?php echo $skill['skill_intro']."，".$skill['skill_intro'];?></p>
                    <ul class="row">
                        <?php foreach($skill['skill_list'] as $skill_detail){
                            $skill_detail = str_replace(":","</span>",$skill_detail);
                            $skill_detail = str_replace("：","</span>",$skill_detail);
                            echo "<li><span>".$skill_detail."</li>";
                            ?>

                        <?php }?>
                    </ul>
                </div>
            <?php }?>
        </div>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">相关选手</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/playerlist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="rm_xs">
            <ul class="row">
                <?php
                foreach($return["playerList"]['data'] as $type => $player)
                {?>
                    <li class="col-4">
                        <div class="t_p"><a href="<?php echo $config['site_url'];?>/playerdetail/<?php echo $player['player_id'];?>">
                                <img src="<?php echo $player['logo'];?>">
                                <div class="w_z"><?php echo $player['player_name'];?></div>
                            </a></div>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">英雄攻略</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/strategylist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="zx_zx">
            <ul>
                <?php foreach($return['keywordMapList']['data'] as $key => $value) {?>
                    <li>
                        <a href="<?php echo $config['site_url'];?>/newsdetail/<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="sy_bt">
          <div class="b_t">游戏视频</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="yx_gl">
            <ul>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
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