<?PHP
include_once('../../../core/system/config.php');

if(isset($_GET['tangvang']))
{
    $nap = $_POST['id'];
    $xu = $_POST['xu'];

    head();
    if($admin <=4)
{
            $data->code = 0;
        $data->text = thongbao('Lỗi','loi');
} else 
    
    if(empty($nap) or empty($xu))
    {
        $data->code = 0;
        $data->text = thongbao('Vui lòng nhập đầy đủ thông tin','loi');
   
    } 
    else     if($mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$nap."' or `taikhoan` = '".$nap."'")->num_rows <=0)
    {
             $data->code = 0;
        $data->text = thongbao('Tài khoản không tồn tại','loi');   
    }
    else {


               $n = new users($mysqli->query("SELECT * FROM `nguoichoi` WHERE `id` = '".$nap."' or `taikhoan` = '".$nap."' ")->fetch_assoc()['id']);
        sodu($n->id,$n->xu,$xu,'Nạp tiền từ admin.');
        $n->upxu($xu);
        $n->upthongtin('xunap',round($n->thongtin->xunap)+$xu);
        $data = array(
            "id" => $n->id,
            "xu" => $xu,
            "thoigian" => $thoigian,
            );
        $mysqli->query("INSERT INTO `log_nap` SET `uid` = '".$id."', `data` = '".json_encode($data)."'");
                $data->code = 0;
        $data->text = thongbao('Nạp vàng thành công','loi');
       
         
         
    }    
    
 
        
    
    echo json($data);
}
if(isset($_GET['addbank']))
{
$bank  = $_POST['nganhang'];
$stk  = $_POST['sotaikhoan'];
$ctk  = $_POST['chutaikhoan'];
$chinhanh  = $_POST['chinhanh'];
head();

if(empty($bank) or empty($stk) or empty($ctk) or empty($chinhanh))
    {
        $data->code = 0;
        $data->text = thongbao('Vui lòng nhập đầy đủ thông tin','loi');
    } else {
        $data->code = 1;
        $data->text = thongbao('Thêm thành công','loi'); 
        $mysqli->query("INSERT INTO `bank` SET `uid` = '".$id."', `bank` = '".$bank."', `sotaikhoan` = '".$stk."',  `chutaikhoan` = '".$ctk."',  `chinhanh` = '".$chinhanh."',`thoigian`= now()");
        
        
        
    }
	    echo json($data);

    
}
if(isset($_GET['f5-chat']))
{
    
                                   $list = $mysqli->query("SELECT * FROM chat  ORDER by `id` DESC");
                                       
     if ($list->num_rows<=0) {
?>
<script>
    $('#chat').html(loadcontent,3000);

</script>

<?php
         
     } 
                                       
                                       
                                       while($chat = $list->fetch_assoc())
                                       {
                                      
                                           
                                           $i = new users($chat['uid']);
  
                                               
    echo'<div class="item"><p><span class="font-weight-bold"><b><img src="'.$i->thongtin->avatar.'" class="avatar-chat"><span class="name-chat item-1">'.$i->name().'</span>: 
        <span>'.$chat['noidung'].'</span></b></span></p></div>';
                                       
                                       }
}



if(isset($_GET['giftcode']))
{
    $gift  = $_POST['gift'];
            $giftcode = $mysqli->query("SELECT * FROM `giftcode` WHERE `text` = '".$gift."'")->fetch_assoc();
            $code = json_decode($giftcode['data'],true);
    head();
if ($_POST['txtcaptcha'] != $_SESSION['captcha']) 
    {
                $data->code = 1;

        $data->text = thongbao('Captcha không chính xác','loi');

    } else
    if(empty($gift))
    {
        $data->code = 0;
        $data->text = thongbao('Vui lòng nhập đầy đủ thông tin','loi');
    } else        if($mysqli->query("SELECT * FROM `log_giftcode` WHERE `text` = '".$gift."' AND `uid` = '".$id."'")->num_rows >=1)
        {
         $data->code = 0;
        $data->text = thongbao('Bạn đã sử dụng mã quà tặng này','loi');           
            
    } else if($mysqli->query("SELECT * FROM `giftcode` WHERE `text` = '".$gift."'")->num_rows <=0)
        {
          $data->code = 0;
        $data->text = thongbao('Không tồn tại mã quà tặng này','loi');           
        } else if($code['solan'] <=0)
            {
           $data->code = 0;
        $data->text = thongbao('Mã quà tặng này đã hết lần sử dụng','loi');                
            } else  if($code['time'] < time())
 {
            $data->code = 0;
        $data->text = thongbao('Mã quà tặng này đã hết hạn sử dụng mất rồi','loi');      
 }    else {
      sodu($id,$datauser->xu,$code['xu'],'Sử dụng giftcode.');
                $datauser->upxu($code['xu']);
                $code['solan']+=-1;
                $mysqli->query("UPDATE `giftcode` SET `data` = '".json_encode($code)."' WHERE `text` = '".$gift."'");
                $mysqli->query("INSERT INTO `log_giftcode` SET `uid` = '".$id."', `text` = '".$gift."', `data` = '".json_encode(array("thoigian"=>$thoigian,"xu"=>$code['xu']))."'");
            $data->code = 0;
        $data->text = thongbao('Sử dụng thành công','loi');           
        }       

   
 
        
    
    echo json($data);
}


