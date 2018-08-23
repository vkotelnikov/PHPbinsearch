<?php 
echo 'hello';
$filename = 'array_file.txt';
if ($handle = fopen($filename, 'r'));
	echo 'YES';
// $contents = fread($handle, filesize($filename));
// var_dump($contents);
$total_lines = 29999;
$first = 1;
$last = 29999;
$mid = floor($first + ($last - $first) / 2);
$line = 0;
$key = 'HWmc';
$i = 1;
while ($first < $last) 
{
	while (($content = fgets($handle)) !== FALSE) 
	{
		if ($line == $mid) 
		{
			$content_key = explode('	', $content);
			if (strcmp($content_key[0], $key) > 0) 
			{
				$last = $mid;
				$line = 0;
				fclose($handle);
				$handle = fopen($filename, 'r');
			} else {
				$first = $mid+1;
				$line = $mid;
			}
			if (strcmp($content_key[0], $key) == 0) 
			{
				echo 'Key given: '.$key."\t Key found: ".$content_key[0].' Value: '.$content_key[1];
				$first = $last;
				break;
			}
			$mid = floor($first + ($last - $first) / 2);
	       	break;
	   }   
	   $line++;
	   // echo $line."\n";
	}
}
echo $content;
echo 'first '.$first;
echo ' last'.$last;
