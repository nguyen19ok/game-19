<?PHP
include_once('../../../core/system/config.php');
$title = 'Phiên Bầu cua';
include_once('../../../core/system/head.php');
function re($num)
{
    if($num ==0) return 'Chẵn';
    if($num ==1) return 'Lẻ';
    
}
$phien_ngocrong = $mysqli->query("SELECT * FROM `phien_chanle`   ORDER by id DESC LIMIT 100");

$tongso = 0;
$phien = '0';
$dem = 0;
$phien_x1 = '0';
$phien_x2 = '0';
$phien_x3 = '0';
$phien_x4 = '0';
$table='';
$sao1 = 0;
$sao2 = 0;
$sao3 = 0;
$sao4 = 0;
$sao5 = 0;
$sao6 = 0;
while($data = $phien_ngocrong->fetch_assoc())
{
    $ngocrong = json_decode($data['data'],true);
    $tongso+=1;
    if($dem <=0)
    {
        $idphien = $ngocrong['phien'];
        $thoigian = $ngocrong['thoigian'];
        $x1 = $ngocrong['x1'];
        $x2 = $ngocrong['x2'];
        $x3 = $ngocrong['x3'];
        $x4 = $ngocrong['x4'];
    }
    if($dem <=20)
    {
        $phien = $phien.','.$ngocrong['phien'];
        $phien_x1 = $phien_x1.','.$ngocrong['x1'];
        $phien_x2 = $phien_x2.','.$ngocrong['x2'];
        $phien_x3 = $phien_x3.','.$ngocrong['x3'];
        $phien_x4 = $phien_x4.','.($ngocrong['x3']+$ngocrong['x1']+$ngocrong['x2']);
    }
    if($dem <=15)
    {
        $table.='<tr> <td>'.$ngocrong['phien'].'</td> <td>'.$ngocrong['thoigian'].'</td> <td>'.re($ngocrong['x1']).' - '.re($ngocrong['x2']).' - '.re($ngocrong['x3']).' - '.re($ngocrong['x4']).'</td> <td>'.($ngocrong['x4']+$ngocrong['x3']+$ngocrong['x2']+$ngocrong['x1']).' => '.(($ngocrong['x3']+$ngocrong['x2']+$ngocrong['x1']+$ngocrong['x4'])%2 <=0 ? 'Chẵn' : 'Lẻ').'</td>   </tr>';
    }
    
    if($ngocrong['x1'] == 1) $sao1+=1;
    if($ngocrong['x1'] == 2) $sao2+=1;
    if($ngocrong['x1'] == 3) $sao3+=1;
    if($ngocrong['x1'] == 4) $sao4+=1;
    if($ngocrong['x1'] == 5) $sao5+=1;
    if($ngocrong['x1'] == 6) $sao6+=1;
    if($ngocrong['x2'] == 1) $sao1+=1;
    if($ngocrong['x2'] == 2) $sao2+=1;
    if($ngocrong['x2'] == 3) $sao3+=1;
    if($ngocrong['x2'] == 4) $sao4+=1;
    if($ngocrong['x2'] == 5) $sao5+=1;
    if($ngocrong['x2'] == 6) $sao6+=1;
    if($ngocrong['x3'] == 1) $sao1+=1;
    if($ngocrong['x3'] == 2) $sao2+=1;
    if($ngocrong['x3'] == 3) $sao3+=1;
    if($ngocrong['x3'] == 4) $sao4+=1;
    if($ngocrong['x3'] == 5) $sao5+=1;
    if($ngocrong['x3'] == 6) $sao6+=1;
    $dem+=1;
}

?>
<div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xl-9 col-md-9">
                         <section class="panel">

<div class="panel-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">Lịch sử phiên</h4>
                                </div>
                              
                                
                                <!------THỐNG KÊ BẢNG------->
                                
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"># Phiên</th>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Kết quả</th>
                                            <th scope="col">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-primary">
                                        <?=$table?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            </div>
                       </section>
                    </div>
                    
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-xl-3 col-md-3">
                        
                           
                         <section class="panel">

<div class="panel-body">
                               
                               

                             
                               
                                <h4 class="card-title m-t-30">Phiên trước</h4>
                                <div class="list-group">
                                    <b  class="list-group-item">  
                                        Phiên : #<?=$idphien?>
                                    </b>
                                     <b  class="list-group-item">  
                                        Thời gian : <?=$thoigian?>
                                    </b>
                                    
                                    <b  class="list-group-item">  
                                        Kết quả : <?=re($x1)?> - <?=re($x2)?> - <?=re($x3)?> - <?=re($x4)?>
                                    </b>
                                    
                                    
                                    
                                   
                                   
                                    
                                </div>
                            
                        </div>
                        </section>
                    </div>
                    <!-- Column -->
                </div>
<?PHP

include_once('../../../core/system/end.php');