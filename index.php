<?php

$redis = new Redis();
$redis->connect('127.0.0.1',6379);


$redis->delete('list');
$redis->rpush('list','a');
$redis->rpush('list','b');
$redis->rpush('list','c');

echo $redis->lpop('list');die;



function getNum($max,$min,$avg) {
	$minAvg = ($min + $avg) / 2;
	$maxAvg = ($avg + $max) / 2;

	$length = $max - $min;

	$minChance = $max - $avg;
	$maxChance = $avg - $min;

	$rand = mt_rand(1,100);
	if ($minChance < $maxChance) {
		
		if ($rand <= $minChance && $rand >= 1) {
			$temp =  range($min, $avg, 10);
		} else {
			$temp =  range($avg, $max, 10);
		}
	} else {
		if ($rand <= $maxChance && $rand >= 1) {
			$temp =  range($avg, $max, 10);
		} else {
			$temp =  range($min, $avg ,10);
		}
	}
	return $temp[array_rand($temp)];

}

$sum = 0;

$max = 200;
$min = 10;
$avg = 50;
$count = 10000;


echo "最大值： " . $max . " ，最小值：" .$min . " ，平均值：" . $avg . "<br>";

$num = $count* $avg; ;
echo "执行了 " . $count . "次，以平均值计算应该是：$num " . "<br>";
for ($i =1;$i<=$count;$i ++) {
	$sum += getNum($max,$min,$avg);
}

echo "实际执行 " .  $count . " 次的总相加值是 " . $sum;



// echo time();die;
// $a = '你好啊';
// echo substr($a,0,3);die;
// $redis = new Redis();
// $redis->connect('127.0.0.1',6379);

// //list

// // $redis->lpush('list','a');
// // $redis->lpush('list','b');
// // $redis->lpush('list','c');

// //$list = $redis->set('age',20,30);
// echo $redis->get('age');
// echo $redis->ttl('age');die;
// echo "<pre>";
// //var_dump($list);die;

// echo $redis->get('name');
// echo "<hr>";
// echo 2;