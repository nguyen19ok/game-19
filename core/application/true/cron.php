<?php
include_once('../../../core/system/config.php');
function vip($tong){
    
    if($tong < 100000 || empty($tong)){
         return '0';

    } else if($tong >= 100000 && $tong < 500000){
        
        return '1000';
        
    } else if($tong >= 500000 && $tong < 2000000){
       return '7000';

        
    } else if($tong >= 2000000 && $tong < 5000000){
       return '35000';


    } else if($tong >= 5000000 && $tong < 10000000){

       return '100000';

    } else if($tong >= 10000000  && $tong < 20000000){
       return '225000';


    } else if($tong >= 20000000 && $tong < 50000000){

       return '500000';


    } else if($tong >= 50000000){
       return '2000000';

    }
    
    
    
}


$list = $mysqli->query("SELECT SUM(`menhgia`) as tong,uid FROM `napthe` WHERE  `status` = 'Thành công' AND `thoigian` LIKE '%".date("m/Y")."%' GROUP BY `uid` ");

                    while($row = $list->fetch_assoc())
                    {



                        echo $row['uid'].' '.vip($row['tong']);
                        
                        
                        if(vip($row['tong']) > 0){
                            
                            
                                            $xu = vip($row['tong']);
                                            $n = new users($row['uid']);
                                            $n->upxu($xu);
                        }
                        
                        
                        
                        
                        
                    }



?>