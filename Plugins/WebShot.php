<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
if(preg_match('/^\/([Ww]eb[Ss]hot) (.*)/s',$text)){
	preg_match('/^\/([Ww]eb[Ss]hot) (.*)/s',$text,$match);
	$photo = file_get_contents('http://api.screenshotmachine.com/?key=b645b8&size=X&url='.$match[2]);
	file_put_contents('Admin/webshot.png',$photo);
	SendPhoto($chat_id , new CURLFILE('Admin/webshot.png'),"@Norbert_Team");
  }
  ?>