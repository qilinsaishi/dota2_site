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
    "playerList"=>["dataType"=>"totalPlayerList","page"=>1,"page_size"=>9,"game"=>$config['game'],"source"=>"wanplus","rand"=>1,"cacheWith"=>"currentPage","fields"=>'player_id,player_name,logo'],
    "defaultConfig"=>["keys"=>["contact","sitemap"],"fields"=>["name","key","value"],"site_id"=>$config['site_id']],
    "video_list"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>"7","rand"=>1,"fields"=>"id,title,logo,site_time,create_time","cache_time"=>3600,"cacheWith"=>"currentPage"],
    "tournament"=>["dataType"=>"tournamentList","game"=>$config['game'],"page"=>1,"page_size"=>4,"source"=>"gamedota2"],
    "currentPage"=>["name"=>"info","id"=>$id,"site_id"=>$config['site_id']]
];
$return = curl_post($config['api_get'],json_encode($data),1);
if(!isset($return["information"]['data']['id']))
{
    render404($config);
}
$urlList = ["hero"=>$config['site_url']."/herodetail/",
    "team"=>$config['site_url']."/teamdetail/",
    "player"=>$config['site_url']."/playerdetail/",
];
$return["information"]['data']['keywords_list'] = json_decode($return["information"]['data']['keywords_list'],true);
$return["information"]['data']['scws_list'] = json_decode($return["information"]['data']['scws_list'],true);
$keywordsList = [];$anotherList = [];
if(is_array($return["information"]['data']['keywords_list']))
{
    foreach($return["information"]['data']['keywords_list'] as $type => $list)
    {

        foreach($list as $word => $wordInfo)
        {
            if($type=="another")
            {
                $anotherList[] = $wordInfo['id'];
            }
            if(isset($keywordsList[$word]))
            {
                if($wordInfo['count']>$keywordsList[$word]['count'])
                {
                    $keywordsList[$word] = ["word"=>$word,"id"=>$wordInfo['id'],"type"=>$type,"count"=>$wordInfo['count'],'url'=>$urlList[$type].$wordInfo['id']];
                }
            }
            else
            {
                $keywordsList[$word] = ["word"=>$word,"id"=>$wordInfo['id'],"type"=>$type,"count"=>$wordInfo['count'],'url'=>isset($urlList[$type])?($urlList[$type].$wordInfo['id']):""];
            }
        }
    }
}

//$ids = array_column($keywordsList,"id");

