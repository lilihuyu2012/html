<?php

echo time();die;
$a = '你好啊';
echo substr($a,0,3);die;
$redis = new Redis();
$redis->connect('127.0.0.1',6379);

//list

// $redis->lpush('list','a');
// $redis->lpush('list','b');
// $redis->lpush('list','c');

//$list = $redis->set('age',20,30);
echo $redis->get('age');
echo $redis->ttl('age');die;
echo "<pre>";
//var_dump($list);die;

echo $redis->get('name');
echo "<hr>";
echo 2;