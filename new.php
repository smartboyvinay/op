<?php

////////////////=============[Made with ❤️ by @devilvinay_yt]===============////////////////

///https://api.telegram.org/bot<token>/setwebhook?url=<url>

$botToken = "1424127443:AAHUBpV9RdWcDIPnZ9HG22uGS3edKuN-1Ek"; // Enter ur bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

//////////=========[Start Command]=========//////////

if ((strpos($message, "!start") === 0)||(strpos($message, "/start") === 0)){
sendMessage($chatId, "<b>Hello there!!%0AType /cmds to know all my commands!!%0A%0ABot Made by: @devilvinay_yt</b>");
}

//////////=========[Cmds Command]=========//////////

elseif ((strpos($message, "!cmds") === 0)||(strpos($message, "/cmds") === 0)){
    sendMessage($chatId, "<u>Bin lookup:</u> <code>!bin</code> xxxxxx%0A<u>SK Key Check:</u> <code>!sk</code> sk_live%0A<u>Convergepay:</u> <code>!cpay</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Stripe:</u> <code>!chk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Info:</u> <code>/info</code> To know ur info%0A%0A<b>Bot Made by: @devilvinay_yt</b>");
}

//////////=========[Info Command]=========//////////

elseif ((strpos($message, "!info") === 0)||(strpos($message, "/info") === 0)){
sendMessage($chatId, "<u>ID:</u> <code>$userId</code>%0A<u>First Name:</u> $firstname%0A<u>Username:</u> @$username%0A%0A<b>Bot Made by: @devilvinay_yt </b>");
}

//////////=========[Bin Command]=========//////////

elseif ((strpos($message, "!bin") === 0)||(strpos($message, "/bin") === 0)){
$bin = substr($message, 5);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
}
curl_close($ch);

 
curl_close($ch);
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.''.$emoji.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Currency:</b> '.$currency.'%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: @devilvinay_yt </b>');
}
curl_close($ch);

//////////////////////////===========RANDOM USER AGENT=============///////////////////////////////////
function random_ua() {
    $tiposDisponiveis = array("Chrome", "Firefox", "Opera", "Explorer");
    $tipoNavegador = $tiposDisponiveis[array_rand($tiposDisponiveis)];
    switch ($tipoNavegador) {
        case 'Chrome':
            $navegadoresChrome = array("Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36",
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.1 Safari/537.36',
                'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2226.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.4; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2224.3 Safari/537.36',
                'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36',
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36',
            );
            return $navegadoresChrome[array_rand($navegadoresChrome)];
            break;
        case 'Firefox':
            $navegadoresFirefox = array("Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1",
                'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0',
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10; rv:33.0) Gecko/20100101 Firefox/33.0',
                'Mozilla/5.0 (X11; Linux i586; rv:31.0) Gecko/20100101 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20130401 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20120101 Firefox/29.0',
                'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/29.0',
                'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0',
                'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0',
            );
            return $navegadoresFirefox[array_rand($navegadoresFirefox)];
            break;
        case 'Opera':
            $navegadoresOpera = array("Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14",
                'Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16',
                'Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0 Opera 12.14',
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0) Opera 12.14',
                'Opera/12.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.02',
                'Opera/9.80 (Windows NT 6.1; U; es-ES) Presto/2.9.181 Version/12.00',
                'Opera/9.80 (Windows NT 5.1; U; zh-sg) Presto/2.9.181 Version/12.00',
                'Opera/12.0(Windows NT 5.2;U;en)Presto/22.9.168 Version/12.00',
                'Opera/12.0(Windows NT 5.1;U;en)Presto/22.9.168 Version/12.00',
                'Mozilla/5.0 (Windows NT 5.1) Gecko/20100101 Firefox/14.0 Opera/12.0',
            );
            return $navegadoresOpera[array_rand($navegadoresOpera)];
            break;
        case 'Explorer':
            $navegadoresOpera = array("Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko",
                'Mozilla/5.0 (compatible, MSIE 11, Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko',
                'Mozilla/1.22 (compatible; MSIE 10.0; Windows 3.1)',
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729; .NET CLR 2.0.50727; Media Center PC 6.0)',
                'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 7.0; InfoPath.3; .NET CLR 3.1.40767; Trident/6.0; en-IN)',
            );
            return $navegadoresOpera[array_rand($navegadoresOpera)];
            break;
    }
}
$ua = random_ua();


