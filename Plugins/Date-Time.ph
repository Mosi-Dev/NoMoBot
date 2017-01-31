<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
$date_and_time = json_decode(file_get_contents('http://api.norbert-team.ir/date-time'));
if(preg_match('/^\/([Dd]ate)/s',$text)){
	$date_fa = $date_and_time->date_fa;
	$date_en = $date_and_time->date_en;
	SendMessage($chat_id , "<b>تاریخ فارسی:</b> $date_fa
	<b>تاریخ انگلیسی:</b> $date_en","html");
  }
  elseif(preg_match('/^\/([Tt]ime)/s',$text)){
	$time_fa = $date_and_time->time_fa;
	$time_en = $date_and_time->time_en;
	SendMessage($chat_id , "<b>ساعت فارسی:</b> $time_fa
	<b>ساعت انگلیسی:</b> $time_en","html");
  }
  ?>
