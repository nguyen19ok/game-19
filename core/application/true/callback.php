<?php
include_once('../../../core/system/config.php');



error_reporting(0);

if ( isset($_GET['content']) && isset($_GET['status']) )
{

    $code = ($_GET['content']);
    
                    $card     = $mysqli->query("SELECT * FROM `napthe` WHERE `requestid` = '".$code."' ")->fetch_array();


    if ($_GET['status'] == 'hoantat')
    {
        $xu = ($card['menhgia']*$system->data->tcard/100);
        $n = new users($card['uid']);
        $n->upxu($xu);
            
             $mysqli->query("UPDATE `napthe` SET `nhan` = $xu WHERE `requestid` = '". $code."'");
            
             $mysqli->query("UPDATE `napthe` SET `status` = 'thanhcong' WHERE `requestid` = '". $code."' AND  status = 'xuly'");
             
           
            
    }
    else if ($_GET['status'] == 'thatbai')
    {
        
                $mysqli->query("UPDATE `napthe` SET `status` = 'thatbai' WHERE `requestid` = '". $code."' AND status = 'xuly' ");

    }
}
else
{   
    echo json_encode(array('status' => "error", 'msg' => "Cái quát đờ phắc gì vậy?"));
}


?>