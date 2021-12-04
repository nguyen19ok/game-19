<?PHP
include_once('../../../core/system/config.php');
$title = 'Phiên Ngọc Rồng';
include_once('../../../core/system/head.php');

$phien_ngocrong = $mysqli->query("SELECT * FROM `phien_ngocrong`   ORDER by id DESC LIMIT 100");

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
    }
    if($dem <=20)
    {
        $phien = $phien.','.$ngocrong['phien'];
        $phien_x1 = $phien_x1.','.$ngocrong['x1'];
        $phien_x2 = $phien_x2.','.$ngocrong['x2'];
        $phien_x3 = $phien_x3.','.$ngocrong['x3'];
        $phien_x4 = $phien_x4.','.($ngocrong['x3']+$ngocrong['x1']+$ngocrong['x2']);
    }
    if($dem <=10)
    {
        $table.='<tr> <td>'.$ngocrong['phien'].'</td> <td>'.$ngocrong['thoigian'].'</td> <td>'.$ngocrong['x1'].' </td> <td>'.$ngocrong['x2'].' </td>  <td>'.$ngocrong['x3'].' </td> <td>'.($ngocrong['x1']+ $ngocrong['x3'] + $ngocrong['x2'] <=10 ? 'Xỉu' : 'Tài').' thắng</td>   </tr>';
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


<div class="page-header">

<h2>Phiên Tài Xỉu</h2>
</div>

<div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xl-9 col-md-9">
                        
                        
                        <section class="panel">

<div class="panel-body">
                        
                        
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">Lịch sử phiên</h4>
                                </div>
                                <div>
                                    <canvas id="line-chart" height="<?=($mobile ? '300' : '150')?>"></canvas>
                                </div>
                                
                                <!------THỐNG KÊ BẢNG------->
                                
                                <div class="table-responsive">
                                    <h4 class="card-title">Thống kê bảng</h4>
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"># Phiên</th>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Xúc sắc 1</th>
                                            <th scope="col">Xúc sắc 2</th>
                                            <th scope="col">Xúc sắc 3</th>
                                            <th scope="col">Kết quả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$table?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                        </section>
                    </div>
                    <script>
     new Chart(document.getElementById("line-chart"), {
	  type: 'line',
	  data: {
		labels: [<?=$phien?>], //Phiên
		datasets: [{ 
			data: [<?=$phien_x1?>],
			label: "Xúc sắc 1",
			borderColor: "#3e95cd",
			fill: false
		  }, { 
			data: [<?=$phien_x2?>],
			label: "Xúc sắc 2 ",
			borderColor: "#292A0A",
			fill: false
		  }, 
		  
		   { 
			data: [<?=$phien_x3?>],
			label: "Xúc sắc 3 ",
			borderColor: "#01DF01",
			fill: false
		  }, 
		  
		  { 
			data: [<?=$phien_x4?>],
			label: "Tổng ",
			borderColor: "#FF0000",
			fill: true
		  }, 
		]
	  },
	  options: {
		title: {
		  display: true,
		  text: '20 phiên gần đây'
		}
	  }
	});
                    </script>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-xl-3 col-md-3">
                      
<section class="panel">

<div class="panel-body">
                               
                               <canvas id="pie-chart" height="600"></canvas>
                               
                               <script>
                                   new Chart(document.getElementById("pie-chart"), {
		type: 'pie',
		data: {
		  labels: ["Nút 1", "Nút 2", "Nút 3", "Nút 4", "Nút 5", "Nút 6"],
		  datasets: [{
			label: "Population (millions)",
			backgroundColor: ["#36a2eb", "#ff6384","#4bc0c0","#ffcd56","#07b107", "#40FF00"],
			data: [<?=$sao1?>,<?=$sao2?>,<?=$sao3?>,<?=$sao4?>,<?=$sao5?>,<?=$sao6?>]
		  }]
		},
		options: {
		  title: {
			display: true,
			text: 'Thống kê <?=$tongso?> phiên '
		  }
		}
	});
                               </script>
                               
                                <h4 class="card-title m-t-30">Phiên trước</h4>
                                <div class="list-group">
                                    <b  class="list-group-item">  
                                        Phiên : #<?=$idphien?>
                                    </b>
                                     <b  class="list-group-item">  
                                        Thời gian : <?=$thoigian?>
                                    </b>
                                    
                                    <b  class="list-group-item">  
                                        Kết quả : <?=$x1?> - <?=$x2?> - <?=$x3?>
                                    </b>
                                    
                                    <b  class="list-group-item">  
                                        Bên thắng : <?=($x1+$x2+$x3 <=10 ? 'Xỉu' : 'Tài')?>
                                    </b>
                                    
                                   
                                   
                                    
                             
                        </div>  </div></section>
                    </div>
                    <!-- Column -->
                </div>
<?PHP

include_once('../../../core/system/end.php');