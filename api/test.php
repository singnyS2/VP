<?php
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