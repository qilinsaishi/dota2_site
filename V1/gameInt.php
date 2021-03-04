﻿<!DOCTYPE html>
<html lang="zh-CN">
<?php
require_once "function/init.php";
$data = [
    "gameConfig"=>$config['game'],
    "currentPage"=>["name"=>"gameInt","site_id"=>$config['site_id']]
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
          <?php generateNav($config,"game");?>
      </ul>
    </div>  
    <div class="clear"></div>
  </div>
</div>
<div class="head_h"></div>
<div class="container">
  <div class="dq_wz"><a href="">首页</a> > DOTA2介绍</div>
  <div class="yx_jj">
    <div class="sy_bt">
      <div class="b_t">游戏介绍</div>
      <div class="clear"></div>
    </div>
    <div class="jj_nr">
      <div class="row">
        <div class="col-lg-5 col-12">
          <div class="t_p"><img src="<?php echo $return['gameConfig']['data']['logo'];?>"></div>
        </div>
        <div class="col-lg-7 col-12">
          <div class="w_z"> <?php echo $return['gameConfig']['data']['content'];?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="yx_lb">
    <div class="sy_bt">
      <div class="b_t">英雄列表</div>
      <div class="m_r">
        <div class="bg"></div>
        <a href="">MORE +</a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="yx_nr">
      <div class="row">
        <div class="yx_lx"><a href="">智力型</a></div>
        <div class="yx_zs">
          <ul class="row">
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx9.png"></div>
                <div class="w_z">力丸</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx2.png"></div>
                <div class="w_z">上古泰坦</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx4.png"></div>
                <div class="w_z">劍聖</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx5.png"></div>
                <div class="w_z">馬爾斯</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx6.png"></div>
                <div class="w_z">烏爾薩</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx7.png"></div>
                <div class="w_z">聖堂刺客</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx8.png"></div>
                <div class="w_z">劍聖</div>
              </a></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="yx_lx"><a href="">敏捷型</a></div>
        <div class="yx_zs">
          <ul class="row">
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx9.png"></div>
                <div class="w_z">力丸</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx2.png"></div>
                <div class="w_z">上古泰坦</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx4.png"></div>
                <div class="w_z">劍聖</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx5.png"></div>
                <div class="w_z">馬爾斯</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx6.png"></div>
                <div class="w_z">烏爾薩</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx7.png"></div>
                <div class="w_z">聖堂刺客</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx8.png"></div>
                <div class="w_z">劍聖</div>
              </a></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="yx_lx"><a href="">力量型</a></div>
        <div class="yx_zs">
          <ul class="row">
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx9.png"></div>
                <div class="w_z">力丸</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx2.png"></div>
                <div class="w_z">上古泰坦</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx4.png"></div>
                <div class="w_z">劍聖</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx5.png"></div>
                <div class="w_z">馬爾斯</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx6.png"></div>
                <div class="w_z">烏爾薩</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx7.png"></div>
                <div class="w_z">聖堂刺客</div>
              </a></div>
            </li>
            <li>
              <div class="n_r"><a href="">
                <div class="t_b"><img src="<?php echo $config['site_url'];?>/images/yx8.png"></div>
                <div class="w_z">劍聖</div>
              </a></div>
            </li>
          </ul>
        </div>
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
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
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
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
              <li>
                <span>视频</span>
                <div class="s_j">01-19</div>
                <a href="">皇族老板是谁？皇族老板跟RYL有什么关系？</a>
              </li>
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
          <li class="col-lg-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp5.jpg"></a></div>
          </li>
          <li class="col-lg-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp6.jpg"></a></div>
          </li>
          <li class="col-lg-3 col-6">
            <div class="t_p"><a href=""><img src="<?php echo $config['site_url'];?>/images/tp7.jpg"></a></div>
          </li>
          <li class="col-lg-3 col-6">
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
</body>
</html>