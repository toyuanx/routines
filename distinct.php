<?php

/*
 * md5方法去重
 * shoveny@163.com
 */

//exec("find . -type f", $files);
exec("find  C:\Users\toyuanx\Pictures\distinct -type f", $files); 
$arr = array();
$del = array();

$n = 0;
foreach ($files as $file) {
	$file = iconv('UTF-8', 'GB18030', trim($file));	 //转换编码使操作系统与PHP编码一致
	
	if (!$file) {
		continue;
	}
	$n ++;
	$md5 = md5_file($file);

	if (isset($arr[$md5])) {
		$del[] = $file;
		echo $file . ' deleted successfully!' . PHP_EOL;
		unlink("$file");
	} else {
		$arr[$md5] = 1;
	}
}

echo "del " . count($del) . " files\n";