if(isset($_GET['rutvang']))
{
    $bank  = $_POST['nganhang'];
    $password = $_POST['matkhau'];
    $sovang = floor($_POST['vang']);
    $thucnhan=round($sovang*99/100);

    head();  
    if(empty($bank) or empty($password) or empty($sovang))
    {
        $data->code = 0;
        $data->text = thongbao('Vui lòng nhập đầy đủ thông tin','loi');
   
    } else  if($datauser->xu < $sovang)
    {
        $data->code = 0;
        $data->text = thongbao('Tài khoản của bạn không có đủ tiền để thực hiện','loi');          
    } else if(md5($password) != $datauser->thongtin->matkhau)
    {
        $data->code = 0;
        $data->text = thongbao('Mật khẩu bạn nhập không chính xác','loi');       
    } else {
        $data->code = 0;
        $data->text = thongbao('Tạo yêu cầu rút vàng thành công: '.$thucnhan.' ','loi'); 

        sodu($id,$datauser->xu,-$sovang,'Rút vàng');
        $datauser->upxu(-$sovang);
      $mysqli->query("INSERT INTO `logrut` SET `thoigian` = '".$thoigian."', `uid` = '".$id."', `code` = '0', `thongtin` = '".$bank."', `vnd` = '".$sovang."',`thucnhan` = '".$thucnhan."' ");
 $guitoi = ''.$system->data->emailadmin.'';   
        $subject = 'YÊU CẦU RÚT TIỀN MỚI';
        $bcc = "From:conggameonline@gamebai.com\r\n";
        $bcc .= "MIME-Version: 1.0\r\n";             //MỚI
        $bcc .= "Content-type: text/html\r\n";       //MỚI
     
        $noi_dung = '<h3>Bạn vừa có yêu cầu rút tiền mới: <font color="blue">'.$bank.'</br>
        Thời gian: '.$thoigian.'</font> </br>
        !</h3>
      
        <hr>
        <h3><font color="red">
   
Hệ thống chẵn lẻ tài xỉu con số may mắn.<br>
Đổi thẻ - Nạp thẻ - Rút tiền tự động.<br>
Hotline: </font></h3>
        ';
        
    
     $success =  mail ($guitoi, $subject, $noi_dung, $bcc);     
       
         
         
    }    
    
 
        
    
    echo json($data);
}


if(isset($_GET['dangnhap']))
{
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
}
if(isset($_GET['dangky']))
{
    $taikhoan   = html($_POST['taikhoan']);
    $matkhau    = html($_POST['matkhau']);
    $mk2        = html($_POST['matkhau2']);
    $email        = html($_POST['email']);    
    $ten        = html($_POST['name']);
    head();

 
        $xu         = $system->data->xu >= 1 ? $system->data->xu : 0;
    $kiemtra  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `taikhoan` = '".$taikhoan."' LIMIT 1")->fetch_assoc();
    $kiemtramail  = $mysqli->query("SELECT * FROM `nguoichoi` WHERE `email` = '".$email."' LIMIT 1")->fetch_assoc();
    
     if($system->data->dangki >=1)
    {
        $data->code = 0;
        $data->text = thongbao('Đăng ký tạm thời đóng cửa, vui lòng thử lại sau','loi');
    } else
     if(empty($taikhoan) or empty($matkhau) or empty($mk2) or empty($email) or empty($ten))
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
    else
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
    else  if($kiemtramail['id'] >=1)
    {
        $data->code = 0;
        $data->text = thongbao('Email đã tồn tại','loi');
        
    }
    else
   
            {
 $mysqli->query("INSERT INTO `nguoichoi` SET `taikhoan` = '".$taikhoan."', `email` = '".$email."',  `xu` = '".$xu."'");
        $new_id  = $mysqli->insert_id;
        $newplay = new users($new_id);
        $newplay->upthongtin('matkhau',md5($matkhau));
        $newplay->upthongtin('ten',$ten);
        $newplay->upthongtin('reg',$thoigian);
        $newplay->upthongtin('ip_reg',$ip);
        $newplay->upthongtin('kichhoat',1);
        $newplay->upthongtin('avatar','/assets/images/users/1.jpg');

        
        $_SESSION['id'] = $new_id;
                $data->code = 1;
                
                $login->thoigian = $thoigian;
                $login->ip = $ip;
                $login->browser = $browser;
                $login->cookie = $_COOKIE['PHPSESSID'];
                $login->{'time'} = time();
                
                $mysqli->query("INSERT INTO `login` SET `uid` = '".$nick->id."', `data` = '".json_encode($login)."'");
              $data->code = 0;
        $data->text = thongbao('Đăng ký thành công, vui lòng đăng nhập','thanhcong');

                
            }
                echo json($data);

            
        }
