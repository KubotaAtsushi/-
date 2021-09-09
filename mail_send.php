<?php

// お問い合わせ日時
$request_datetime = date("Y年m月d日 H時i分s秒");
 
//自動返信メール
$mailto = $_POST['email'];
$to = 'メールを受け付けるメールアドレスを入力'; //ここに久保田さんのメールアドレスを入力
$mailfrom = "From:自動送信メールを送信するメールアドレスを入力"; //ここに久保田さんのメールアドレスを入力
$subject = "お問い合わせ有難うございます。";
 
$content = "";
$content .= $_POST['name']. "様\r\n";
$content .= "お問い合わせ有難うございます。\r\n";
$content .= "お問い合わせ内容は下記通りでございます。\r\n";
$content .= "=================================\r\n";
$content .= "お名前	      " . htmlspecialchars($_POST['name'])."\r\n";
$content .= "メールアドレス   " . htmlspecialchars($_POST['email'])."\r\n";
$content .= "内容   " . htmlspecialchars($_POST['comment'])."\r\n";
$content .= "お問い合わせ日時   " . $request_datetime."\r\n";
$content .= "=================================\r\n";
 
//管理者確認用メール
$subject2 = "お問い合わせがありました。";
$content2 = "";
$content2 .= "お問い合わせがありました。\r\n";
$content2 .= "お問い合わせ内容は下記通りです。\r\n";
$content2 .= "=================================\r\n";
$content2 .= "お名前	      " . htmlspecialchars($_POST['name'])."\r\n";
$content2 .= "メールアドレス   " . htmlspecialchars($_POST['email'])."\r\n";
$content2 .= "内容   " . htmlspecialchars($_POST['comment'])."\r\n";
$content2 .= "お問い合わせ日時   " . $request_datetime."\r\n";
$content2 .= "================================="."\r\n";
 
mb_language("ja");
mb_internal_encoding("UTF-8");
//mail 送信
if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
    mb_send_mail($mailto,$subject,$content,$mailfrom);
    ?>
    <script>
        window.location = 'メールを送信した後に表示されるページのurl';
    </script>
    <?php
} else {
    header('Content-Type: text/html; charset=UTF-8');
  echo "メールの送信に失敗しました";
};
 
?>