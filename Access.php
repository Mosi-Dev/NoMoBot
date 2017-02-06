<?php /*
به نام آنکه هستی نام ازو یافت
فلک جنبش، زمین آرام ازو یافت
خدایی کافرینش در سجودش
گواهی مطلق آمد بر وجودش
جواهر بخش فکرتهای باریک
به روز آرندۀ شبهای تاریک
غم و شادی نگار و بیم و اُمّید
شب و روز آفرین و ماه و خورشید 
------------------------------
The Source Bot: @NoMoBot
Channel News: @Norbert_Team
Support: @MosiDevBot
*/
##------------------------------##
ob_start();
##------------------------------##
$API_KEY = 'توکن ربات';
$ADMIN = array('260864889','دیگر ادمین ها');
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
    function SendMessage($chat_id, $text, $mode = null){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function ForwardMessage($chat_id, $from_chat, $message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chat_id,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
	function SendPhoto($chat_id, $photo, $caption = null){
	bot('SendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption
	]);
	}
	function SendAudio($chat_id, $audio, $caption= null){
	bot('SendAudio',[
	'chat_id'=>$chat_id,
	'audio'=>$audio,
	'caption'=>$caption
	]);
	}
	function SendDocument($chat_id, $document, $caption = null){
	bot('SendDocument',[
	'chat_id'=>$chat_id,
	'document'=>$document,
	'caption'=>$caption
	]);
	}
	function SendSticker($chat_id, $sticker){
	bot('SendSticker',[
	'chat_id'=>$chat_id,
	'sticker'=>$sticker
	]);
	}
	function SendVideo($chat_id, $video, $caption= null){
	bot('SendVideo',[
	'chat_id'=>$chat_id,
	'video'=>$video,
	'caption'=>$caption
	]);
	}
	function SendVoice($chat_id, $voice, $caption = null){
	bot('SendVoice',[
	'chat_id'=>$chat_id,
	'voice'=>$voice,
	'caption'=>$caption
	]);
	}
	function SendAction($chat_id, $action){
	bot('SendChatAction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	##------------------------------##
	?>
