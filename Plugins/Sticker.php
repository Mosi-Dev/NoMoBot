<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
  if(preg_match('/^\/([Ss]ticker)/',$text) and $reply){
    if($reply->photo){
	  $photo = $reply->photo;
      $file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Admin/Photo-S.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
      SendSticker($chat_id , new CURLFile('Admin/Photo-S.png') , "@Norbert_Team");
    }
  }
  ?>