array_multisort(array_combine(array_keys($keywordsList),array_column($keywordsList,"count")),SORT_DESC,$keywordsList);
$ids = array_column($return["information"]['data']['scws_list'],"keyword_id");
$ids = count($ids)>0?implode(",",$ids):"0";
$data2 = [
    "ConnectInformationList"=>["dataType"=>"scwsInformaitonList","ids"=>$ids,"game"=>$config['game'],"page"=>1,"page_size"=>6,"type"=>$return['information']['data']['type']!=4?"1,2,3,5":"4","fields"=>"*","expect_id"=>$id],
    "infoList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>5,
        "type"=>$return['information']['data']['type']!=4?"4":"1,2,3,5","fields"=>"id,title","expect_id"=>$id],
];
if(count($anotherList)>0)
{
    $data2["anotherKeyword"] = ["dataType"=>"anotherKeyword","ids"=>$anotherList,"fields"=>"id,word,url","pageSize"=>count($anotherList)];
}
$return2 = curl_post($config['api_get'],json_encode($data2),1);
$i = 1;$count = 1;
foreach($keywordsList as $word => $wordInfo)
{
    if($i<=3 && strlen($word)>=3)
    {
        $return['information']['data']['content'] = str_replace_limit($word,'<a href="'.$wordInfo['url'].'" target="_blank">'.$word.'</a>',$return['information']['data']['content'],1);
        $i++;
    }
}
$author_found = 0;
foreach($config['author'] as $author)
{
    if( substr($return['information']['data']['author'],0,strlen($author)) == $author)
    {
        $author_found = 1;
        break;
    }
}
if( $author_found == 0 )
{
    $return['information']['data']['content'] = replace_html_tag($return['information']['data']['content'],'<img><br><p>');
}
$imgpreg = '/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i';
preg_match_all($imgpreg,$return['information']['data']['content'],$imgList);
$i = 0;$replace_arr = [];
if(isset($imgList['0']) && count($imgList['0']))
{
    foreach($imgList['0'] as $key => $img)
    {
        //echo "replace:"."###".sprintf("%03d",$key)."###"."\n";
        $return['information']['data']['content'] = str_replace($img,"<br>".$img."<br>",$return['information']['data']['content']);
    }
}
$reg = "/['#']{3,2000}/u";
preg_match_all($reg,$return['information']['data']['content'],$match);
$match = array_unique($match);
$replace_list = [];
foreach($match['0'] as $k => $txt)
{
    $replace_list[strlen($txt)] = $txt;
}
krsort($replace_list);
foreach($replace_list as $key => $txt)
{
    $return['information']['data']['content'] = str_replace($txt,"",$return['information']['data']['content']);
}
?>
<head>
<meta charset="UTF-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=640, user-scalable=no, viewport-fit=cover">
<meta name="format-detection" content="telephone=no">
    <title><?php echo $return['information']['data']['title'];?>_<?php echo $config['game_name'];?>资讯-<?php echo $config['site_name'];?></title>
    <meta name=”Keywords” Content=”<?php echo implode(",",array_keys($keywordsList));?>″>
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
          $type = $return['information']['data']['type']!=4 ?"info":"stra";
          generateNav($config, $type);
          ?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="<?php echo $config['site_url'];?>">首页</a> > <a href="">游戏资讯</a> > 线上积分赛打响!分组情况、整体赛程了解一下</div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="xq_nr">
            <div class="xw_xq">
                <div class="b_t"><?php echo $return['information']['data']['title'];?></div>
                <div class="author">作者：<?php echo $return['information']['data']['author'];?></div>
                <div class="c_time">发布时间：<?php echo date("Y-m-d H:i:s",strtotime($return['information']['data']['create_time'])+8*3600);?> </div>
                <div class="n_r"><br>
                    <?php echo html_entity_decode($return['information']['data']['content']);?></div>
                <div class="b_q">
                    <?php
                    $i = 1;
                    foreach($return["information"]['data']['scws_list'] as $info)
                    {
                        if($i<=3)
                        {
                            echo '<a href="'.$config['site_url'].'/scws/'.urlencode($info['keyword_id']).'/1">'.$info['word'].'</a>';
                        }
                        $i++;
                    }?>
                </div>
            </div>
        </div>
        <div class="sy_bt">
            <div class="b_t">相关<?php echo ($return['information']['data']['type']==4)?"攻略":"资讯";?></div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url']; ?><?php echo ($return['information']['data']['type']==4)?"/strategylist/":"/newslist/";?>">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
          <div class="rm_zx">
            <ul>
                <?php foreach($return2['ConnectInformationList']['data'] as $info){?>
                    <li class="list-item">
                        <a href="<?php echo $config['site_url']."/newsdetail/".$info['content']['id']?>" title="<?php echo $info['content']['title'];?>" target="_blank"><?php echo $info['content']['title'];?></a>
                    </li>
                <?php }?>
            </ul>
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
                        <div class="t_p"><a href=""><img src="<?php echo $tournament['logo'];?>"></a></div>
                <?php }?>
            </ul>
          </div>
        </div>
        <div class="sy_bt">
            <div class="b_t">最新<?php echo ($return['information']['data']['type']==4)?"攻略":"资讯";?></div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url']; ?><?php echo ($return['information']['data']['type']!=4)?"/strategylist/":"/newslist/";?>">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="rm_zx">
            <ul>
                <?php foreach($return2['infoList']['data'] as $info){?>
                    <li>
                        <a href="<?php echo $config['site_url']."/newsdetail/".$info['id']?>" title="<?php echo $info['title'];?>" target="_blank"><?php echo $info['title'];?></a>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">热门视频</div>
          <div class="m_r">
            <div class="bg"></div>
              <a href="<?php echo $config['site_url'];?>/videolist/">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr m_b">
          <div class="yx_gl">
            <ul>
                <?php foreach($return['video_list']['data'] as $key => $video) {?>
                    <li>
                        <span>视频</span>
                        <a href="<?php echo $config['site_url'];?>/videodetail/<?php echo $video['id'];?>"><?php echo $video['title'];?></a>
                    </li>
                <?php }?>
            </ul>
          </div>
        </div>
        <div class="sy_bt">
          <div class="b_t">明星选手</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="<?php echo $config['site_url']."/playerlist/";?>">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zy_nr">
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