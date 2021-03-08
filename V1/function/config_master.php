<?php

$base_config = [
    'site_name'=>"70电竞",
    'api_url'=>'http://api.qilindianjing.com',//api站点URL
    'site_url'=>'https://www.kylinesport.com',//本站URl
    'game'=>"dota2",
    'site_id'=>4,
    'source'=>"gamedota2",
];
$additional_config = [
    'site_description'=> $base_config['site_name'].'致力于服务广大'.$base_config['game_name'].'玩家，为'.$base_config['game_name'].'玩家提供丰富的'.$base_config['game_name'].'游戏攻略、'.$base_config['game_name'].'电子竞技赛事资讯、数据分析及内容解读。',
    'api_get' => $base_config['api_url']."/get",
    'api_sitemap' => $base_config['api_url']."/sitemap",
    'navList' => ['index'=>['url'=>"","name"=>"首页"],
        'game'=>['url'=>"gameint/","name"=>"游戏介绍"],
        'hero'=>['url'=>"herolist/","name"=>"英雄介绍"],
        'match'=>['url'=>"matchlist/","name"=>"游戏赛事"],
        'team'=>['url'=>"teamlist/","name"=>"游戏战队"],
        'player'=>['url'=>"playerlist/","name"=>"游戏选手"],
        'info'=>['url'=>"newslist/","name"=>"游戏资讯"],
        'stra'=>['url'=>"strategylist/","name"=>"游戏攻略"],
        'video'=>['url'=>"video/","name"=>"游戏视频"],
    ],
    'hero_type' => [
        'int'=>'智力',
        'agi'=>'敏捷',
        'str'=>'力量',
    ]
];
return array_merge($base_config,$additional_config);