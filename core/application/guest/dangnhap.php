<?PHP
include_once('../../../core/system/config.php');
    echo '<script>window.location.href="/"</script>';

    
    
    exit();
if($id > 0)
{
    echo thongbao('','loi');
    echo '<script>window.location.href="/"</script>';

    
    
    exit();
}


if(isset($_GET['ducnghia']))
{
    /*Xử lý dữ liệu post đăng nhập*/
    $taikhoan = html($_POST['taikhoan']);
    $matkhau  = html($_POST['matkhau']);
    head();
    if(empty($taikhoan) or empty($matkhau))
    {
        $data->code = 0;
        $data->text = thongbao('Vui lòng nhập đầy đủ thông tin','loi');
    }
    else
    {
        $code = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."'")->fetch_assoc();
        if($code['id'] <=0)
        {
            $data->code = 0;
            $data->text = thongbao('Không tồn tại tài khoản này.','loi');
        }
        else
        {
            $nick = new users($code['id']);
            if($nick->thongtin->kichhoat <=0)
            {
                $data->code = 0;
                $data->text = thongbao('Tài khoản của bạn chưa được kích hoạt, xin vui lòng liên hệ admin','loi');
            }
            else
            if($nick->thongtin->ban >=1)
            {
                $data->code = 0;
                $data->text = thongbao('Tài khoản của bạn đã bị khóa bởi Admin. Xin vui lòng liên hệ admin để biết thêm chi tiết. Xin cám ơn !','loi');
            }
            else
            if($nick->thongtin->matkhau != md5($matkhau))
            {
                $data->code = 0;
                $data->text = thongbao('Mật khẩu bạn nhập chưa chính xác, vui lòng kiểm tra lại',loi);
            }
            else
            {
                $_SESSION['id'] = $nick->id;
                $data->code = 1;
                
                $login->thoigian = $thoigian;
                $login->ip = $ip;
                $login->browser = $browser;
                $login->cookie = $_COOKIE['PHPSESSID'];
                $login->{'time'} = time();
                
                $mysqli->query("INSERT INTO `login` SET `uid` = '".$nick->id."', `data` = '".json_encode($login)."'");
            }
        }
    }
    echo json($data);
    /*Tác giả : DucNghia*/
    exit();
}
$title = 'Đăng nhập';
include_once('../../../core/system/head.php');



?>
   <div class="page-header">

<h2>Đăng nhập</h2>
</div>
                <div class="row">
                     <div class="col-md-12">
                        <section class="panel">
<header class="panel-heading">

<h2 class="panel-title">Đăng nhập</h2>

</header>
                           <div class="panel-body">
                                <h4 class="card-title">Đăng nhập</h4>
                                <h5 id="log_login" class="card-subtitle">Vui lòng nhập tài khoản và mật khẩu để đăng nhập</h5>
                                <div class="form pt-3" id="form_login">
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                       
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Tài khoản" aria-label="Username" name="taikhoan" aria-describedby="basic-addon11">
                                       
                                    </div>
                                    

                                  
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                       
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" aria-label="Password" name="matkhau" aria-describedby="basic-addon33">
                                     
                                    </div>
    <div style="margin-top:5px">
                                            <button id="thaiBtn" onclick="login()"  type="submit" class="btn btn-success mr-2">Đăng nhập</button>
                                                                        <a id="thaiBtn"  href="/guest/dangki.html" type="submit" class="btn btn-success mr-2">Đăng ký</a>
    </div>

                                </div>
                            </div>  </section>
                        </div>
                    </div>
                </div>
                
           
<?PHP
include_once('../../../core/system/end.php');
?>