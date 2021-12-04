<?PHP
include_once('../../../core/system/config.php');

#   DucNghia
#   trandoducnghia
#   Data_NGOCRONG

head(); #cover head.



if($id <=0)
{
    $d->error = 1;
    $d->msg   = 'Vui lòng đăng nhập';
}
else
if(empty($_POST['keycode']))
{
    $d->msg = 'Không tìm thấy mã ID Socket.';
    $d->error = 1;
}
else
if($_POST['xu'] <=0)
{
    $d->msg = 'Số xu không hợp lệ';
    $d->error = 1;
}
else
if($_POST['xu'] > $datauser->xu)
{
    $d->msg = 'Tài khoản không có đủ tiền';
    $d->error = 1;
}
else
{
    $az = az();
    $d->error = 0;
    $d->msg = 'Đặt cược thành công.';
    sodu($id,$datauser->xu,-$_POST['xu'],'Cược ngọc rồng');
    $datauser->upxu(-$_POST['xu']);
    $datauser->upwin(-$_POST['xu']);
    $d->xu = $_POST['xu'];
    $d->win = $_POST['xu'];
    $d->keycode = $_POST['keycode'];
    $d->cuoc = $_POST['cuoc'];
    $d->az = $az;
    $d->uid = $uid;
    $d->ten = $datauser->thongtin->ten;
    $d->taikhoan = $datauser->taikhoan;
    if($datauser->thongtin->cuoc_ngocrong <=0)
    {
         $a->danhan = 0; #1 là đã nhận....
         $a->phien = $_POST['id'];
         $a->xu  = ($_POST['cuoc'] == 'tai' ? ''.$_POST['xu'].',0' : '0,'.$_POST['xu'].'');
         $a->win  = ($_POST['cuoc'] == 'tai' ? ''.$_POST['xu'].',0' : '0,'.$_POST['xu'].'');
         $a->hoantra = 0;
         $a->thoigian = $thoigian;
         $a->nhan   = 0;
         $a->cuoc   = $_POST['cuoc'];
         $a->code   = 0; #   0 là đang chờ, 1 là đã song, 2 là thất bại.
         $a->t      = +(time()+180); #thời gian để trả về 2.
         $mysqli->query("INSERT INTO `cuoc_ngocrong` SET `uid` = '".$uid."', `data` = '".json_encode($a)."', `az` = '".$az."'");
         $idfrom = $mysqli->insert_id;
         $datauser->upthongtin('cuoc_ngocrong',$idfrom);
         $datauser->upthongtin('time_ngocrong',(time()+60));
         $d->az = $az;
    }
    else
    {
        $check = $mysqli->query("SELECT * FROM `cuoc_ngocrong` WHERE `id` = '".$datauser->thongtin->cuoc_ngocrong."'")->fetch_assoc();
        if($check['id'] >=1)
        {
            $tx = json_decode($check['data'],true);
            $tai = explode(",",$tx['xu'])[0];
            $xiu = explode(",",$tx['xu'])[1];
            $tai = explode(",",$tx['win'])[0];
            $xiu = explode(",",$tx['win'])[1];
            if($_POST['cuoc'] == "tai") $tai+=$_POST['xu'];
            if($_POST['cuoc'] == "xiu") $xiu+=$_POST['xu'];
            $tx['xu'] = $tai.','.$xiu;
            $tx['win'] = $tai.','.$xiu;
            $mysqli->query("UPDATE `cuoc_ngocrong` SET `data` = '".json_encode($tx)."' WHERE `id` = '".$check['id']."'");
            $d->az = $check['az'];
            $d->tai = $tai;
            $d->xiu = $xiu;
            
        }
    }
    
    ## INSERT

    
}

echo json_encode($d);

