<?PHP
include_once('../../../core/system/config.php');

#   Tác giả :   Trần Đỗ Đức Nghĩa
#   Facebook:   https://fb.com/ducnghiait
#   Tên php :   Chát Cá nhân
#   Viết    :   27/10/2020
#   18:26
head();

$to = html($_POST['id']);   #Người dùng cần nhắn tin;

#   Kiểm tra thông tin đăng nhập

if($id <=0)
{
    $k->error = 1;
    $k->msg = 'Vui lòng đăng nhập để tiếp tục.';
}
else

if($id == $to)
{
    $k->error = 1;
    $k->msg = 'Không thể nhắn tin cho chính mình.';
}

else
{
    #   LẤY THÔNG TIN DỮ LIỆU NGƯỜI CHƠI
    $nick = new users($to);
    
    #   CHECK THÔNG TIN NGƯỜI NÀY XEM CÓ TRONG DANH SÁCH TIN NHẮN CỦA BẢN THÂN CHƯA
    $check = $mysqli->query("SELECT * FROM `sms_list` WHERE `to` = '".$to."' AND `from` = '".$id."'")->num_rows;
    
    #   NẾU KHÔNG TỒN TẠI THÌ TIẾN HÀNH TẠO MỚI
    if($check <=0)
    {
        $mysqli->query("INSERT INTO `sms_list` SET `to` = '".$to."', `from` = '".$id."', `time` = '".time()."'");
    }
    else
    {
        $mysqli->query("UPDATE `sms_list` SET `time` = '".time()."', `new` =  '0' WHERE `from` = '".$id."' AND `to` = '".$to."'");
    }
    
    #   TIẾN HÀNH LẤY LIST TIN NHẮN TỪ NGƯỜI DÙNG.
    $list = array();
    $li = $mysqli->query("SELECT * FROM `sms` WHERE `from` = '".$id."' AND `to` = '".$to."' OR `to` = '".$id."' AND `from` = '".$to."' ORDER by `id` DESC LIMIT 25");
    while($sms = $li->fetch_assoc())
    {
        $list[] = array(
            'id' => $sms['id'],
            'text' => ($sms['from'] == $id ? '<li class="odd msg_sent"><div class="chat-content"><div class="box bg-light-info">'.$sms['text'].'</div><br></div><div class="chat-time" ducnghia="'.$sms['time'].'">'.thoigian($sms['time']).'</div></li>' : '<li class="msg_receive"><div class="chat-content"><div class="box bg-light-info">'.$sms['text'].'</div></div><div class="chat-time" ducnghia="'.$sms['time'].'">'.thoigian($sms['time']).'</div></li>'),
            );
    }
    $sapxep = array();
    $max = count($list)-1;
    while($max >=0)
    {
        $sapxep[] = $list[$max];
        $max-=1;
    }
    $k->danhsach = $sapxep;
    $k->nick->name = $nick->thongtin->ten;
    $k->nick->avatar = $nick->thongtin->avatar;
    $k->nick->id  = $nick->id;
    $k->nick->online = ($nick->thongtin->online >= time() ? 'online' : 'offline');
}




echo json($k);

