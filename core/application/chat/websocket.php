<?PHP

#       DUCNGHIA

include_once('../../../core/system/config.php');


#DUCNGHIAIT
head();

$noidung = html($_POST['noidung']);

if($id <=0)
{
    $d->error = 1;
    $d->msg = 'vui lòng đăng nhập';
}
else
if(strlen($noidung) <=5 or strlen($noidung)>=200)
{
    $d->error =1;
    $d->msg = 'Nội dung phải lớn hơn 5 kí tự và nhỏ hơn 200 kí tự tự';
}



else
{
    $mysqli->query("INSERT INTO `chat` SET `thoigian` = '".$gio.":".$phut."', `noidung` = '".$noidung."', `uid` = '".$uid."'");
    $d->error = 0;
    $d->msg = 'Success';
    $d->profile =
                    
                    '<div style="font-weight: bold;">
                        <img src="'.$datauser->thongtin->avatar.'" class="img-responsive img-circle" style="float: left; height: 40px; width: 40px; margin-right: 5px; background: url(&quot;&quot;) center center / cover;">
                            <span style="font-size: 16px;"><a href="/profile/profile.html?id='.$uid.'"><span style="font-size: 16px;">'.$datauser->name().'</span></a></span> <br>
                            <p class="chatTxt" style="color: white;">'.$noidung.'</p>
                        
                    </div>';
                    
                    
                    
                    ;
   
    
     $d->ws =   '<div style="font-weight: bold;">
                        <img src="'.$datauser->thongtin->avatar.'" class="img-responsive img-circle" style="float: left; height: 40px; width: 40px; margin-right: 5px; background: url(&quot;&quot;) center center / cover;">
                            <span style="font-size: 16px;"><a href="/profile/profile.html?id='.$uid.'"><span style="font-size: 16px;">'.$datauser->name().'</span></a></span> <br>
                            <p class="chatTxt" style="color: white;">'.$noidung.'</p>
                        
                    </div>';
}

echo json($d);