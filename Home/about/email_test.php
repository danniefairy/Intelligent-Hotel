<?php

// 載入外部Class

require("class.phpmailer.php"); 

// 宣告PHPMailer物件

$mail = new PHPMailer(); 

// 設定使用SMTP發信

$mail->IsSMTP();

// 設定SMTP伺服器位置

$mail->Host = "smtp.tongtai.com.tw"; // SMTP servers 

// 設定SMTP服務的POST

$mail->Port = 25;

// 設定安全驗證開啟

$mail->SMTPAuth = true;

// ==================== 寄件者資料設定 ====================

// 設定寄件者的送信帳號(SMTP)

$mail->Username = "";

// 設定寄件者的送信密碼(SMTP)

$mail->Password = "";

// 設定寄件者EMail

$mail->From = "dannienctu@gmail.com"; 

// 設定寄件者名稱

$mail->FromName = "ERIC"; 

// ==================== 收件者資料設定 ====================

// 設定收件者EMail(有加名稱)

$mail->AddAddress("dannienctu@gmail.com","艾瑞克"); 

// 設定收件者EMail(無名稱)

//$mail->AddAddress("erichuang@tongtai.com.tw");

// 設定副本

//$mail->AddCC("erichuang@tongtai.com.tw");

// 設定密件副本

//$mail->AddBCC("erichuang@tongtai.com.tw");

// 設定回信EMail及名稱

//$mail->AddReplyTo("mailto:erichuang@tongtai.com.tw%22,%22ERIC"); 

// ==================== 收件者信件編碼設定 ====================

// 設定字數段行

$mail->WordWrap = 50;

// 設定信件字元編碼(預設:utf-8，PS:一般收信軟體都是以當地語系為主，如果使用utf-8格式可能會有亂碼的現象)

$mail->CharSet="Big5";

//設定信件編碼，大部分郵件工具都支援此編碼方式

$mail->Encoding = "base64";

// ==================== 附加檔案設定 ====================

// 傳送附加檔

//$mail->AddAttachment("d:/index.php");

// 傳送附加檔(重新命名檔案名稱)

//$mail->AddAttachment("d:/AUTORUN.INF", "AUTORUN.INF"); 

// ==================== 信件內容設定 ====================

// 設定信件為HTML格式(true=HTML、false=Text)

$mail->IsHTML(true); 

// 信件主旨

$mail->Subject = "測試mail"; 

// 信件內容

$mail->Body = "

<html>

        <body>

                這是一封信件測試

        </body>

</html>";

// 附加內容

$mail->AltBody = "附加內容文字"; 

// 傳送信件

if(!$mail->Send()) 

{ 

        echo "錯誤!信件無法送出<br>"; 

        echo "Mailer 錯誤訊息>>>> " . $mail->ErrorInfo; 

        exit; 

} 

echo "信件送出"; 

?>