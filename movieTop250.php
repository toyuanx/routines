<?php
/**
 * 抓取豆瓣电影Top250
 */

class F {

	//抓取页面
	public static function start() {
		for ($i = 0; $i < 250; $i+=25) {
			//豆瓣电影Top250的页面
			$url = "https://movie.douban.com/top250?start=$i&filter=";
			$contents = file_get_contents($url);
			//调用封装在函数里的正则匹配
			$msg = F::_B($contents);
			foreach ($msg as $key => $value) {
				//遍历写入文件
				file_put_contents("movie.txt", $value . PHP_EOL, FILE_APPEND);
			}
		}
	}

	//字符串筛选
	public static function _B($str) {
		$pattern = '/<a.*?<span class="title">([^<]+)/s';
		preg_match_all($pattern, $str, $arr);
		//返回匹配到的数组
		return $arr[1];
	}

}

//调用
F::start();

