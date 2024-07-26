<?php require_once __DIR__ . '/_vdcs.inc.php';
if(!defined("_API_INCLUDE_")) exit;

if(!isset($Result) && !is_array($Result) 
        || !array_key_exists("Module", $Result) || is_null($Result["Module"])
        || !isset($_api) || !is_array($_api) 
        || $isCancel == true 
        || $isAccept != true) 
{
    exit;
}

$module = $Result['Module'];

try
{
    switch ($requestVdcsModelType)
    {
        case RequestVdcsModelType::DocDistributeDownload :
        case RequestVdcsModelType::DocReplyDownload :
        case RequestVdcsModelType::DocLatestDownload :
        case RequestVdcsModelType::LatestZipDownload :
        case RequestVdcsModelType::LatestZipInfo :
			if(isset($_SERVER) && $_SERVER["REMOTE_ADDR"] == "10.10.103.221")
			{
				require_once __DIR__ . '/vdcs_file_test.php';
				//require_once __DIR__ . '/vdcs_file.php';
			}
			else
			{
				require_once __DIR__ . '/vdcs_file.php';
			}
            
            break;
        case RequestVdcsModelType::Latest :
        case RequestVdcsModelType::DocHistory :
        default :
            if(isset($_SERVER) && $_SERVER["REMOTE_ADDR"] == "10.10.103.221")
            {
                //require_once __DIR__ . '/vdcs_info_test.php';
                require_once __DIR__ . '/vdcs_info.php';
            }
            else 
            {
                require_once __DIR__ . '/vdcs_info.php';
            }
            break;
    }
    //$Fun->print_r($_api);
    /*
    switch($module)
    {
        case "VDCS":
        case "VDCS_Test":
            break;
        default :
            $Result['Result'] = "Fail";
            $Result['Message'] = "Not Supported!";
            break;
    }
     * 
     */
} 
catch (Exception $ex) 
{
    $isCancel = true;
    echo $Fun->print_r($ex);
}
finally 
{
    if($isCancel != true)
    {
        DoPrintResultResponse(true);
    }
}
