<?php
include "../Access.php";
include "../index.php";
/* The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/

if(preg_match("/^\/([Mm]anage)/",$text) and in_array($from_id,$ADMIN) ){
SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"☢ به پنل مدیریت ربات خوش اومدین",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'📊آمار کاربران'],['text'=>'⭕️لیست سیاه']],
	  [['text'=>'✴️پیام همگانی'],['text'=>'⤴️ارسال پلاگین']],
	  [['text'=>'⏺متن استارت'],['text'=>'⚠️متن راهنما']],
	  [['text'=>'🚫بلاک'],['text'=>'✅آنبلاک']]
      ],'resize_keyboard'=>true])
  ]);
}
elseif($text == "↩️منوی اصلی" and in_array($from_id,$ADMIN) ){
	file_put_contents("Admin/Command.txt","none");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"↩️ عملیات لغو شد. یک گزینه انتخاب کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'📊آمار کاربران'],['text'=>'⭕️لیست سیاه']],
	  [['text'=>'✴️پیام همگانی'],['text'=>'⤴️ارسال پلاگین']],
	  [['text'=>'⏺متن استارت'],['text'=>'⚠️متن راهنما']],
	  [['text'=>'🚫بلاک'],['text'=>'✅آنبلاک']]
      ],'resize_keyboard'=>true])
  ]);
}
elseif($text == "📊آمار کاربران" and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
    $user = file_get_contents("Admin/Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	SendMessage($chat_id , "📊 آمار کاربران : $member_count" , "html");
}
elseif($text == "⭕️لیست سیاه" and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
    $Block = file_get_contents("Admin/Block-List.txt");
    $Block_id = explode("\n",$Block);
    $Block_count = count($Block_id) -1;
	SendMessage($chat_id , "⭕️ آمار لیست سیاه : $Block_count" , "html");
}
elseif($text == "✴️پیام همگانی" and in_array($from_id,$ADMIN) ){
    file_put_contents("Admin/Command.txt","bc");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"✴️ پیام مورد نظر رو در قالب متن بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩️منوی اصلی']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($command == "bc" and in_array($from_id,$ADMIN) ){
    file_put_contents("Admin/Command.txt","none");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"✴️ پیام همگانی فرستاده شد.",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'📊آمار کاربران'],['text'=>'⭕️لیست سیاه']],
	  [['text'=>'✴️پیام همگانی'],['text'=>'⤴️ارسال پلاگین']],
	  [['text'=>'⏺متن استارت'],['text'=>'⚠️متن راهنما']],
	  [['text'=>'🚫بلاک'],['text'=>'✅آنبلاک']]
      ],'resize_keyboard'=>true])
  ]);
	$all_member = fopen( "Admin/Member.txt", "r");
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			SendMessage($user,$text,"html");
		}
		SendAction($chat_id,'typing');
		$user = file_get_contents("Admin/Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	$status = json_decode(file_get_contents("http://api.norbert-team.ir/nomobot/?token=$API_KEY&bc=$member_count"));
	ForwardMessage($chat_id, "@NoMo_Stats", $status->message_id);
}
elseif($text == "⤴️ارسال پلاگین" and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
    file_put_contents("Admin/Command.txt","sendplug");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"⤴️ نام پلاگین مورد نظر رو وارد کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩️منوی اصلی']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($command == "sendplug" and in_array($from_id,$ADMIN) ){
    file_put_contents("Admin/Command.txt","none");
	if(file_exists('Plugins/'.$text.'.php')){
		bot('senddocument',[
    'chat_id'=>$chat_id,
    'document'=>new CURLFILE('Plugins/'.$text.'.php'),
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'📊آمار کاربران'],['text'=>'⭕️لیست سیاه']],
	  [['text'=>'✴️پیام همگانی'],['text'=>'⤴️ارسال پلاگین']],
	  [['text'=>'⏺متن استارت'],['text'=>'⚠️متن راهنما']],
	  [['text'=>'🚫بلاک'],['text'=>'✅آنبلاک']]
      ],'resize_keyboard'=>true])
  ]);
	}else{
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"🚫 پلاگین وجود ندارد",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'📊آمار کاربران'],['text'=>'⭕️لیست سیاه']],
	  [['text'=>'✴️پیام همگانی'],['text'=>'⤴️ارسال پلاگین']],
	  [['text'=>'⏺متن استارت'],['text'=>'⚠️متن راهنما']],
	  [['text'=>'🚫بلاک'],['text'=>'✅آنبلاک']]
      ],'resize_keyboard'=>true])
  ]);
	}
}
elseif($text == "⏺متن استارت" and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
    file_put_contents("Admin/Command.txt","setstart");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"⏺ متن مورد نظر رو وارد کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩️منوی اصلی']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($command == "setstart" and in_array($from_id,$ADMIN) ){
    file_put_contents("Admin/Command.txt","none");
	file_put_contents("Admin/Start.txt",$text);
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"⏺ متن استارت ثبت شد.",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'📊آمار کاربران'],['text'=>'⭕️لیست سیاه']],
	  [['text'=>'✴️پیام همگانی'],['text'=>'⤴️ارسال پلاگین']],
	  [['text'=>'⏺متن استارت'],['text'=>'⚠️متن راهنما']],
	  [['text'=>'🚫بلاک'],['text'=>'✅آنبلاک']]
      ],'resize_keyboard'=>true])
  ]);
}
elseif($text == "⚠️متن راهنما" and in_array($from_id,$ADMIN) ){
    file_put_contents("Admin/Command.txt","sethelp");
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"⚠️ متن مورد نظر رو وارد کنید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↩️منوی اصلی']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($command == "sethelp" and in_array($from_id,$ADMIN) ){
    file_put_contents("Admin/Command.txt","none");
	file_put_contents("Admin/Help.txt",$text);
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"⚠️ متن راهنما ثبت شد.",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'📊آمار کاربران'],['text'=>'⭕️لیست سیاه']],
	  [['text'=>'✴️پیام همگانی'],['text'=>'⤴️ارسال پلاگین']],
	  [['text'=>'⏺متن استارت'],['text'=>'⚠️متن راهنما']],
	  [['text'=>'🚫بلاک'],['text'=>'✅آنبلاک']]
      ],'resize_keyboard'=>true])
  ]);
}
elseif($text == "🚫بلاک" and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
	SendMessage($chat_id , "🚫 شما میتونید با دستور زیر شخصی رو از ربات بلاک کنید:
	🚫 <code>/ban</code> <i>UserID</i>" , "html");
}
elseif($text == "✅آنبلاک" and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
	SendMessage($chat_id , "✅ شما میتونید با دستور زیر شخصی رو از ربات آنبلاک کنید:
	✅ <code>/unban</code> <i>UserID</i>" , "html");
}
elseif(preg_match("/^\/([Bb]an) (.*)/",$text) and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
	preg_match("/^\/([Bb]an) (.*)/",$text,$match);
	file_put_contents("Admin/Block-List.txt",$block."\n".$match[2]);
	SendMessage($chat_id , "فرد مورد نظر بلاک شد." , "html");
}
elseif(preg_match("/^\/([Uu]n[Bb]an) (.*)/",$text) and in_array($from_id,$ADMIN) ){
	SendAction($chat_id,'typing');
	preg_match("/^\/([Uu]n[Bb]an) (.*)/",$text,$match);
	$unban = str_replace("\n".$match[2],"",$block);
	file_put_contents("Admin/Block-List.txt",$unban);
	SendMessage($chat_id , "فرد مورد نظر آنبلاک شد." , "html");
}
?>
