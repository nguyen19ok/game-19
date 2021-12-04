<?PHP
include_once('../../../core/system/config.php');

$title = 'Chuyển tiền';

include_once('../../../core/system/head.php');


if($id <=0)
{
    echo thongbao('Vui lòng đăng nhập','loi'); echo '<script>window.location.href="/guest/dangnhap.html"</script>';
    exit();
}
if(isset($_POST['sotien']))
{
    $tien = html($_POST['sotien']);
    $to = html($_POST['taikhoan']);
    $pass = html($_POST['matkhau']);
    $pass2 = html($_POST['matkhau2']);
    $noidung = html($_POST['noidung']);
    $tienphi = $tien*$system->data->tile_chuyentien;
    
    if($tien <= 0)
    {
        echo thongbao('Số tiền chuyển phải lớn hơn 0','loi');
    }
    
    else
    if(md5($pass) != $datauser->thongtin->matkhau)
    {
        echo thongbao('Mật khẩu bạn nhập không chính xác','loi');
    }
    else
    if($tienphi > $datauser->xu)
    {
        echo thongbao('Tài khoản của bạn không đủ tiền để giao dịch','loi');
    }
    else
    {
        $t = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$to."' or `id` = '".$to."'");
        if($t->num_rows <=0)
        {
            echo thongbao('Không tồn tại người dùng này','loi');
        }
        else
        {
            $n = $t->fetch_assoc();
            if($n['id'] == $id)
            {
                echo thongbao('Không thể tự chuyển đến cho mình','loi');
            }
            else
            {
                echo thongbao('Chuyển tiền thành công.','thanhcong');
                sodu($id,$datauser->xu,-$tienphi,'Chuyển tiền cho người khác.');
                $datauser->upxu(-$tienphi);
                $s->thoigian = $thoigian;
                $s->noidung = $noidung;
                $s->xu = $tien;
                $s->phi = $tienphi-$tien;
                $s->code = az();
                
                $idto = $n['id'];
                
                $mysqli->query("INSERT INTO `chuyentien` SET `to` = '".$idto."', `from` = '".$id."', `data` = '".json_encode($s)."'");
                $b = new users($idto);
                sodu($b->id,$b->xu,$tien,'Nhận tiền từ người chơi.');
                $mysqli->query("UPDATE `nguoichoi` SET `xu` = `xu` + '".$tien."' WHERE `id` = '".$idto."' ");
                #doanh thu
                $doanhthu->up('chuyentien',$tien);
                $doanhthu->up('chuyentien_phi',($tienphi-$tien));
            }
        }
    }
    
}
$list_chuyen = $mysqli->query("SELECT * FROM `chuyentien` WHERE `from` = '".$id."' ORDER by `id` DESC LIMIT 10");
                    
                    $list_gui = $mysqli->query("SELECT * FROM `chuyentien` WHERE `to` = '".$id."' ORDER by `id` DESC LIMIT 10");
                    $data_chuyen = '';
                    $data_gui = '';
                    while($chuyen = $list_chuyen->fetch_assoc())
                    {
                        $k = json_decode($chuyen['data']);
                        $to = new users($chuyen['to']);
                        $data_chuyen.='<div class="table-row">
                                            <div class="item">'.$k->thoigian.'</div>
                                            <div class="item">'.$to->taikhoan.'</div>
                                            <div class="item">'.number_format($k->xu).'</div>
                                            <div class="item">'.number_format($k->phi).'</div>
                                            <div class="item">'.$k->noidung.'</div>
                                        </div>';
                    }
                    
                    while($chuye2n = $list_gui->fetch_assoc())
                    {
                        $k = json_decode($chuye2n['data']);
                        $to = new users($chuye2n['from']);
                        $data_gui.='<div class="table-row"><div class="item">
						'.$k->thoigian.'</div>
                                            <div class="item">'.$to->taikhoan.'</div>
                                            <div class="item">'.number_format($k->xu).'</div>
                                            <div class="item">'.number_format($k->phi).'</div>
                                            <div class="item">'.$k->noidung.'</div>
                                        </div>';
                    }

?>




<div class="sha-deposit-info">
<div class="w-deposit" style="width:100%;">


<div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Chuyển tiền</h5></div>
<div class="deposit-body">
                              
                               <form name="dangki" action="/true/chuyentien.html" class="form pt-3" id="formlogin" method="post">
                                    <div class="form-group">
                                        <label>Tên tài khoản nhận</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" placeholder="" aria-label="Username" id="taikhoan" name="taikhoan" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Số tiền</label>
                                        <div class="input-group mb-3">
                                          
                                            <input type="number" class="form-control" placeholder="" id="sotien"  name="sotien" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                  
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <div class="input-group mb-3">
                                    
                                            <input type="password" class="form-control"  name="matkhau" aria-describedby="basic-addon33">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Nội dung</label>
                                        <textarea class="form-control" name="noidung" rows="4"></textarea>
                                    </div>
                                    
                                    <button style="margin-top:5px" class="button-withdraw" name="dangki"  type="submit"></button>
                                </form>
                                
                               
                            </div>
							</div>
                    </div>
                 
                    
  <div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-name">Thời gian</div>
<div class="item item-sv">Người nhận</div>
<div class="item item-amount">Số vàng</div>
<div class="item item-gif">Phí</div>
<div class="item item-gif">Nội dung</div>
</div>
<div class="content-table">                  
      <?=$data_chuyen?>

   
                    
</div>
	
</div>
</div>  



 <div class="sha-top-guild-s">
<div class="deposit-title"></div>
<div class="top-guild-table">
<div class="title-table">
<div class="item item-name">Thời gian</div>
<div class="item item-sv">Người gửi</div>
<div class="item item-amount">Số vàng</div>
<div class="item item-gif">Phí</div>
<div class="item item-gif">Nội dung</div>
</div>
<div class="content-table">                  
      <?=$data_gui?>

   
                    
</div>
	
</div>
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
                
           
</div></div>





<script>
       

<?PHP


include_once('../../../core/system/end.php');