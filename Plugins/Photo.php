<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
  if(preg_match('/^\/([Pp]hoto)/',$text) and $reply){
    if($reply->sticker){
      $file = $reply->sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Admin/Sticker.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
      SendPhoto($chat_id , new CURLFile('Admin/Sticker.png') , "@Norbert_Team");
    }
  }
  ?>
