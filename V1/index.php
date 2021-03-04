﻿<!DOCTYPE html>
<html lang="zh-CN">
 <?php
 require_once "function/init.php";
 $data = [
     "links"=>["page"=>1,"page_size"=>6,"site_id"=>$config['site_id']],
     "informationList"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"1,2,3,5","fields"=>"id,title,site_time,create_time"],
     "informationList_2"=>["dataType"=>"informationList","game"=>$config['game'],"page"=>1,"page_size"=>8,"type"=>"4","fields"=>"id,title,site_time,create_time"],
     "playerList"=>["dataType"=>"totalPlayerList","game"=>$config['game'],"page"=>1,"page_size"=>6,"source"=>$config['source'],"fields"=>'player_id,player_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
     "teamList"=>["dataType"=>"totalTeamList","game"=>$config['game'],"page"=>1,"page_size"=>12,"source"=>$config['source'],"fields"=>'team_id,team_name,logo',"rand"=>1,"cacheWith"=>"currentPage"],
     "currentPage"=>["name"=>"index","site_id"=>$config['site_id']]
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
          <?php generateNav($config,"index");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="swiper-container sj_ban">
  <div class="swiper-wrapper">
    <div class="swiper-slide" style="background:url(images/ban1.jpg) no-repeat center / cover;"></div>
    <div class="swiper-slide" style="background:url(images/ban1.jpg) no-repeat center / cover;"></div>
    <div class="swiper-slide" style="background:url(images/ban1.jpg) no-repeat center / cover;"></div>
    <div class="swiper-slide" style="background:url(images/ban1.jpg) no-repeat center / cover;"></div>
  </div>
  <div class="swiper-pagination"></div>
</div>
<div class="container">
  <div class="swiper-container pc_ban">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="<?php echo $config['site_url'];?>/images/ban1.jpg"></div>
      <div class="swiper-slide"><img src="<?php echo $config['site_url'];?>/images/ban1.jpg"></div>
      <div class="swiper-slide"><img src="<?php echo $config['site_url'];?>/images/ban1.jpg"></div>
      <div class="swiper-slide"><img src="<?php echo $config['site_url'];?>/images/ban1.jpg"></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <div class="sy_zh">
    <div class="sy_bt">
      <div class="b_t">热门英雄</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="zy_nr">
      <div class="rm_yx">
        <ul class="row">
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx1.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx2.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx3.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx4.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx5.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx6.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx7.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx8.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx9.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx10.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx11.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx12.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx13.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx14.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx15.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx16.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx17.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx18.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx19.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx20.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx21.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx22.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx23.png"></a></div>
          </li>
          <li>
            <div class="t_b"><a href=""><img src="<?php echo $config['site_url'];?>/images/yx24.png"></a></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="zd_tw">
    <div class="sy_bt">
      <div class="b_t">热门赛事</div>
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
          <div class="b_t">热门战队</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="rm_zd">
            <ul>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a1.jpg"></div>
                      <div class="w_z">Newbee</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a2.jpg"></div>
                      <div class="w_z">FORZE</div>
                    </a></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a3.jpg"></div>
                      <div class="w_z">Predator</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a4.jpg"></div>
                      <div class="w_z">DCEAW</div>
                    </a></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a5.jpg"></div>
                      <div class="w_z">SAG</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a6.jpg"></div>
                      <div class="w_z">elephant</div>
                    </a></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a7.jpg"></div>
                      <div class="w_z">Phoenix</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a8.jpg"></div>
                      <div class="w_z">matador</div>
                    </a></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a9.jpg"></div>
                      <div class="w_z">NIGMA</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a10.jpg"></div>
                      <div class="w_z">Cyberium</div>
                    </a></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a5.jpg"></div>
                      <div class="w_z">SAG</div>
                    </a></div>
                  </div>
                  <div class="col-6">
                    <div class="n_r"><a href="">
                      <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/a6.jpg"></div>
                      <div class="w_z">elephant</div>
                    </a></div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门选手</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="zh_nr">
          <div class="mx_tj">
            <ul class="row">
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a1.png"></div>
                  <div class="w_z">Danil Skutin</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a2.png"></div>
                  <div class="w_z">Nikobaby</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a3.png"></div>
                  <div class="w_z">Miracle</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a4.png"></div>
                  <div class="w_z">Limmp</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a5.png"></div>
                  <div class="w_z">MNZ</div>
                </a></div>
              </li>
              <li class="col-4">
                <div class="n_r"><a href="">
                  <div class="t_p"><img src="<?php echo $config['site_url'];?>/images/a6.png"></div>
                  <div class="w_z">BOOM</div>
                </a></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sy_zh">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">热门资讯</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
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
      <div class="col-lg-6 col-12">
        <div class="sy_bt">
          <div class="b_t">游戏攻略</div>
          <div class="m_r">
            <div class="bg"></div>
            <a href="">MORE +</a>
          </div>
          <div class="clear"></div>
        </div>
        <div class="xw_nr">
          <div class="yx_gl">
            <ul>
                <?php foreach($return['informationList_2']['data'] as $key => $value) {?>
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
          <li class="col-md-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp5.jpg"></a></div>
          </li>
          <li class="col-md-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp6.jpg"></a></div>
          </li>
          <li class="col-md-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp7.jpg"></a></div>
          </li>
          <li class="col-md-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp8.jpg"></a></div>
          </li>
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
  <div class="container"><span>Copyright©2021 www.qilindianjing.com All rights reserved</span><span>琼ICP备19001306号-2</span></div>
</div>
<div class="fh_top"><img src="<?php echo $config['site_url'];?>/images/fh_top.png"></div>
<script type="text/javascript" src="js/swiper.min.js"></script> 
<script type="text/javascript">
  var galleryTop = new Swiper('.pc_ban', {
	pagination:'.swiper-pagination',
	paginationClickable: true,
	slideToClickedSlide: true,
	autoplayDisableOnInteraction:false,
	autoplay:6000,
	loop:true,
  });
</script>
<script type="text/javascript">
  var galleryTop = new Swiper('.sj_ban', {
	pagination:'.swiper-pagination',
	paginationClickable: true,
	slideToClickedSlide: true,
	autoplayDisableOnInteraction:false,
	autoplay:6000,
	loop:true,
  });
</script>
</body>
</html>