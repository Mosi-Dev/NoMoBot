<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
if(preg_match("/^\/([Ss]tats)/",$text) and in_array($from_id,$ADMIN) ){
    $user = file_get_contents("Admin/Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	$Block = file_get_contents("Admin/Block-List.txt");
    $Block_id = explode("\n",$Block);
    $Block_count = count($Block_id) -1;
	SendMessage($chat_id , "تعداد کل اعضا: $member_count
	تعداد لیست سیاه: $Block_count" , "html");
}
elseif(preg_match("/^\/([Ss]et[Ss]tart)/",$text) and in_array($from_id,$ADMIN) and $reply){
	file_put_contents("Admin/Start.txt",$reply->text);
	SendMessage($chat_id , "متن استارت ثبت شد." , "html");
}
elseif(preg_match("/^\/([Ss]et[Hh]elp)/",$text) and in_array($from_id,$ADMIN) and $reply){
	file_put_contents("Admin/Help.txt",$reply->text);
	SendMessage($chat_id , "متن راهنما ثبت شد." , "html");
}
elseif(preg_match("/^\/([Bb]an) (.*)/",$text) and in_array($from_id,$ADMIN) ){
	preg_match("/^\/([Bb]an) (.*)/",$text,$match);
	file_put_contents("Admin/Block-List.txt",$block."\n".$match[2]);
	SendMessage($chat_id , "فرد مورد نظر بلاک شد." , "html");
}
elseif(preg_match("/^\/([Uu]n[Bb]an) (.*)/",$text) and in_array($from_id,$ADMIN) ){
	preg_match("/^\/([Uu]n[Bb]an) (.*)/",$text,$match);
	$unban = str_replace($match[2],"",$block);
	file_put_contents("Admin/Block-List.txt",$unban);
	SendMessage($chat_id , "فرد مورد نظر آنبلاک شد." , "html");
}
elseif(preg_match("/^\/([Bb]c)/",$text) and in_array($from_id,$ADMIN) and $reply){
	SendMessage($chat_id , "پیام همگانی فرستاده شد." , "html");
	$all_member = fopen( "Admin/Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$reply->text,"html");
		}
}
elseif(preg_match("/^\/([Ss]tart)/",$text)){
	SendMessage($chat_id , $start , "html");
}
elseif(preg_match("/^\/([Hh]elp)/",$text)){
	SendMessage($chat_id , $help , "html");
}
?>
