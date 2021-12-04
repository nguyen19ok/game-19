<?PHP
include_once('../../../core/system/config.php');

#   DucNghia
#   DucNghiait
#   Socket.io Send data


head(); #cover json

$keycode = $_POST['key'];

if($keycode != $system->data->keycode)
{
    $d->thongbao = 'Lỗi dữ liệu..';
    $d->code     = 100;
}
else
{
    $phien  = $_POST['game'];
    $data   = json_decode($phien,true);
    $mmo    = json_decode($_POST['cuoc'],true);
    #   insert new phien
    #   ducnghia
    $id     = $data['id'];
    $ketqua = ($data['x1']+$data['x2']+$data['x3'] >=11 ? 'tai' : 'xiu');
    $sql->phien = $id;
    $sql->ketqua = $ketqua;
    $sql->thoigian = $thoigian;
    $sql->{'time'} = time();
    $sql->x1  = $data['x1'];
    $sql->x2    = $data['x2'];
    $sql->x3    = $data['x3'];
    $mysqli->query("INSERT INTO `phien_ngocrong` SET `data` = '".json_encode($sql)."' "); ## INSERT PHIEN NGOC RONG
    
    $cl->thoigian = $thoigian;
    $cl->phien = $id;
    $cl->x1 = $data['c1'];
    $cl->x2 = $data['c2'];
    $cl->x3 = $data['c3'];
    $cl->x4 = $data['c4'];
    $cl->x5 = $data['c5'];
    $cl->{'time'} = time();
    $mysqli->query("INSERT INTO `phien_chanle` SET `data` = '".json_encode($cl)."'"); ## INSERT CHAN LE
    
    
    $bc->thoigian = $thoigian;
    $bc->phien = $id;
    $bc->x1 = $data['b1'];
    $bc->x2 = $data['b2'];
    $bc->x3 = $data['b3'];
    $bc->{'time'} = time();
    $mysqli->query("INSERT INTO `phien_baucua` SET `data` = '".json_encode($bc)."'"); ## INSERT CHAN LE
    
    #ducnghiait
    
    ##### CUOC #####
    $log = [];
    
    function u($id,$game)
    {
        global $log;
        foreach($log as $i=>$qe)
        {
            if($qe['id'] == $id AND $qe['game'] == $game)
            {
                return true;
            }
        }
        return false;
    }
    
    foreach($mmo as $id=>$cuoc)
    {
        
        ### CHECK THÔNG TIN
        if($cuoc['id'] >=1)
        {
            $u = new users($cuoc['id']);
            $u->upthongtin('cuoc_ngocrong',0);
            $u->upthongtin('cuoc_chanle',0);
            $u->upthongtin('cuoc_baucua',0);
        }
        
        ### BẦU CUA
        if($cuoc['id'] >=1 AND $cuoc['game'] == "baucua")
        {
            $bc = $mysqli->query("SELECT * FROM `cuoc_baucua` WHERE `az` = '".$cuoc['az']."'")->fetch_assoc();
            if($bc['id'] >=1)
            {
                $baucua = json_decode($bc['data']);
                $hs = 0;
                $nx = 0;
                $nx1 = 0;
                # kiểm tra số lần thắng 
                if($cuoc['type'] == $data['b1'])
                {
                    $hs+=1;
                }
                if($cuoc['type'] == $data['b2'])
                {
                    $hs+=1;
                }
                if($cuoc['type'] == $data['b3'])
                {
                    $hs+=1;
                }
                
                if($hs == 1)
                {
                    $nx = $system->data->baucua1;
                    $nx1 = 2;
                }
                else
                if($hs == 2)
                {
                    $nx = $system->data->baucua2;
                    $nx1 = 3;
                }
                else
                if($hs == 3)
                {
                    $nx = $system->data->baucua3;
                    $nx1 = 4;
                }
                ## CHIẾN THẮNG
                $xuwin = 0;
                if($cuoc['type'] == $data['b1'] or $cuoc['type'] == $data['b2'] or $cuoc['type'] == $data['b3'])
                {
                    $xuwin = $cuoc['xu']*$nx;
                    sodu($u->id,$u->xu,$xuwin,'Thắng bầu cua');
                    $u->upxu($xuwin);
                    $u->upthongtin('baucua_win',$u->thongtin->baucua_win+$xuwin);
                    $doanhthu->up('baucua_win',$xuwin);
                    $doanhthu->up('baucua_phi',($cuoc['xu']*$nx1)-$xuwin);
                    if(u($u->id,'win_baucua') == false)
                    {
                        $log[] = array('id'=> $u->id, 'game' => 'win_baucua');
                        $u->upthongtin('baucua_thang',round($u->thongtin->baucua_thang)+1); #update số trận thắng
                        
                        $u->upthongtin('baucua_chuoithang',round($u->thongtin->baucua_chuoithang)+1); #update số chuỗi thắng
                        
                        $u->upthongtin('baucua_chuoithua',0); #update số thua
                        
                        if($u->thongtin->baucua_chuoithang > $u->thongtin->baucua_chuoithangcaonhat) $u->upthongtin('baucua_chuoithangcaonhat',round($u->thongtin->baucua_chuoithang)); #update chuỗi cao nhất
                        
                    }
                }
                else
                {
                    $u->upthongtin('baucua_lose',$u->thongtin->baucua_lose+$cuoc['xu']);
                    $doanhthu->up('baucua_lose',$cuoc['xu']);
                     if(u($u->id,'lose_baucua') == false)
                    {
                        $log[] = array('id'=> $u->id, 'game' => 'lose_baucua');
                        $u->upthongtin('baucua_thua',round($u->thongtin->baucua_thua)+1); #update số trận thua
                        
                        $u->upthongtin('baucua_chuoithua',round($u->thongtin->baucua_chuoithua)+1); #update số chuỗi thua
                        
                        $u->upthongtin('baucua_chuoithang',0); #update số chuỗi thắng về 0
                        
                        if($u->thongtin->baucua_chuoithua > $u->thongtin->baucua_chuoithuacaonhat) $u->upthongtin('baucua_chuoithuacaonhat',round($u->thongtin->baucua_chuoithua)); #update chuỗi thua cao nhất
                        
                    }
                }
                $baucua->code=1;
                $baucua->nhan+=$xuwin;
                $mysqli->query("UPDATE `cuoc_baucua` SET `data` = '".json_encode($baucua)."' WHERE `id` = '".$bc['id']."'");
                
            }
        }
        
        ### DUCNGHIA ####
        
        ### CHẴN LẺ
        if($cuoc['game'] == 'chanle' AND $cuoc['id'] >=1)
        {
            $ktra = $mysqli->query("SELECT * FROM `cuoc_chanle` WHERE `az` = '".$cuoc['az']."'")->fetch_assoc();
            ## KIỂM TRA NẾU TỒN TẠI USERS NÀY TRONG CƠ SỞ DỮ LIỆU KHÔNG !!!!
            if($ktra['id'] >=1)
            {
                
                $chanle = json_decode($ktra['data']);
                $cau5     = $data['c5']; ##KẾT QUẢ CHẲN LẼ...
                $win  = 0;
                $win2 = 0;
                if($cau5 == 0 || $cau5 == 2 || $cau5 == 4 AND $cuoc['type'] == "chan")
                {
                    $win+=$cuoc['xu']*$system->data->chanle2;
                    $win2+=$cuoc['xu']*2;
                }
                
                if($cau5 == 1 || $cau5 == 3 AND $cuoc['type'] == "le")
                {
                    $win+=$cuoc['xu']*$system->data->chanle2;
                    $win2+=$cuoc['xu']*2;
                }
                
                if($cau5 == 3 AND  $cuoc['type'] == "le3")
                {
                    $win2+=$cuoc['xu']*4;
                    $win+=$cuoc['xu']*$system->data->chanle4;
                }
                
                if($cau5 == 1 AND $cuoc['type'] == "chan3")
                {
                    $win2+=$cuoc['xu']*4;
                    $win+=$cuoc['xu']*$system->data->chanle4;
                }
                
                if($cau5 == 0 AND $cuoc['type'] == "le4")
                {
                    $win2+=$cuoc['xu']*12;
                    $win+=$cuoc['xu']*$system->data->chanle12;
                }
                
                if($cau5 == 4 AND $cuoc['type'] == "chan4")
                {
                    $win2+=$cuoc['xu']*12;
                    $win+=$cuoc['xu']*$system->data->chanle12;
                }
                $chanle->code=1;
                ### XỬ LÝ KHI THẮNG CUỘC
                if($win >=1)
                {
                    $chanle->nhan+=$win;
                    $u->upxu($win); ## UP XU THẮNG
                    sodu($u->id,$u->xu,$win,'Thắng chẵn lẻ');
                    $doanhthu->up('chanle_win',$win); ##up doanh thu thắng
                    $doanhthu->up('chanle_phi',($win2-$win)); # Phí ăn từ ván
                    $u->upthongtin('chanle_win',round($u->thongtin->chanle_win)+$win);
                    if(u($u->id,'win_chanle') == false)
                    {
                        $log[] = array('id'=> $u->id, 'game' => 'win_chanle');
                        $u->upthongtin('chanle_thang',round($u->thongtin->chanle_thang)+1); #update số trận thắng
                        
                        $u->upthongtin('chanle_chuoithang',round($u->thongtin->chanle_chuoithang)+1); #update số chuỗi thắng
                        
                        $u->upthongtin('chanle_chuoithua',0); #update số thua
                        
                        if($u->thongtin->chanle_chuoithang > $u->thongtin->chanle_chuoithangcaonhat) $u->upthongtin('chanle_chuoithangcaonhat',round($u->thongtin->chanle_chuoithang)); #update chuỗi cao nhất
                        
                    }
                }
                
                ### THUA CUỘC
                else
                {
                    $doanhthu->up('chanle_lose',$cuoc['xu']);
                    $u->upthongtin('chanle_lose',round($u->thongtin->chanle_lose)+$cuoc['xu']);
                    if(u($u->id,'lose_chanle') == false)
                    {
                        $log[] = array('id'=> $u->id, 'game' => 'lose_chanle');
                        $u->upthongtin('chanle_thua',round($u->thongtin->chanle_thua)+1); #update số trận thua
                        
                        $u->upthongtin('chanle_chuoithua',round($u->thongtin->chanle_chuoithua)+1); #update số chuỗi thua
                        
                        $u->upthongtin('chanle_chuoithang',0); #update số chuỗi thắng về 0
                        
                        if($u->thongtin->chanle_chuoithua > $u->thongtin->chanle_chuoithuacaonhat) $u->upthongtin('chanle_chuoithuacaonhat',round($u->thongtin->chanle_chuoithua)); #update chuỗi thua cao nhất
                        
                    }
                }
                $mysqli->query("UPDATE `cuoc_chanle` SET `data` = '".json_encode($chanle)."' WHERE `id` = '".$ktra['id']."'");
                
            }
        }
        
        ###
        ### NGOC RONG
        if($cuoc['game'] == 'taixiu' AND $cuoc['id'] >=1)
        {
            $dulieu = $mysqli->query("SELECT * FROM `cuoc_ngocrong` WHERE `az` = '".$cuoc['code']."'")->fetch_assoc();
            if($dulieu['id'] >=1)
            {
                $xu = $cuoc['xu'];
                $hoantra = $cuoc['hoantra'];
                $cuachon = $cuoc['type'];
                $win_kck     = $xu*2;
                $win     = $xu*$system->data->ngocrong;
                ### DATA USERS
                $c = json_decode($dulieu['data']);
                $c->hoantra = $hoantra;
                $c->code = 1;
                ### CLOSE 
                ### WIN
                ### HOÀN TRẢ
                if($hoantra >=1)
                {
                    sodu($u->id,$u->xu,$hoantra,'Hoàn trả ngọc rồng');
                    $u->upxu($hoantra);
                    $u->upwin($hoantra);
                }
                ### END.
                if($cuachon == $ketqua)
                {
                    $c->nhan = $win;
                    sodu($u->id,$u->xu,$win,'Thắng ngọc rồng');
                    $u->upxu($win);
                    $u->upwin($win);
                    $u->upthongtin('ngocrong_win',round($u->thongtin->ngocrong_win)+$win);
                    $doanhthu->up('taixiu_win',$win);
                    $doanhthu->up('taixiu_phi',$win_kck-$win);
                    /*Cập nhật chuỗi*/
                    
                    if(u($u->id,'win_taixiu') == false)
                    {
                        $log[] = array('id'=> $u->id, 'game' => 'win_taixiu');
                        $u->upthongtin('taixiu_thang',round($u->thongtin->taixiu_thang)+1); #update số trận thắng
                        
                        $u->upthongtin('taixiu_chuoithang',round($u->thongtin->taixiu_chuoithang)+1); #update số chuỗi thắng
                        
                        $u->upthongtin('taixiu_chuoithua',0); #update số thua
                        
                        if($u->thongtin->taixiu_chuoithang > $u->thongtin->taixiu_chuoithangcaonhat) $u->upthongtin('taixiu_chuoithangcaonhat',round($u->thongtin->taixiu_chuoithang)); #update chuỗi cao nhất
                        
                    }
                    
                }
                ## LOSE
                else
                {
                    $u->upthongtin('ngocrong_lose',round($u->thongtin->ngocrong_lose)+$xu);
                    $doanhthu->up('taixiu_lose',$xu);
                    if(u($u->id,'lose_taixiu') == false)
                    {
                        $log[] = array('id'=> $u->id, 'game' => 'lose_taixiu');
                        $u->upthongtin('taixiu_thua',round($u->thongtin->taixiu_thua)+1); #update số trận thua
                        
                        $u->upthongtin('taixiu_chuoithua',round($u->thongtin->taixiu_chuoithua)+1); #update số chuỗi thua
                        
                        $u->upthongtin('taixiu_chuoithang',0); #update số chuỗi thắng về 0
                        
                        if($u->thongtin->taixiu_chuoithua > $u->thongtin->taixiu_chuoithuacaonhat) $u->upthongtin('taixiu_chuoithuacaonhat',round($u->thongtin->taixiu_chuoithua)); #update chuỗi thua cao nhất
                        
                    }
                    
                }
                $mysqli->query("UPDATE `cuoc_ngocrong` SET `data` = '".json_encode($c)."' WHERE `id` = '".$dulieu['id']."'");
            }
        }
        
        ### END NGOC RONG
    }
    
}


echo json($d);

