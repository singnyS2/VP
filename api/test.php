<?php
$text = "hello";
$key = "test_key";
$md5Key = md5($key);
//$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
$iv = str_repeat(chr(0),16);
$encode = openssl_encrypt(rawurldecode($text), "aes-256-cbc", $md5Key, true, str_repeat(chr(0),16));
echo "text : {$text}\n<br />key : {$key} =>  (md5) {$md5Key}";
$encode = base64_encode($encode);
echo "\n<br />\n<br /> ENCODE : " . $encode;
$decode = base64_decode($encode);
$decode = openssl_decrypt(rawurldecode($decode), "aes-256-cbc", $md5Key, true, str_repeat(chr(0),16));
echo "\n<br />\n<br /> DECODE : " . $decode;
exit;


if(!defined("_LIB_INCLUDE_"))
{
    require_once __DIR__ . '/_inc.php';
}

$str = "►▶";
echo $str;
echo "<br />\n";
echo "&#9658;&#9654;";
echo "<br />\n";

$str2 = $Fun->char2html($str);
echo $str2;
echo "<br />\n";

$str3 = $Fun->html2char($str2);
echo $str3;

exit;
$filename = "DF-730-04_견적서 관리대장 양식.docx";
$url = "http://61.41.17.50:7070/api/ConvertToPdf/2ObcmzzVtTA/" . rawurlencode($filename);

$curl = curl_init();

$options = array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET'
);


curl_setopt_array($curl, $options);

$response = curl_exec($curl);
$curl_info = curl_getinfo($curl); //Retrieve it's info
$err = curl_error($curl);

curl_close($curl);

//print_r($curl_info);
//exit;
if($response)
{
    $result = json_decode($response, true);
    //print_r($result);
    if ($err) {
        echo "cURL Error #:";
		print_r($err);
    } else {
        echo $response;
    }
} else {
    echo "#N/A";
}
exit;