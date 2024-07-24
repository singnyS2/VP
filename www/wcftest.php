<?php
//ini_set('memory_limit','1000M');
ini_set('memory_limit',-1);
ini_set('max_execution_time', '500');
//header('Content-Type: text/plain');
//echo "WCF Test\r\n\r\n";

try{
	$FileName = "ProjFiles\\14816\CONTRACT\\발주통보서\\대아전력_SECT&EHT SYSTEM관련 전기공사1.pdf";
	//$FileName = "AppStorageFiles\\Publish\\HIBIZ\\VDCS\\Latest\\17045\\20221229_VDCS_Latest_All_17045_21YS-TT-KPB -0083.zip";
	//$FileName = "ProjFiles\\13604\FUND\\ACT\\ABS 65K DEBOTTLENECKING PROJECT_전기계기공사 (ABS,PBL) 한일기전_2차 (6월) 기성청구서.pdf";
	//$FileName = "AppStorageFiles\\HIBIZ\\17624\\E\\VDCS\\BH1-STA-VP232-RE01-COM_RA_INSPECTION REPORT.pdf";
	//$client = new SoapClient('http://wcfservice.hi-techeng.co.kr/WCF TEST/Service1.svc?singleWsdl');
	//$client = new SoapClient('http://wcfservice.hi-techeng.co.kr/FILE TRANSFER WCF FOR WEB/Service1.svc?singleWsdl');
	//$wsdl = 'http://wcfservice.hi-techeng.co.kr/FILE TRANSFER WCF FOR WEB/Service1.svc?singleWsdl';
	$wsdl = 'http://file.hi-techeng.co.kr/transferweb/Service1.svc?singleWsdl';
	//$wsdl = 'http://file.hi-techeng.co.kr/transfer/Service1.svc?singleWsdl';
	//$client = new SoapClient($wsdl, array(
	//	'trace' => true,
	//	'encoding'=>'UTF-8',
	//	'exceptions'=>true,
	//	'cache_wsdl'=>WSDL_CACHE_NONE,
	//	'soap_version' => SOAP_1_1
	//));
	$client = new SoapClient($wsdl, array(
		'trace' => true,
		'keep_alive' => true,
		'connection_timeout' => 5000,
    		'cache_wsdl' => WSDL_CACHE_NONE,
    		'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE, 
	));


	//$retval = $client->DownloadFile(array('FileName' => $FileName));
	//$retval = $client->DownloadFileWebStream(array('FileName' => $FileName));
	$retval = $client->DownloadFileWebTest(array('FileName' => $FileName));
	//echo $retval->FileName;
            //$headers = apache_request_headers();
	//print_r($client);
	//print_r($retval);
	// echo $retval->DownloadFileWebResult->ErrorMessage;
	//$contents = base64_decode($retval->DownloadFileWebResult->FileBinary);
	//echo $contents;
	//echo strlen($오후 12:51 2022-12-30contents);



  //header("Content-type: application/pdf");
  //header("Content-Length: $length");
  //header("Content-Disposition: inline; filename='test.pdf'");

header("Content-type: application/octet-stream");
header("Content-Length: $length");
header("Content-Disposition: attachment; filename=aaaa.zip");
header("Content-Transfer-Encoding: binary");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: public"); 
header("Expires: 0"); 


//while(!feof($retval->FileByteStream)){
//	echo fread($retval->FileByteStream, 100*1024);
//	flush();
//}
//fclose($retval->FileByteStream);
//fpassthru($retval->FileByteStream);
echo $retval->FileByteStream;
//echo $retval->FileName;
//echo $retval->Length



}catch(SoapFault $fault){
	echo $fault->faultstring;
}
?>