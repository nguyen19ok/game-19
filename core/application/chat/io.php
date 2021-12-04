<?PHP

include_once('../../../core/system/config.php');

#   Tác giả :   Trần Đỗ Đức Nghĩa
#   Facebook:   https://fb.com/ducnghiait
#   Tên php :   Chát VS
#   Viết    :   27/10/2020
#   18:26
head();

$to = html($_POST['id']);   #Người dùng cần nhắn tin;
$text = html($_POST['text']); #Nội dung tin nhắn;

if($to == $id)
{
    $d->error = 1;
    $d->msg   = 'Không thể tự gửi tin nhắn cho bản thân mình';
}
else
if($id <=0)
{
    $d->error = 1;
    $d->msg = 'Vui lòng đăng nhập để tiếp tục';
}
else
if(strlen($text) <=0 or strlen($text) >=500)
{
    $d->error = 1;
    $d->msg = 'Nội dung tin nhắn không hợp lệ';
}
else
{
    #   LẤY THÔNG TIN DỮ LIỆU NGƯỜI CHƠI
    #   CHECK THÔNG TIN NGƯỜI NÀY XEM CÓ TRONG DANH SÁCH TIN NHẮN CỦA BẢN THÂN CHƯA
    $check1 = $mysqli->query("SELECT * FROM `sms_list` WHERE `to` = '".$to."' AND `from` = '".$id."'")->num_rows;
    #   NẾU KHÔNG TỒN TẠI THÌ TIẾN HÀNH TẠO MỚI
    if($check1 <=0)
    {
        $mysqli->query("INSERT INTO `sms_list` SET `to` = '".$to."', `from` = '".$id."', `time` = '".time()."'");
    }
    else
    {
        $mysqli->query("UPDATE `sms_list` SET `time` = '".time()."', `new` =  '0' WHERE `from` = '".$id."' AND `to` = '".$to."'"); ##
    }
    
    #   Check thông tin của người được gửi tin nhắn
    $check = $mysqli->query("SELECT * FROM `sms_list` WHERE `to` = '".$id."' AND `from` = '".$to."'")->num_rows;
    if($check <=0)
    {
        $mysqli->query("INSERT INTO `sms_list` SET `to` = '".$id."', `from` = '".$to."', `time` = '".time()."'");
    }
    else
    {
        $mysqli->query("UPDATE `sms_list` SET `time` = '".time()."', `new` = `new` + '1' WHERE `from` = '".$to."' AND `to` = '".$id."'");
    }
    
    $mysqli->query("INSERT INTO `sms` SET `from` = '".$id."', `to` = '".$to."', `time` = '".time()."', `text` = '".$text."'");
    $d->from = $id;
    $d->to = $to;
    $d->thoigian = time();
    $d->name = $datauser->thongtin->ten;
    $d->text = $text;
}


echo json($d);