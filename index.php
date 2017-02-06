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
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->userame;
$text = $message->text;
$forward = $update->message->forward_from;
$reply = $update->message->reply_to_message;
$block = file_get_contents("Admin/Block-List.txt");
$start = file_get_contents("Admin/Start.txt");
$help = file_get_contents("Admin/Help.txt");
$command = file_get_contents("Admin/Command.txt");
##------------------------------##
// Enable Plugins
##------------------------------##
include "Access.php";
include "Plugins/Admin.php";
include "Plugins/Qr.php";
include "Plugins/Calc.php";
include "Plugins/Cat.php";
include "Plugins/Photo.php";
include "Plugins/Echo.php";
include "Plugins/Date-Time.php";
include "Plugins/Logo.php";
include "Plugins/9Gag.php";
include "Plugins/WebShot.php";
include "Plugins/Short.php";
include "Plugins/Reply.php";
include "Plugins/Location.php";
include "Plugins/Sticker.php";
include "Plugins/Start-Help.php";
##------------------------------##
if (strpos($block , "$from_id") !== false) {
	return false;
	}
	##------------------------------##
$user = file_get_contents('Admin/Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Admin/Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Admin/Member.txt',$add_user);
    }unlink('error_log');
	##------------------------------##
	?>
