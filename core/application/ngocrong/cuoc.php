<?PHP
include_once('../../../core/system/config.php');
$title = 'Cược Ngọc Rồng';
include_once('../../../core/system/head.php');
function satus($code,$id)
{
    if($code == 0) return '<font color="blue">Đang chạy phiên</font>';
    else if($code == 1) return '<font color="green">Hoàn tất</font>';
    else return '<a href="/ngocrong/cuoc.html?id='.$id.'"><font color="red">[Nhận lại xu]</font></a>';
}

if(isset($_GET['id']))
{
    $kiemtra = $mysqli->query("SELECT * FROM `cuoc_ngocrong` WHERE `id` = '".$_GET['id']."'")->fetch_assoc();
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
            foreach(explode(",",$data['xu']) as $xu)
            {
                sodu($id,$datauser->xu,$xu,'Hoàn trả cược ngọc rồng do hết phiên...');
                $data['hoantra']+=$xu;
                $datauser->upxu($xu);
            }
            $mysqli->query("UPDATE `cuoc_ngocrong` SET `data` = '".json_encode($data)."' WHERE `id` = '".$_GET['id']."' AND `uid` = '".$id."'");
            echo thongbao('Bạn nhận được '.number_format($data['hoantra']).' xu ','thanhcong');
        }
    }
}


$phien_ngocrong = $mysqli->query("SELECT * FROM `cuoc_ngocrong`  WHERE `uid` = '".$id."'  ORDER by id DESC LIMIT 100");

$tongso = 0;
$phien = '0';
$dem = 0;
$tiencuoc = '0';
$tienthang = '0';
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
    # Lấy phiên đầu tiên
    if($dem <=0)
    {
        $phientruoc_chon = ''.(explode(",",$ngocrong['xu'])[0] !=0 ? 'Tài :'.number_format(explode(",",$ngocrong['xu'])[0]).'' : '').' '.(explode(",",$ngocrong['xu'])[1] !=0 ? 'Xỉu :'.number_format(explode(",",$ngocrong['xu'])[1]).'' : '').'';
        $phientruoc_hoantra = $ngocrong['hoantra'];
        $phientruoc_nhan = $ngocrong['nhan'];
        $phientruoc_trangthai = satus($ngocrong['code'],$data['id']);
    }
    //
    # xử lý nếu phiên lỗi
    if($ngocrong['code'] <=0 AND $ngocrong['t'] <= time())
    {
        $ngocrong['code'] = 2;
        $mysqli->query("UPDATE `cuoc_ngocrong` SET `data` = '".json_encode($ngocrong)."' WHERE `id` = '".$data['id']."'");
    }
    if($dem <=0)
    {
        $idphien = $ngocrong['phien'];
        $thoigian = $ngocrong['thoigian'];
        $x1 = $ngocrong['x1'];
        $x2 = $ngocrong['x2'];
        $x3 = $ngocrong['x3'];
    }
    # TIỀN CHỜ
    if($ngocrong['code'] == 0)
    {
        $tiencho+=((explode(",",$ngocrong['xu'])[0]+explode(",",$ngocrong['xu'])[1])-$ngocrong['hoantra']);
    }
    
    if($ngocrong['code'] == 1)
    {
        $tienthang2+=$ngocrong['nhan'];
    }
    $tienhoan+= $ngocrong['hoantra'];
    
    if($dem <=20 AND $ngocrong['code'] == 1)
    {
       $phien.=','.$ngocrong['phien']; 
       $tiencuoc.=','.((explode(",",$ngocrong['xu'])[0]+explode(",",$ngocrong['xu'])[1])-$ngocrong['hoantra']).'';
       $tienthang.=','.$ngocrong['nhan'];
    }
    
    if($dem <=50)
    {
        $table.='<tr> <td>'.$ngocrong['phien'].'</td> <td>'.$ngocrong['thoigian'].'</td>  <td>'.(explode(",",$ngocrong['xu'])[0] !=0 ? 'Tài :'.number_format(explode(",",$ngocrong['xu'])[0]).'' : '').' '.(explode(",",$ngocrong['xu'])[1] !=0 ? 'Xỉu :'.number_format(explode(",",$ngocrong['xu'])[1]).'' : '').'</td> <td>'.number_format($ngocrong['hoantra']).'</td> <td>'.number_format($ngocrong['nhan']).'</td> <td>'.satus($ngocrong['code'],$data['id']).'</td> </tr>';
    }
    
 
    $dem+=1;
}

?>

<div class="page-header">

<h2>Cược Tài xỉu</h2>
</div>


<div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xl-9 col-md-9">
                             <section class="panel">

<div class="panel-body">
                        
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">Lịch sử cược</h4>
                                </div>
                                <div id="thongkecuoc_taxiu" style="height:400px;"></div>
                                
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
    var myChart = echarts.init(document.getElementById('thongkecuoc_taxiu'));

        // specify chart configuration item and data
        var option = {
                // Setup grid
                grid: {
                     left: '1%',
                    right: '2%',
                    bottom: '3%',
                    containLabel: true
                },

                // Add Tooltip
                tooltip : {
                    trigger: 'axis'
                },

                // Add Legend
                legend: {
                    data:['Tiền cược','Tiền thắng']
                },

                // Add custom colors
                color: ['#2962FF', '#f62d51'],

                // Enable drag recalculate
                calculable : true,

                // Horizontal Axiz
                xAxis : [
                    {
                        type : 'category',
                        boundaryGap : false,
                        data : [<?=$phien?>]
                    }
                ],

                // Vertical Axis
                yAxis : [
                    {
                        type : 'value',
                        axisLabel : {
                            formatter: '{value} xu'
                        }
                    }
                ],

                // Add Series
                series : [
                    {
                        name:'Tiền cược',
                        type:'line',
                        data:[<?=$tiencuoc?>],
                        markPoint : {
                            data : [
                                {type : 'max', name: 'Max'},
                                {type : 'min', name: 'Min'}
                            ]
                        },
                        markLine : {
                            data : [
                                {type : 'average', name: 'Average'}
                            ]
                        },
                        lineStyle: {
                            normal: {
                                width: 3,
                                shadowColor: 'rgba(0,0,0,0.1)',
                                shadowBlur: 10,
                                shadowOffsetY: 10
                            }
                        },
                    },
                    {
                        name:'Tiền thắng',
                        type:'line',
                        data:[<?=$tienthang?>],
                        markPoint : {
                            data : [
                                {name : 'Week low', value : -2, xAxis: 1, yAxis: -1.5}
                            ]
                        },
                        markLine : {
                            data : [
                                {type : 'average', name : 'Average'}
                            ]
                        },
                        lineStyle: {
                            normal: {
                                width: 3,
                                shadowColor: 'rgba(0,0,0,0.1)',
                                shadowBlur: 10,
                                shadowOffsetY: 10
                            }
                        },
                    }
                ]
            };
        // use configuration item and data specified to show chart
        myChart.setOption(option);
                    </script>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-xl-3 col-md-3">
                        
                                                     <section class="panel">

<div class="panel-body">
                        
                        
                            <div class="border-bottom p-15">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Sharemodel" style="width: 100%">
                                    <i class="ti-share m-r-10"></i> Thống kê
                                </button>
                            </div>
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
                    <!-- Column -->
                    </section>
                </div>
<?PHP

include_once('../../../core/system/end.php');