//////////////////////////===========RANDOM USER AGENT=============///////////////////////////////////

//////////=========[Chk Command]=========//////////

if ((strpos($message, "!chk") === 0)||(strpos($message, "/chk") === 0)){
$lista = substr($message, 5);
$i     = explode("|", $lista);
$cc    = $i[0];
$mes   = $i[1];
$ano  = $i[2];
$ano1 = substr($yyyy, 2, 4);
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank1 = GetStr($fim, '"bank":{"name":"', '"');
$name2 = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$name1 = "".$name2."".$emoji."";
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
}

curl_close($ch);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////===[Randomizing Details 

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

////////////////////////////===[Proxys]===//////////////

$rp1 = array(
  1 => 'user-rotate:pass',
  2 => 'user-rotate:pass',
  3 => 'user-rotate:pass',
  4 => 'user-rotate:pass',
  5 => 'user-rotate:pass',
    ); 
    $rpt = array_rand($rp1);
    $rotate = $rp1[$rpt];


$ip = array(
  1 => 'socks5://p.webshare.io:1080',
  2 => 'http://p.webshare.io:80',
    ); 
    $socks = array_rand($ip);
    $socks5 = $ip[$socks];

////////////////////////////////////////////

////////////////////////////==============[Proxy Section]===============//////////////////////////////

$url = "https://api.ipify.org/";   

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();   
if (isset($ip1)){
$ip = "Proxy live";
}
if (empty($ip1)){
$ip = "Proxy Dead:[".$rotate."]";
}

//echo '[ IP: '.$ip.' ] ';

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////=[1st REQ]=/////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, '.......');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: ......................',
'accept: ..........................',
'accept-encoding: .................',
'accept-language: ..................',
'content-type: .....................',
'origin: ...........................',
'referer: ..........................',
'sec-fetch-dest: ...................',
'sec-fetch-mode: ...................',
'sec-fetch-site: ...................',
'user-agent: '.$ua.'',
   ));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '.....');

 $result1 = curl_exec($ch);
 $id = trim(strip_tags(getStr($result1,'"id": "','"')));
 curl_close($ch);

//////////////=[2nd Req]=//////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_URL, '....');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: ......................',
'accept: .........................',
'accept-language: ................',
'content-type: ...................',
'origin: .........................',
'referer: ........................',
'sec-fetch-dest: .................',
'sec-fetch-mode: .................',
'sec-fetch-site: .................',
'user-agent: '.$ua.'',
'x-requested-with: XMLHttpRequest',

   ));
curl_setopt($ch, CURLOPT_POSTFIELDS,'.....');
  $result2 = curl_exec($ch);
$cvc_check = trim(strip_tags(getStr($result2,'"cvc_check":"','"')));
 $info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
