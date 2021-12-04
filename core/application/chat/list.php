<?PHP

include_once('../../../core/system/config.php');

#   TÁC GIẢ  :  TRẦN ĐỖ ĐỨC NGHĨA
#   EMAIL    :  trandoducnghia@gmail.com
#   FACEBOOK :  https://fb.com/ducnghiait


### COVER HEAD ####

head();

## MAIN ###

if($id <=0)
{
    $d->msg = 'Vui lòng đăng nhập để tiếp tục';
    $d->error  =1;
}
else
{
    $list = $mysqli->query("SELECT * FROM `sms_list` WHERE `from` = '".$id."' ORDER by `time` DESC LIMIT 5");
    $menu = array();
    $total = 0;
    while($sms = $list->fetch_assoc())
    {
        $total+=$sms['new'];
        $text = '';
        $time  = 0;
        $new = $mysqli->query("SELECT * FROM `sms` WHERE `from` = '".$id."' AND `to` = '".$sms['to']."' OR `to` = '".$id."' AND `from` = '".$sms['to']."' ORDER by `id` DESC LIMIT 1")->fetch_assoc();
        if($new['id'] >=1)
        {
            $text = $new['text'];
            $time = $new['time'];
        }
        $to = new users($sms['to']);
        $menu[] = array(
            'time' => $time,
            'text' => $text,
            'id' => $sms['to'],
            'cout' => $sms['new'],
            'avatar' => $to->thongtin->avatar,
            'online' => ($to->thongtin->online >= time() ? 'online' : 'offline'),
            'name' => $to->name2()
            );
    }
    $d->chat = $menu;
    $d->total = $total;
}




echo json($d);


