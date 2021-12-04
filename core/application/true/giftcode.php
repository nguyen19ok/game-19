<?PHP
include_once('../../../core/system/config.php');

$title = 'Mã quà tặng';
#   DucNghia

include_once('../../../core/system/head.php');

echo'<div class="page-header">

<h2>Gift Code</h2>
</div>';

if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập','loi'); echo '<script>window.location.href="/guest/dangnhap.html"</script>';
    exit();
}

if(isset($_POST['text']))
{
    $text = $_POST['text'];
    if(empty($text))
    {
        echo thongbao('Vui lòng nhập đầy đủ','loi');
    }
    else
    {
        if($mysqli->query("SELECT * FROM `log_giftcode` WHERE `text` = '".$text."' AND `uid` = '".$id."'")->num_rows >=1)
        {
            echo thongbao('Bạn đã sử dụng mã quà tặng này.','loi');
        }
        else
        if($mysqli->query("SELECT * FROM `giftcode` WHERE `text` = '".$text."'")->num_rows <=0)
        {
            echo thongbao('Không tồn tại mã quà tặng này.','loi');
        }
        else
        {
            $giftcode = $mysqli->query("SELECT * FROM `giftcode` WHERE `text` = '".$text."'")->fetch_assoc();
            $code = json_decode($giftcode['data'],true);
            if($code['solan'] <=0)
            {
                echo thongbao('Mã quà tặng này đã hết lần sử dụng','loi');
            }
            else
            if($code['time'] < time())
            {
                echo thongbao('Mã quà tặng này đã hết hạn sử dụng mất rồi.','loi');
            }
            else
            {
                sodu($id,$datauser->xu,$code['xu'],'Sử dụng giftcode.');
                $datauser->upxu($code['xu']);
                $code['solan']+=-1;
                $mysqli->query("UPDATE `giftcode` SET `data` = '".json_encode($code)."' WHERE `text` = '".$text."'");
                $mysqli->query("INSERT INTO `log_giftcode` SET `uid` = '".$id."', `text` = '".$text."', `data` = '".json_encode(array("thoigian"=>$thoigian,"xu"=>$code['xu']))."'");
                echo thongbao('Sử dụng thành công.','thanhcong');
            }
            
        }
    }
}

?>
<script>

    $(document).ready(function() {
        $("#sotien").each(function()
        {
            $(this).keyup(function()
            {
               
                document.getElementById('sotien').addEventListener('input', function (e) {
                 e.target.value = e.target.value.toUpperCase();   
                var x = e.target.value.replace(/\W/g, '').match(/(\w{0,4})(\w{0,4})(\w{0,4})(\w{0,1})/);
                
                e.target.value = x[1] + (x[2] ? '-'+x[2]+'' : '')+ (x[3] ? '-'+x[3]+'' : '')+ (x[4] ? '-'+x[4]+'' : '');
                });
               
            });
        });
        
    });
</script>




<div class="row">
                    <!-- Column -->
                    <div class="col-md-6">
                       
                             <section class="panel">
<header class="panel-heading">

<h2 class="panel-title">Nhập mã gift code</h2>

</header>
<div class="panel-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">Mã quà tặng</h4>
                                    
                                </div>
                                Nhập mã quà tặng để nhận thưởng
                              
                               <form name="dangki" action="/true/giftcode.html" class="form pt-3" id="formlogin" method="post">
                                   
                                    
                                    <div class="form-group">
                                        <label>Mã</label>
                                        <div class="input-group mb-3">
                                            
                                            <input type="text" class="form-control" placeholder="Code" id="sotien"  name="text" aria-describedby="basic-addon11">
                                        </div>
                                    </div>

                                    
                                    <button class="btn btn-success mr-2" style="margin-top:5px" name="dangki"  type="submit" id="thaiBtn">Nhận quà</button>
                                </form>
                                
                               
                            </div>
                       </section>
                    </div>
                    
                    <!-- Column -->
                    <!-- Column -->
                    <?PHP
                    $list_chuyen = $mysqli->query("SELECT * FROM `log_giftcode` WHERE `uid` = '".$id."' ORDER by `id` DESC LIMIT 10");
                    
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
                        $k = json_decode($chuyen['data']);
                        $data_chuyen.='<tr>
                                            <th scope="row">'.$k->thoigian.'</th>
                                            <td>'.$chuyen['text'].'</td>
                                            <td>'.number_format($k->xu).'</td>
                                        </tr>';
                    }
                    
                    
                    ?>
                    <div class="col-md-6">
                        
                          <section class="panel">
<header class="panel-heading">

<h2 class="panel-title">Lịch sử</h2>

</header>
<div class="panel-body">
                        
                        
                            <div class="card-body">
                                <h4 class="card-title">Lịch sử</h4>
                                <h6 class="card-subtitle">10 kết quả gần nhất.</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Giá trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$data_chuyen?>
                                        
                                    </tbody>
                                </table>
                            </div>
                     
                        
                        
                        
                        </div>
                        </section>
                    </div>
                    <!-- Column -->
                </div>

<?PHP


include_once('../../../core/system/end.php');