if(isset($_GET['chat']))
{
    $chat   = html($_POST['name_chat']);

    head();
    
    if($id <=0)
    {
        
                $data->code = 0;
                $data->text = thongbao('Vui lòng đăng nhập','loi');
        
    } 
    
    else
    if(strlen($chat) <=2)
    {
                $data->code = 0;
                $data->text = thongbao('Nội dung chat phải lớn hơn 2 kí tự','loi');

        
    }
    else
    if(strlen($chat) >=500)
    {
                $data->code = 0;
                $data->text = thongbao('Nội dung chat quá dài','loi');

        
    }
    else
    {


               
        $mysqli->query("INSERT INTO `chat` SET `noidung` = '".$chat."', `username` = '".$datauser->taikhoan."', `uid` = '".$datauser->id."', `thoigian` = now(),`bot`= '0' ");

          
        
    }
    if ($datauser->admin>=1 && $chat=='del') {
                $mysqli->query("DELETE FROM `chat` ");

    }

                echo json($data);
}        
         
    
if(isset($_GET['resetpass']))
{
    $taikhoan = html($_POST['taikhoan']);
    $email  = html($_POST['email']);
    $matkhau=rand(00001,9999999);
    head();
    if(empty($taikhoan) or empty($email))
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

           
            if($nick->email != ($email))
            {
                $data->code = 0;
                $data->text = thongbao('Mail bạn nhập chưa chính xác, vui lòng kiểm tra lại',loi);
            }
            else
            {

        $guitoi = $email;   
        $subject = 'THAY ĐỔI MẬT KHẨU';
        $bcc = "From:conggameonline@gamebai.com\r\n";
        $bcc .= "MIME-Version: 1.0\r\n";             //MỚI
        $bcc .= "Content-type: text/html\r\n";       //MỚI
     
        $noi_dung = '<h3>Mật khẩu mới của bạn là: <font color="blue">'.$matkhau.'</font> </br> !</h3>
      
        <hr>
        <h3><font color="red">
   
Hệ thống chẵn lẻ tài xỉu con số may mắn.<br>
Đổi thẻ - Nạp thẻ - Rút tiền tự động.<br>
Hotline: </font></h3>
        ';
        
    
     $success =  mail ($guitoi, $subject, $noi_dung, $bcc);  
      if( $success == true )
    {
                        $check = $mysqli->query("SELECT * FROM `nguoichoi` WHERE  `taikhoan` = '".$taikhoan."' ")->fetch_assoc();                
            $rsp = json_decode($check['thongtin'],true);
$rsp['matkhau'] = (md5($matkhau));

$mysqli->query("UPDATE `nguoichoi` SET `thongtin` = '".json_encode($rsp)."' WHERE  `taikhoan` = '".$taikhoan."'");
                $data->code = 0;
                $data->text = thongbao('Mật khẩu mới đã gửi về tài khoản email của bạn',thanhcong);  

    } else {
                $data->code = 0;
                $data->text = thongbao('Hệ thống bận',loi);   
  
    }
    


              
                
            }
        }
    }
    echo json($data);
}
if(isset($_GET['rpass']))
{
    $curwentPassword = html($_POST['currentPassword']);
    $newPassword = html($_POST['newPassword']);
    $confirmpassword = html($_POST['password_confirmation']);

    head();
    if (empty($curwentPassword) || empty($newPassword) || empty($confirmpassword)) {
    
        $data->code = 0;
        $data->text = thongbao('Vui lòng nhập đầy đủ thông tin','loi');
    }
    else  if(($datauser->thongtin->matkhau) != md5($curwentPassword)) {
        $data->code = 0;
        $data->text = thongbao('Mật khẩu cũ không chính xác','loi');        
    } else if(($datauser->thongtin->matkhau) == md5($newPassword)) {
        $data->code = 0;
        $data->text = thongbao('Mật khẩu mới không được trùng với mật khẩu cũ','loi');        
    } else if(md5($confirmpassword) != md5($newPassword)) {
        $data->code = 0;
        $data->text = thongbao('Mật khẩu mới không trùng khớp','loi');        
    } else {
    
        
                 $check = $mysqli->query("SELECT * FROM `nguoichoi` WHERE  `taikhoan` = '".$datauser->taikhoan."' ")->fetch_assoc();                
            $rsp = json_decode($check['thongtin'],true);
$rsp['matkhau'] = (md5($newPassword));

$mysqli->query("UPDATE `nguoichoi` SET `thongtin` = '".json_encode($rsp)."' WHERE  `taikhoan` = '".$datauser->taikhoan."'");
                $data->code = 0;
                $data->text = thongbao('Mật khẩu mới thay đổi thành công',thanhcong);  

   
    


              
                
            
       
    }
    echo json($data);

}

?>