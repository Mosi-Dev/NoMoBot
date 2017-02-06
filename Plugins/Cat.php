<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
  if(preg_match('/^\/([Cc]at)/s',$text)){
    file_put_contents('Admin/Cat.jpg',file_get_contents('http://thecatapi.com/api/images/get?format=src&type=jpg'));
	SendPhoto($chat_id , new CURLFile('Admin/Cat.jpg') , "@Norbert_Team");
  }
  ?>