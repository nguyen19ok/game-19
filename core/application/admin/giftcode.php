<?PHP
include_once('../../../core/system/config.php');
$title = 'Giftcode';
include_once('../../../core/system/head.php');


if($admin <=4)
{
    echo 'Bạn không đủ quyền để vào khu vực này';
    exit();
}


if(isset($_POST['soluong']))
{
    $soluong = $_POST['soluong'];
    $xu = $_POST['xu'];
    $solan = $_POST['solan'];
    $time = $_POST['time'];
    $i = 0;
    if($soluong <=0)
    {
        echo thongbao('số lượng không hợp lệ','loi');
    }
    else
    if($xu <=0)
    {
        echo thongbao('Số xu không hợp lệ','loi');
    }
    else
    if($solan <=0)
    {
        echo thongbao('Số lần không hợp lệ','loi');
    }
    else
    if($time <=0)
    {
        echo thongbao('Thời gian không hợp lệ','loi');
    }
    else
    {
        $c = array(
            'thoigian' => $thoigian,
            'uid' => $id,
            'xu' => $xu,
            'time' => ($time+time()),
            'solan' => $solan,
            );
            while($i < $soluong)
            {
                $code = random(4).'-'.random(4).'-'.random(4).'-'.random(1);
                $mysqli->query("INSERT INTO `giftcode` SET `text` = '".$code."', `data` = '".json_encode($c)."'");
                echo thongbao($code,'thanhcong');
                $i++;
            }
    }
}


$log = $mysqli->query("SELECT * FROM `giftcode`    ORDER by id DESC LIMIT $start, $kmess");
$hethan = 0;
$hetdung = 0;
while($giftcode = $log->fetch_assoc())
{
    $code = json_decode($giftcode['data'],true);
    if(isset($_GET['hethan']))
    {
       if($code['time'] <= time())
       {
           $mysqli->query("DELETE FROM `giftcode` WHERE `id` = '".$giftcode['id']."'");
       }
    }
    
    if(isset($_GET['hetdung']))
    {
       if($code['solan'] <=0)
       {
           $mysqli->query("DELETE FROM `giftcode` WHERE `id` = '".$giftcode['id']."'");
       }
    }
    if($code['solan'] <=0)
    {
        $hetdung+=1;
    }
    if($code['time'] <= time())
    {
        $hethan+=1;
    }
    $table.='<tr>
    <td><a href="?text='.$giftcode['text'].'">'.$giftcode['text'].'</a></td>
    <td>'.number_format($code['xu']).'</td>
    <td>'.number_format($code['solan']).'</td>
    <td>'.thoigiantinh($code['time']).'</td>
    <td>'.(new users($code['uid']))->name().'</td>
    <td>'.$code['thoigian'].'</td>
    </tr>';
    
}
if($mysqli->query("SELECT * FROM `giftcode` ")->num_rows > $kmess)
{
    $trang = '<center>' . trang('?', $start, $mysqli->query("SELECT * FROM `giftcode` ")->num_rows, $kmess) . '</center>';
}

