<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
if(preg_match('/^\/([Qq]r) (.*)/s',$text)){
    preg_match('/^\/([Qq]r) (.*)/s',$text,$match);
    file_put_contents('Admin/Poster.jpg',file_get_contents('https://api.qrserver.com/v1/create-qr-code/?size=500x500&data='.urlencode($match[2])));
	SendPhoto($chat_id , new CURLFile('Admin/Poster.jpg'),"@Norbert_Team");
  }
  ?>