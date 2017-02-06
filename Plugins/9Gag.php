<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
if(preg_match('/^\/(9[Gg]ag)/s',$text)){
	$gag = json_decode(file_get_contents('http://api-9gag.herokuapp.com'));
	$number = rand(0,2);
	$photo = $gag[$number]->src;
	file_put_contents('Admin/9gag.png',file_get_contents($photo));
	SendPhoto($chat_id , new CURLFILE('Admin/9gag.png'),"@Norbert_Team");
  }
  ?>