if(isset($_GET['text']))
{
    $log = $mysqli->query("SELECT * FROM `log_giftcode`  WHERE `text` = '".$_GET['text']."'   ORDER by id DESC LIMIT $start, $kmess");
    while($giftcode = $log->fetch_assoc())
    {
        $code = json_decode($giftcode['data'],true);
        $table2.= '<tr><td>'.$code['thoigian'].'</td><td>'.number_format($code['xu']).'</td><td>'.(new users($giftcode['uid']))->name().'</td><tr>';
    }
    if($mysqli->query("SELECT * FROM `log_giftcode`  WHERE `text` = '".$_GET['text']."' ")->num_rows > $kmess)
    {
        $trang2 = '<center>' . trang('?text='.$_GET['text'].'', $start, $mysqli->query("SELECT * FROM `log_giftcode`  WHERE `text` = '".$_GET['text']."' ")->num_rows, $kmess) . '</center>';
    }
}
?>
<div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xl-9 col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <?PHP if(isset($_GET['text'])) { ?>
                                <h4 class="card-title">Danh sách người dùng code</h4>
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Giá trị</th>
                                            <th scope="col">Người dùng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$table2?>
                                       
                                    </tbody>
                                </table>
                                <?=$trang?>
                                <?PHP } else { ?>
                                <h4 class="card-title">Tạo mới</h4>
                                <form name="dangki" action="/admin/giftcode.html" class="form pt-3" id="formlogin" method="post">
                                   
                                    
                                  <div class="form-group">
                                        <label>Số lượng</label>
                                        <div class="input-group mb-3">
                                           
                                            <input  type="number" class="form-control" value="1"  aria-label="tieude" name="soluong" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Xu :</label>
                                        <div class="input-group mb-3">
                                           
                                            <input  type="number" class="form-control" value="0"  aria-label="tieude" name="xu" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Số lần dùng :</label>
                                        <div class="input-group mb-3">
                                           
                                            <input  type="number" class="form-control" value="1"  aria-label="tieude" name="solan" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Hạn sử dụng (giây) :</label>
                                        <div class="input-group mb-3">
                                           
                                            <input  type="number" class="form-control" value="0"  aria-label="tieude" name="time" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    

                                  

                                    <button name="dangki"  type="submit" class="btn btn-success mr-2">Tạo</button>
                                </form>
                                <hr>
                                <b>Ghi chú :</b>
                                <br> - Nếu muốn cho số phút thì <b>Số phút *60</b> 
                                <br> - Nếu muốn giờ thì <b>Số giờ*60*60</b> <br>
                                - Nếu muốn ngày thì <b>Số ngày*24*60</b>
                                <hr>
                                <center>Danh sách <br>
                                    <button type="button" class="btn waves-effect waves-light btn-outline-primary"><a href="?hethan"><?=$hethan?> hết hạn</a></button> <button type="button" class="btn waves-effect waves-light btn-outline-secondary"><a href="?hetdung"><?=$hetdung?> hết dùng</a></button>
                                </center>
                                <hr>
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Giá trị</th>
                                            <th scope="col">Số lần dùng</th>
                                            <th scope="col">Hạn sử dụng</th>
                                            <th scope="col">Tạo bởi</th>
                                            <th scope="col">Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$table?>
                                       
                                    </tbody>
                                </table>
                                <?=$trang?>
                                <?PHP } ?>
                            </div>
                        </div>
                    </div>
                  
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-xl-3 col-md-3">
                        <div class="card">
                           
                            <div class="card-body">
                               
                                <?PHP
                    $list_chuyen = $mysqli->query("SELECT * FROM `log_giftcode`  ORDER by `id` DESC LIMIT 10");
                    
                    $data_chuyen = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
                        $k = json_decode($chuyen['data']);
                        $data_chuyen.='<tr>
                                            <th scope="row">'.$k->thoigian.'</th>
                                            <td><a href="?text='.$chuyen['text'].'">'.$chuyen['text'].'</a></td>
                                            <td>'.(new users($chuyen['uid']))->name().'</td>
                                            <td>'.number_format($k->xu).'</td>
                                        </tr>';
                    }
                    
                    
                    ?>
                    <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Người dùng</th>
                                            <th scope="col">Giá trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$data_chuyen?>
                                        
                                    </tbody>
                                </table>
                            </div>

                         
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
<script>


  $('form').submit(function() {
         $("#splash-screen").show();
      
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            $('#ducnghia').html(this.responseText);

        }
                    $("#splash-screen").fadeOut();

    };
    xhttp.open($(this).attr('method'), $(this).attr('action'), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhttp.send("t=1&load=Y2U2ODFlZmJhMzliZDUwNzY2NjIxODQ4NDc1ZjhlN2E=&"+$(this).serialize());

    history.pushState("object or string representing the state of the page", "Xin Chao", $(this).attr('action'));   
    return false;
});
</script>                                
<?PHP

include_once('../../../core/system/end.php');