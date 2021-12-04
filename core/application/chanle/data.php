<?PHP
include_once('../../../core/system/config.php');

head();

# TRẦN ĐỖ ĐỨC NGHĨA
# fb.com/ducnghiait


$chan  = $_POST['play_dat'][0];
$le    = $_POST['play_dat'][1];
$le3   = $_POST['play_dat'][2];
$chan3 = $_POST['play_dat'][3];
$le4   = $_POST['play_dat'][4];
$chan4 = $_POST['play_dat'][5];
$tong  = $chan + $le + $le3 + $chan3 + $le4 + $chan4;
if($_POST['phien'] <=0)
{
    $d->error  =1;
    $d->ms = 'Không tìm thấy dữ liệu';
}
else
if(strlen($_POST['keycode']) <=4)
{
    $d->error = 1;
    $d->ms = 'Có lỗi xẩy ra, mã #019333';
}
else
if($id <=0)
{
    $d->error = 1;
    $d->ms = 'Vui lòng đăng nhập vào trò chơi.';
    $d->tb = 'Lỗi';
}
else
if($tong > $datauser->xu)
{
    $d->error = 1;
    $d->ms = 'Tài khoản của bạn không có đủ tiền';
    $d->tb = 'Thông báo.';
}
else
if($tong <=0)
{
    $d->error =1;
    $d->ms = 'Vui lòng cược.';
    $d->tb = 'Thông báo';
}
else
{
    $az = az();
    sodu($id,$datauser->xu,-$tong,'Cược chẵn lẻ');
    $datauser->upxu(-$tong);
    $v0 = $_POST['play_dat'][0];
    $v1 = $_POST['play_dat'][1];
    $v2 = $_POST['play_dat'][2];
    $v3 = $_POST['play_dat'][3];
    $v4 = $_POST['play_dat'][4];
    $v5 = $_POST['play_dat'][5];
    $re = ''.$v0.','.$v1.','.$v2.','.$v3.','.$v4.','.$v5.'';
    $d->c = $re;
    $d->id = $id;
    $d->ms = 'Đặt cược thành công';
    $d->error =0;
    $d->az = $az;
    $d->keycode = $_POST['keycode'];
    $d->name = $datauser->thongtin->ten;
    /*
    INSERT SQL
    */
    if($datauser->thongtin->cuoc_chanle <=0)
    {
        $c->thoigian = $thoigian;
        $c->phien = $_POST['phien'];
        $c->cuoc = $re;
        $c->nhan = 0;
        $c->code = 0; #1 
        $c->danhan = 0;
        $c->nhan = 0;
        $c->t = time() + 180;
        $mysqli->query("INSERT INTO `cuoc_chanle` SET `uid` = '".$id."', `az` = '".$az."', `data` = '".json_encode($c)."'");
        $idfrom = $mysqli->insert_id;
        $datauser->upthongtin('cuoc_chanle',$idfrom);
        $datauser->upthongtin('time_chanle',(time()+60));
    }
    else
    {
        $check = $mysqli->query("SELECT * FROM `cuoc_chanle` WHERE `id` = '".$datauser->thongtin->cuoc_chanle."'")->fetch_assoc();
        if($check['id'] >=1)
        {
            $cl = json_decode($check['data'],true);
            $a = explode(",",$cl['cuoc']);
            $b0 = $a[0] + $v0;
            $b1 = $a[1] + $v1;
            $b2 = $a[2] + $v2;
            $b3 = $a[3] + $v3;
            $b4 = $a[4] + $v4;
            $b5 = $a[5] + $v5;
            $re2 = ''.$b0.','.$b1.','.$b2.','.$b3.','.$b4.','.$b5.'';
            $cl['cuoc'] = $re2;
            $mysqli->query("UPDATE `cuoc_chanle` SET `data` = '".json_encode($cl)."' WHERE `id` = '".$check['id']."'");
            $d->az = $check['az'];
        }
    }
    
}

echo json($d);