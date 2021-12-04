<?PHP
include_once('../../../core/system/config.php');
$title = 'Cược bầu cua';
include_once('../../../core/system/head.php');
function satus($code,$id)
{
    if($code == 0) return '<font color="blue">Đang chạy phiên</font>';
    else if($code == 1) return '<font color="green">Hoàn tất</font>';
    else return '<a href="/baucua/cuoc.html?id='.$id.'"><font color="red">[Nhận lại xu]</font></a>';
}

if(isset($_GET['id']))
{
    $kiemtra = $mysqli->query("SELECT * FROM `cuoc_baucua` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
    if($kiemtra['id'] <=0)
    {
        echo thongbao('Không tìm thấy lịch sử cược','loi');
    }
    else
    if($kiemtra['uid'] != $id)
    {
        echo thongbao('Không phải của bạn','loi');
    }
    else
    {
        $data = json_decode($kiemtra['data'],true);
        if($data['code'] !=2)
        {
            echo thongbao('Không thể thực hiện','loi');
        }
        else
        if($data['t'] >= time())
        {
            echo thongbao('Vẫn đang trong thời gian chạy phiên','loi');
        }
        else
        if($data['danhan'] !=0)
        {
            echo thongbao('Bạn đã nhận lại xu rồi','loi');
        }
        else
        {
            $data['danhan'] = 1;
            $data['code'] = 1;
            $data['hoantra'] = 0;
            foreach(explode(",",$data['cuoc']) as $xu)
            {
                sodu($id,$datauser->xu,$xu,'Hoàn trả cược bầu cua do hết phiên...');
                $data['hoantra']+=$xu;
                $datauser->upxu($xu);
            }
            $mysqli->query("UPDATE `cuoc_baucua` SET `data` = '".json_encode($data)."' WHERE `id` = '".$_GET['id']."' AND `uid` = '".$id."'");
            echo thongbao('Bạn nhận được '.number_format($data['hoantra']).' xu ','thanhcong');
        }
    }
}


$phien_ngocrong = $mysqli->query("SELECT * FROM `cuoc_baucua`  WHERE `uid` = '".$id."'  ORDER by id DESC LIMIT 100");

$tongso = 0;
$phien = '';
$dem = 0;
$tiencuoc = '';
$tienthang = '';
$tongcuoc = 0;
$tongthang2 = 0;
$tiencho = 0;
$tienhoan = 0;
$phientruoc_chon = '';
$phientruoc_hoantra = '';
$phientruoc_nhan = '';
$phientruoc_trangthai = '';
while($data = $phien_ngocrong->fetch_assoc())
{
    $ngocrong = json_decode($data['data'],true);
    $tongso+=1;
    #   gọi biến
    $huoi = explode(",",$ngocrong['cuoc'])[0];
    $bau = explode(",",$ngocrong['cuoc'])[1];
    $ga  = explode(",",$ngocrong['cuoc'])[2];
    $ca  = explode(",",$ngocrong['cuoc'])[3];
    $cua = explode(",",$ngocrong['cuoc'])[4];
    $tom = explode(",",$ngocrong['cuoc'])[5];
    # Lấy phiên đầu tiên
    if($dem <=0)
    {
        $phientruoc_chon = ' '.($huoi >=1 ? ' Hươu '.number_format($huoi).' xu,' : '').' '.($bau >=1 ? ' Bầu '.number_format($bau).' xu,' : '').' '.($ga >=1 ? ' Gà '.number_format($ga).' xu,' : '').' '.($ca >=1 ? ' Cá '.number_format($ca).' xu,' : '').' '.($cua >=1 ? ' Cua '.number_format($cua).' xu,' : '').' '.($tom >=1 ? ' Tôm '.number_format($tom).' xu,' : '').'  ';
        $phientruoc_hoantra = $ngocrong['hoantra'];
        $phientruoc_nhan = $ngocrong['nhan'];
        $phientruoc_trangthai = satus($ngocrong['code'],$data['id']);
        $idphien = $ngocrong['phien'];
        $thoigian = $ngocrong['thoigian'];
    }
    //
    # xử lý nếu phiên lỗi
    if($ngocrong['code'] <=0 AND $ngocrong['t'] <= time())
    {
        $ngocrong['code'] = 2;
        $mysqli->query("UPDATE `cuoc_baucua` SET `data` = '".json_encode($ngocrong)."' WHERE `id` = '".$data['id']."'");
    }
   
    # TIỀN CHỜ
    if($ngocrong['code'] == 0)
    {
        $tiencho+=($huoi+$ga+$bau+$ca+$cua+$tom)-$ngocrong['hoantra'];
    }
    
    if($ngocrong['code'] == 1)
    {
        $tienthang2+=$ngocrong['nhan'];
    }
    $tienhoan+= $ngocrong['hoantra'];
    
    if($dem <=20 AND $ngocrong['code'] == 1)
    {
       $phien.=''.$ngocrong['phien'].','; 
       $tiencuoc.=''.(($huou+$bau+$ga+$ca+$tom+$cua)).',';
       $tienthang.=$ngocrong['nhan'].',';
    }
    
    if($dem <=50)
    {
        $table.='<tr> <td>'.$ngocrong['phien'].'</td> <td>'.$ngocrong['thoigian'].'</td>  <td> '.($huoi >=1 ? ' Hươu '.number_format($huoi).' xu,' : '').' '.($bau >=1 ? ' Bầu '.number_format($bau).' xu,' : '').' '.($ga >=1 ? ' Gà '.number_format($ga).' xu,' : '').' '.($ca >=1 ? ' Cá '.number_format($ca).' xu,' : '').' '.($cua >=1 ? ' Cua '.number_format($cua).' xu,' : '').' '.($tom >=1 ? ' Tôm '.number_format($tom).' xu,' : '').'</td> <td>'.number_format($ngocrong['hoantra']).'</td> <td>'.number_format($ngocrong['nhan']).'</td> <td>'.satus($ngocrong['code'],$data['id']).'</td> </tr>';
    }
    
 
    $dem+=1;
}

?>

<div class="page-header">

<h2>Cược bầu cua</h2>
</div>


<div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xl-9 col-md-9">
                       <section class="panel">

<div class="panel-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">Lịch sử cược</h4>
                                </div>
                                <div id="bieudo_cuoc"></div>
                                
                                <!------THỐNG KÊ BẢNG------->
                                
                                <div class="table-responsive">
                                    <h4 class="card-title">Thống kê cược</h4>
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"># Phiên</th>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Cửa chọn</th>
                                            <th scope="col">Hoàn trả</th>
                                            <th scope="col">Tiền nhận</th>
                                            <th scope="col">Trạng thái</th>
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
                        var i = c3.generate({
        bindto: "#bieudo_cuoc",
        size: { height: 400 },
        color: { pattern: ["#2962FF", "#E91E63"] },
        data: {
            x: "x",
            columns: [
                ["x", <?=$phien?>],
                ["Tiền cược", <?=$tiencuoc?>],
                ["Tiền thắng", <?=$tienthang?>]

            ]
        },
         axis: { y: { tick: { format: d3.format("$,") } } },

        grid: { y: { show: !0 } }
    });
                    </script>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-xl-3 col-md-3">
                        <section class="panel">

                        
                        
                        
                        
                      <div class="panel-body">
                         
                            <div class="card-body">
                               
                               
                              <div id="morris-donut-chart"></div>
                               
                               <script>
                                Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Tiền thắng",
            value: <?=$tienthang2?>,
            

        }, {
            label: "Tiền chờ",
            value: <?=$tiencho?>
        }, {
            label: "Tiền hoàn",
            value: <?=$tienhoan?>
        }],
        resize: true,
        colors:['#2962FF', '#55ce63', '#2f3d4a']
    });
                               </script>
                               
                                <h4 class="card-title m-t-30">Phiên trước</h4>
                                <div class="list-group">
                                    <b  class="list-group-item">  
                                        Phiên : #<?=$idphien?>
                                    </b>
                                    <b  class="list-group-item">  
                                        Trạng thái : <?=$phientruoc_trangthai?>
                                    </b>
                                     <b  class="list-group-item">  
                                        Thời gian : <?=$thoigian?>
                                    </b>
                                    
                                    <b  class="list-group-item">  
                                        Cửa chọn : <?=$phientruoc_chon?>
                                    </b>
                                    
                                    <b  class="list-group-item">  
                                        Hoàn trả : <?=number_format($phientruoc_hoantra)?>
                                    </b>
                                    
                                    <b  class="list-group-item">  
                                        Tiền thắng : <?=number_format($phientruoc_tiennhan)?>
                                    </b>
                                    
                                   
                                   
                                    
                                </div>
                            </div>
                        </div>
                        </section>
                    </div>
                    <!-- Column -->
                </div>
<?PHP

include_once('../../../core/system/end.php');