curl_close($ch);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if ((strpos($result2, 'incorrect_zip')) || (strpos($result2, 'Your card zip code is incorrect.')) || (strpos($result2, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CVV MATCHED ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, '"cvc_check":"pass"')) || (strpos($result2, "Thank You.")) || (strpos($result2, '"status": "succeeded"')) || (strpos($result2, "Thank You For Donation.")) || (strpos($result2, "Your payment has already been processed")) || (strpos($result2, "Success ")) || (strpos($result2, '"type":"one-time"')) || (strpos($result2, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CVV MATCHED ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, 'Your card has insufficient funds.')) || (strpos($result2, 'insufficient_funds'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b> 『 ★ CCN LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, "Your card's security code is incorrect.")) || (strpos($result2, "incorrect_cvc")) || (strpos($result2, "The card's security code is incorrect."))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CCN MATCHED ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, "Your card does not support this type of purchase.")) || (strpos($result2, "transaction_not_allowed"))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b> 『 ★ CCN MATCHED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, "pickup_card")) || (strpos($result2, "lost_card")) || (strpos($result2, "stolen_card"))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif (strpos($result2, "do_not_honor")){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, 'The card number is incorrect.')) || (strpos($result2, 'Your card number is incorrect.')) || (strpos($result2, 'incorrect_number'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, 'Your card has expired.')) || (strpos($result2, 'expired_card'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Expired Card ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif (strpos($result2, "generic_decline")){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif (strpos($result1, "generic_decline")){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, '"cvc_check":"unavailable"')) || (strpos($result2, '"cvc_check": "unchecked"')) || (strpos($result2, '"cvc_check": "fail"'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif ((strpos($result2, "Your card was declined.")) || (strpos($result2, 'The card was declined.'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Card Declined ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif(!$result2){
sendMessage($chatId, ''.$result2.'');
}else{
sendMessage($chatId, ''.$result2.'');
}
curl_close($ch);
}

//////////=========[Convergepay Command]=========//////////
elseif ((strpos($message, "!cpay") === 0)||(strpos($message, "/cpay") === 0)){
$lista = substr($message, 5);
$i     = explode("|", $lista);
$cc    = $i[0];
$mon   = $i[1];
$year  = $i[2];
$year1 = substr($yyyy, 2, 4);
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mon = $separa[1];
$year = $separa[2];
$cvv = $separa[3];



function string_between_two_string($str, $starting_word, $ending_word){ 
$subtring_start = strpos($str, $starting_word); 
$subtring_start += strlen($starting_word);   
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
return substr($str, $subtring_start, $size);
}


if(strlen($year) == 4){
$year = substr($year, 2);
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$first = ucfirst(str_shuffle('Kurumi'));
$last = ucfirst(str_shuffle('appisbest'));
$com = ucfirst(str_shuffle('waifuu'));
$first1 = str_shuffle("kurumiapp85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$ip = ''.rand(00,99).'.'.rand(000,999).'.'.rand(000,999).'.'.rand(00,99).'';
$mip = ''.rand(00,99).'.'.rand(00,99).'.'.rand(000,999).'.'.rand(00,99).'';
$ph = array("682","346","246");
$ph1 = array_rand($ph);
$phh = $ph[$ph1];
$phone = "$phh".rand(0000000,9999999)."";
$account = rand(000000,999999);
$invoice = rand(000000,999999);
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$state = "New+York";
$zip = "10080";
$city = "New+York";
}
elseif ($state == "WA"){
$state = "Washington";
$zip = "98001";
$city = "Auburn";
}
elseif ($state == "AL"){
$state = "Alabama";
$zip = "35005";
$city = "Adamsville";
}
elseif ($state == "FL"){
$state = "Florida";
$zip = "32003";
$city = "Orange+Park";
}
else{
$state = "California";
$zip = "90201";
$city = "Bell";
};


//////////////////=================[Seesion ID]=================//////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '....');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: ...',
'Accept-Language: ...',
'Cache-Control: max-age=0',
'Connection: keep-alive',
'Content-Type: ...',
'Host: ...',
'Origin: ....',
'Referer: ....',
'Sec-Fetch-Dest: document',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Site: cross-site',
'Sec-Fetch-User: ?1',
'Upgrade-Insecure-Requests: 1'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, ' ');
$result10 = curl_exec($ch);
$token = string_between_two_string($result10, '<input type="hidden" name="sessionId" value="', '"/>');

//////////////////=================[Checking Cards]=================//////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '....');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: ....',
'Accept-Language: ...',
'Cache-Control: max-age=0',
'Connection: keep-alive',
'Content-Type: ...',
'Host: ...',
'Origin: ....',
'Referer: ...',
'Sec-Fetch-Dest: document',
'Sec-Fetch-Mode: navigate',
'Sec-Fetch-Site: same-origin',
'Sec-Fetch-User: ?1',
'Upgrade-Insecure-Requests: 1'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '......');

//////////////////=================[Checking Cards]=================//////////////////


$result9 = curl_exec($ch);
$cvvres = string_between_two_string($result9, '<input type="hidden" name="ssl_cvv2_response" value="', '"></td>');
$avsres = string_between_two_string($result9, '<input type="hidden" name="ssl_avs_response" value="', '"></td>');
$msg = string_between_two_string($result9, '<span id="ssl_result_message">', '</span>');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$gdAvs = array("A","B","D","G","P","S","X","Y","Z");

if(($cvvres == "M") && ((in_array($avsres, $gdAvs)) === true)){
$chStatus = "Yes";
}else{
$chStatus = "No";
};

if(strlen($year) == 2){
$year = '20'.$year;
};

$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
curl_close($ch);

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

if(($cvvres == "M") && ($avsres == "U")){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CVV MATCHED [M][U] ★ 』 %0A<u>Chargeable::</u> <b>『 ★  Maybe Yes ★ 』</b>%0A</b><u>Gateway:</u> <b>Convergepay</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif($cvvres == "M"){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CVV MATCHED [M]['.$avsres.'] ★ 』 %0A<u>Chargeable::</u> <b>『 ★ Chargeable: '.$chStatus.' ★ 』</b>%0A</b><u>Gateway:</u> <b>Convergepay</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif($cvvres == "N"){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ LIVE CCN [N]['.$avsres.'] ★ 』%0A<u>Chargeable::</u> <b>『 ★ No ★ 』</b>%0A</b><u>Gateway:</u> <b>Convergepay</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif (strpos($result9, '"success":true')){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Charged CVV ★ 』%0A<u>Chargeable::</u> <b>『 ★ Yes ★ 』</b>%0A</b><u>Gateway:</u> <b>Convergepay</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
elseif(!$result9){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Unknown Error ★ 』</b><u>Gateway:</u> <b>Convergepay</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}else{
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Card Declined ['.$cvvres.']['.$avsres.'] ★ 』%0A<u>Mensaje::</u> <b>『 ★ Msg: '.$msg.' ★ 』[Maybe api dead]</b>%0A</b><u>Gateway:</u> <b>Convergepay</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: @devilvinay_yt</b>');
}
curl_close($ch);
}


//////////=========[Sk Key Check Command]=========//////////

elseif (strpos($message, "!sk") === 0){
$sec = substr($message, 4);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> EXPIRED KEY%0A%0A<b>Bot Made by: @devilvinay_yt </b>");
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> INVALID KEY%0A%0A<b>Bot Made by: @devilvinay_yt </b>");
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Testmode Charges Only%0A%0A<b>Bot Made by: @devilvinay_yt </b>");
}else{
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>RESPONSE:</u> SK LIVE!!%0A%0A<b>Bot Made by: @devilvinay_yt </b>");
}}


////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);      
}

////////////////=============[@devilvinay_yt]===============////////////////
////////==========[Used api raw bot of @Zeltraxrockzzz]============////////
    if($message == "/cmds"){
        send_message($chat_id, "
          /search <input> (Google search)
          \n/syt <query> (Youtube Search)
          \n/dict <word> (Dicitonary)
          \n/smirror <name> (Search Movies/Series)
          \n/bin <bin> (Bin Data)
          \n/weather <name of your city> (Current weather Status)
          \n/dice (random 1-6)
          \n/date (today's date)
          \n/time (current time)
          \n/git <username>
          \n/info (User Info)
          \n/donate (Donate to Creator)
          ");
    }

    if($message == "/dice"){
        sendDice($chat_id, "🎲");
    }
    if($message == "/date"){
        $date = date("d/m/y");
        send_message($chat_id, $date);
    }
   if($message == "/time"){
        $time = date("h:i a", time());
        send_message($chat_id, $time);
    }
    
     if($message == "/info"){
        send_message($chat_id, "User Info \nName: $firstname\nID:$id \nUsername: @$username");
    }

if($message == "/help"){
        send_message($chat_id, "Contact @devilvinay_yt");
    }
if($message == "/donate"){
        send_message($chat_id, "https://reboot13.hashnode.dev/donate");
    }

///Commands with text


    //Google Search
if (strpos($message, "/search") === 0) {
        $search = substr($message, 8);
         $search = preg_replace('/\s+/', '+', $search);
    if ($search != null) {
     send_message($chat_id, "https://www.google.com/search?q=".$search);
    }
  }

//World Mirror Search
if (strpos($message, "/smirror") === 0) {
$smovie = substr($message, 9);
$smovie = preg_replace('/\s+/', '+', $smovie);
$murl = "[Results-Go to World Mirror](https://witcher.lalbaake456.workers.dev/0:search?q=$smovie)";
if ($smovie != null) {
  send_MDmessage($chat_id, $murl);
}
}

//Youtube Search
if (strpos($message, "/syt") === 0) {
$syt = substr($message, 5);
$syt = preg_replace('/\s+/', '+', $syt);
$yurl = "[Open Youtube](https://www.youtube.com/results?search_query=$syt)";
if ($syt != null) {
  send_MDmessage($chat_id, $yurl);
}
}


///Channel BroadCast
if (strpos($message, "/broadcast") === 0) {
$broadcast = substr($message, 11);
// id == (admins user id)
if ($id == 1171876903 || $id == 1478297206 || $id == 654455829 || $id == 638178378 ) {
  send_Cmessage($channel_id, $broadcast);
}
}


//Bin Lookup
   if(strpos($message, "/bin") === 0){
        $bin = substr($message, 5);
   $curl = curl_init();
   curl_setopt_array($curl, [
	CURLOPT_URL => "https://lookup.binlist.net/".$bin,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"authority: lookup.binlist.net",
		"accept: application/json",
		"accept-language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7",
		"origin: https://binlist.net",
		"https://binlist.net/",
		"sec-fetch-dest: empty",
		"sec-fetch-site: same-site"
	],
]);

$result = curl_exec($curl);
curl_close($curl);
$data = json_decode($result, true);
$bank = $data['bank']['name'];
$country = $data['country']['alpha2'];
$currency = $data['country']['currency'];
$emoji = $data['country']['emoji'];
$scheme = $data['scheme'];
$Brand = $data['brand'];
$type = $data['type'];
  if ($scheme != null) {
        send_message($chat_id, "
    Bin: $bin
Type: $scheme
Brand : $Brand
Bank: $bank
Country: $country $emoji
Currency: $currency
Credit/Debit:$type
Checked By @$username ");
    }
else {
    send_message($chat_id, "Enter Valid BIN");
}
   }
    

    //Wheather API
if(strpos($message, "/weather") === 0){
        $location = substr($message, 9);
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?q=$location&appid=89ef8a05b6c964f4cab9e2f97f696c81",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 50,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"Accept: */*",
        "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7",
        "Host: api.openweathermap.org",
        "sec-fetch-dest: empty",
		"sec-fetch-site: same-site"
  ],
]);


$content = curl_exec($curl);
curl_close($curl);
$resp = json_decode($content, true);

$weather = $resp['weather'][0]['main'];
$description = $resp['weather'][0]['description'];
$temp = $resp['main']['temp'];
$humidity = $resp['main']['humidity'];
$feels_like = $resp['main']['feels_like'];
$country = $resp['sys']['country'];
$name = $resp['name'];
$kelvin = 273;
$celcius = $temp - $kelvin;
$feels = $feels_like - $kelvin;

if ($location = $name) {
        send_message($chat_id, "
    Weather at $location: $weather
Status: $description
Temp : $celcius °C
Feels Like : $feels °C
Humidity: $humidity
Country: $country 
Checked By @$username ");
}
else {
           send_message($chat_id, "Invalid City");
}
    }

///Github User API
if(strpos($message, "/git") === 0){
  $git = substr($message, 5);
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "https://api.github.com/users/$git",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 50,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
    "Accept-Encoding: gzip, deflate, br",
    "Accept-Language: en-GB,en;q=0.9",
    "Host: api.github.com",
    "Sec-Fetch-Dest: document",
    "Sec-Fetch-Mode: navigate",
    "Sec-Fetch-Site: none",
    "Sec-Fetch-User: ?1",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36"
  ],
]);


$github = curl_exec($curl);
curl_close($curl);
$gresp = json_decode($github, true);

$gusername = $gresp['login'];
$glink = $gresp['html_url'];
$gname = $gresp['name'];
$gcompany = $gresp['company'];
$blog = $gresp['blog'];
$gbio = $gresp['bio'];
$grepo = $gresp['public_repos'];
$gfollowers = $gresp['followers'];
$gfollowings = $gresp['following'];


if ($gusername) {
        send_message($chat_id, "
Name: $gname
Username: $gusername
Bio: $gbio
Followers: $gfollowers
Following : $gfollowings
Repositories: $grepo
Website: $blog
Company: $gcompany
Github url: $glink
Checked By @$username ");
}
else {
           send_message($chat_id, "User Not Found \nInvalid github username checked by @$username");
}
    }

///Dicitonary API
if(strpos($message, "/dict") === 0){	
        $dict = substr($message, 6);	
   $curl = curl_init();	
   curl_setopt_array($curl, [	
	CURLOPT_URL => "https://api.dictionaryapi.dev/api/v2/entries/en/$dict",	
	CURLOPT_RETURNTRANSFER => true,	
	CURLOPT_FOLLOWLOCATION => true,	
	CURLOPT_ENCODING => "",	
	CURLOPT_MAXREDIRS => 10,	
	CURLOPT_TIMEOUT => 30,	
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,	
	CURLOPT_CUSTOMREQUEST => "GET",	
	CURLOPT_HTTPHEADER => [	
		"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",	
        "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7",	
        "Host: oxforddictionaryapi.herokuapp.com",	
        "Sec-Fetch-Dest: empty",	
        "Sec-Fetch-Mode: cors",	
        "Sec-Fetch-Site: cross-site",	
        ],	
]);	


  $dictionary = curl_exec($curl);	
  curl_close($curl);	

$out = json_decode($dictionary, true);	
$word = $out[0]['word'];	
$noun= $out[0]['meaning']['noun'][0]['definition'];	
$verb = $out[0]['meaning']['verb'][0]['definition'];	
$adjective = $out[0]['meaning']['adjective'][0]['definition'];	
$adverb = $out[0]['meaning']['adverb'][0]['definition'];	
$pronoun = $out[0]['meaning']['pronoun'][0]['definition'];	

if ($word = $dict) {	
    send_message($chat_id, "	
Word: $word 	
Noun : $noun	
Pronoun: $pronoun 	
Verb : $verb 	
Adjective: $adjective 	
Adverb: $adverb 	
Checked By @$username ");	
    }	
    else {	
        send_message($chat_id, "Invalid Input");	
    }	
}	

if(strpos($message, "/inbtc") === 0){
$inbtc = substr($message, 7);
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "https://blockchain.info/tobtc?currency=USD&value=$inbtc",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 50,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7",
        "cookie: __cfduid=d922bc7ae073ccd597580a4cfc5e562571614140229",
        "referer: https://www.blockchain.com/",
        "sec-fetch-dest: document",
        "sec-fetch-mode: navigate",
        "sec-fetch-site: cross-site",
        "sec-fetch-user: ?1",
        "upgrade-insecure-requests: 1",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36"
  ],
]);
$valueinbtc = curl_exec($curl);
curl_close($curl);
$outvalue = json_decode($valueinbtc, true);

send_MDmessage($chat_id, "***USD = $inbtc \nBTC = $outvalue \nValue checked by @$username ***");
}



     ///Send Message (Global)
    function send_message($chat_id, $message){
        $apiToken =  "API_TOKEN";
        $text = urlencode($message);
        file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chat_id&text=$text");
    }
    
//Send Messages with Markdown (Global)
      function send_MDmessage($chat_id, $message){
       $apiToken =  "API_TOKEN";
        $text = urlencode($message);
        file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chat_id&text=$text&parse_mode=Markdown");
    }
    

///Send Message to Channel
      function send_Cmessage($channel_id, $message){
       $apiToken =  "API_TOKEN";
        $text = urlencode($message);
        file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$channel_id&text=$text");
    }

 function sendDice($chat_id, $message){
       $apiToken =  "API_TOKEN";
        file_get_contents("https://api.telegram.org/bot$apiToken/sendDice?chat_id=$chat_id&emoji=$message");
    }
?>
