<?php 
/********* File name and number of lines ***********/
$filename = 'array_file.txt';
$handle = fopen($filename, 'r');
$total_lines = 29999;
$first = 1;
$last = 29999;
$mid = floor($first + ($last - $first) / 2);
$line = 0;
/********* Key to find ***********/
$key = 'HWmc';
/*********************************/
$found = FALSE;
while ($first < $last) 
{
	while (($content = fgets($handle)) !== FALSE) 
	{
		if ($line == $mid) 
		{
			$content_key = explode('	', $content);
			/*content_key[0] contains key of the current line*/
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
				$found = TRUE;
				break;
			}
			$mid = floor($first + ($last - $first) / 2);
	       	break;
	   }   
	   $line++;
	}
}
if (!$found) {
	echo "Key was not found";
}