<?PHP
include_once('../../../core/system/config.php');
$title = 'Đăng kí tài khoản';
include_once('../../../core/system/head.php');

    echo '<script>window.location.href="/"</script>';

    
    
    exit();


if($id > 0)
{
    echo thongbao('','loi');
    echo '<script>window.location.href="/"</script>';

    
    
    exit();
}



if(isset($_GET['ok']))
{
    $taikhoan   = htmlspecialchars($_POST['taikhoan']);
    $matkhau    = htmlspecialchars($_POST['matkhau']);
    $mk2        = htmlspecialchars($_POST['matkhau2']);
    $email        = htmlspecialchars($_POST['email']);
    
    $ten        = htmlspecialchars($_POST['ten']);
    $xu         = $system->data->xu >= 1 ? $system->data->xu : 0;
    $kiemtra  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."' LIMIT 1")->fetch_assoc();
    if($system->data->dangki >=1)
    {
        $data->code = 0;
        $data->text = thongbao('Đăng ký tạm thời đóng cửa, vui lòng thử lại sau','loi');
        
    }
    else
    if(empty($taikhoan) or empty($matkhau) or empty($mk2) or empty($ten))
    {
        $data->code = 0;
        $data->text = thongbao('Vui lòng nhập đầy đủ thông tin','loi');
        
    }
    else
    if(strlen($taikhoan) <=3 or strlen($taikhoan) >=20)
    {
        $data->code = 0;
        $data->text = thongbao('Tài khoản phải lớn hơn 3 kí tự và nhỏ hơn 20 kí tự','loi');
        
    }
    if(strlen($ten) <=3)
    {
        $data->code = 0;
        $data->text = thongbao('Tài nhân vật lớn hơn 3 kí tự và nhỏ hơn 20 kí tự','loi');
        
    }
    else
    if(!preg_match('/^[a-z0-9]{3,15}$/', $matkhau))
    {
        $data->code = 0;
        $data->text = thongbao('Mật khẩu lớn hơn 3 kí tự và nhỏ hơn 3 kí tự','loi');
        
    }else
    if($matkhau != $mk2)
    {
        $data->code = 0;
        $data->text = thongbao('Mật khẩu bạn nhập không khớp','loi');
        
    }else
    if($kiemtra['id'] >=1)
    {
        $data->code = 0;
        $data->text = thongbao('Tài khoản đã tồn tại','loi');
        
    }
    else
    {
        $mysqli->query("INSERT INTO `nguoichoi` SET `taikhoan` = '".$taikhoan."', `xu` = '".$xu."'");
        $new_id  = $mysqli->insert_id;
        $newplay = new users($new_id);
        $newplay->upthongtin('matkhau',md5($matkhau));
        $newplay->upthongtin('ten',$ten);
        $newplay->upthongtin('reg',$thoigian);
        $newplay->upthongtin('ip_reg',$ip);
        $newplay->upthongtin('kichhoat',1);
        $newplay->upthongtin('avatar','/assets/images/users/1.jpg');
        $msg = thongbao('Đăng kí tài khoản thành công','thanhcong');
        
        
        $_SESSION['id'] = $new_id;
                $data->code = 1;
                
                $login->thoigian = $thoigian;
                $login->ip = $ip;
                $login->browser = $browser;
                $login->cookie = $_COOKIE['PHPSESSID'];
                $login->{'time'} = time();
                
                $mysqli->query("INSERT INTO `login` SET `uid` = '".$nick->id."', `data` = '".json_encode($login)."'");
         echo '<script>window.location.href="/"</script>';
    }
      echo json($data);
      exit();
    
}

?>
  <div class="page-header">

<h2>Đăng ký</h2>
</div>




                <div class="row">
                         <div class="col-md-12">
                        <section class="panel">
<header class="panel-heading">

<h2 class="panel-title">Đăng ký</h2>

</header>
                            <div class="panel-body">
                                <h4 class="card-title">Đăng ký tài khoản</h4>
                                <h5 class="card-subtitle">Chỉ vài bước cơ bản, bạn sẽ trở thành người dùng của trò chơi.</h5>
                                <?=$msg?>
                                <form name="dangki" action="/guest/dangki.html" class="form pt-3" id="formlogin" method="post">
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="vd : thai2002" aria-label="Username" name="taikhoan" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tên hiển thị</label>
                                        
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="vd : Lê Văn Thái" aria-label="Username" name="ten" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                  
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                       
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" aria-label="Password" name="matkhau" aria-describedby="basic-addon33">
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                     
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon4"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" aria-label="Password" name="matkhau2" aria-describedby="basic-addon4">
                                      
                                    </div>
                                    
                                 
                                    
                                    
                                     <div style="margin-top:5px">
                                              <button id="thaiBtn" name="dangki"  type="submit" class="btn btn-success mr-2">Đăng ký</button>
                                                                        <a id="thaiBtn"  href="/guest/dangnhap.html" type="submit" class="btn btn-success mr-2">Đăng Nhập</a>
    </div>
                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
                
           
<?PHP
include_once('../../../core/system/end.php');
?>