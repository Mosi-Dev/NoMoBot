<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
if(preg_match('/^\/([Ll]ogo) (.*)/s',$text)){
	$text = str_replace('/Logo ','',$text);
	$text = str_replace('/logo ','',$text);
	$photo = file_get_contents('http://api.norbert-team.ir/photo-fa/?key=slm&size=140&color=white&text='.urlencode($text));
	file_put_contents('Admin/Logo.png',$photo);
	SendPhoto($chat_id , new CURLFILE('Admin/Logo.png'),"@Norbert_Team");
  }
  ?>
