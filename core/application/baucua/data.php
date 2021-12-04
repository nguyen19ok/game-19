<?PHP
include_once('../../../core/system/config.php');
#ducnghia
head();
    $a = $_POST['play_chon1'];
    $b = $_POST['play_chon2'];
    $c = $_POST['play_chon3'];
    $d = $_POST['play_chon4'];
    $e = $_POST['play_chon5'];
    $f = $_POST['play_chon6'];
    $g = $a+$b+$c+$d+$e+$f;
    if(strlen($_POST['keycode']) <=4)
    {
        $game->error = 0;
        $game->ms = 'Không thể tìm thấy keycode, vui lòng cược lại';
    }
    else
    if($id <=0)
    {
        $game->error = 0;
        $game->ms = 'Vui lòng đăng nhập';
    }
    else
    if($g <=0)
    {
        $game->error = 0;
        $game->ms = 'Vui lòng chọn tiền cược';
    }
    else
    if($g > $datauser->xu)
    {
        $game->error =0;
        $game->ms = 'Tài khoản của bạn không đủ tiền.';
    }
    else
    {
        $az = az();
        $game->id = $id;
        $game->ms = 'Đặt cược thành công.';
        $game->error =1;
        sodu($id,$datauser->xu,-$g,'Cược bầu cua');
        $datauser->upxu(-$g);
        $game->keycode  = $_POST['keycode'];
        $game->az = $az;
        $game->cuoc1 = $a;
        $game->cuoc2 = $b;
        $game->cuoc3 = $c;
        $game->cuoc4 = $d;
        $game->cuoc5 = $e;
        $game->cuoc6 = $f;
        $game->ten = $datauser->thongtin->ten;
        
        ## INSERT DABASSE
        if($datauser->thongtin->cuoc_baucua <=0)
        {
            $re = ''.$a.','.$b.','.$c.','.$d.','.$e.','.$f.'';
            $y->thoigian = $thoigian;
            $y->phien = $_POST['phien'];
            $y->cuoc = $re;
            $y->nhan = 0;
            $y->code = 0; #1 
            $y->danhan = 0;
            $y->nhan = 0;
            $y->t = time() + 180;
            $mysqli->query("INSERT INTO `cuoc_baucua` SET `uid` = '".$id."', `az` = '".$az."', `data` = '".json_encode($y)."'");
            $idfrom = $mysqli->insert_id;
            $datauser->upthongtin('cuoc_baucua',$idfrom);
            $datauser->upthongtin('time_baucua',(time()+60));
        }
        else
        {
            $check = $mysqli->query("SELECT * FROM `cuoc_baucua` WHERE `id` = '".$datauser->thongtin->cuoc_baucua."'")->fetch_assoc();
            if($check['id'] >=1)
            {
                $cl = json_decode($check['data'],true);
                $a2 = explode(",",$cl['cuoc']);
                $b0 = $a2[0] + $a;
                $b1 = $a2[1] + $b;
                $b2 = $a2[2] + $c;
                $b3 = $a2[3] + $d;
                $b4 = $a2[4] + $e;
                $b5 = $a2[5] + $f;
                $re2 = ''.$b0.','.$b1.','.$b2.','.$b3.','.$b4.','.$b5.'';
                $cl['cuoc'] = $re2;
                $mysqli->query("UPDATE `cuoc_baucua` SET `data` = '".json_encode($cl)."' WHERE `id` = '".$check['id']."'");
                $game->az = $check['az'];
            }
        }
        
        
        ## CODE
        
        
        
    }
    
    echo json($game);