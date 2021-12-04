<?PHP
include_once('../../../core/system/config.php');
$title = 'Cài đặt tỉ lệ';
include_once('../../../core/system/head.php');

if($admin <=4)
{
    exit();
}

if(isset($_POST['xu']))
{
    foreach($_POST as $id => $data)
    {
        #
        $system->set($id,$data);
        
    }
    echo thongbao('Dữ liệu đã được lưu','thanhcong');
    $system = new hethong;
}

?>
<div class="sha-deposit-info">
<div class="w-deposit" style="width: 100%;">
<div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Cài đặt tỉ lệ</h5></div>
<div class="deposit-body">
                                <?=$msg?>
                                <form name="dangki" action="/admin/tile.html" class="form pt-3" id="formlogin" method="post">
                                    
                                    
                                          
                                    
                                 
                                    <div class="form-group">
                                        <label>Vàng nhận khi đăng ký</label>
                                     
                                           
                                            <input type="number" class="form-control" value="<?=$system->data->xu?>"  aria-label="tieude" name="xu" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Phí chuyển tiền (vd x1.1)</label>
                                       
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->tile_chuyentien?>"  aria-label="tieude" name="tile_chuyentien" aria-describedby="basic-addon11">
                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tỉ lệ ăn Ngọc rồng (vd x1.95)</label>
                                        
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->ngocrong?>"  aria-label="tieude" name="ngocrong" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                     <div class="form-group">
                                        <label>Tỉ lệ chẵn lẻ x2</label>
                                      
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->chanle2?>"  aria-label="tieude" name="chanle2" aria-describedby="basic-addon11">

                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tỉ lệ chẵn lẻ x4</label>
                                       
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->chanle4?>"  aria-label="tieude" name="chanle4" aria-describedby="basic-addon11">
                                      
                                    </div>
                                    
                                     <div class="form-group">
                                        <label>Tỉ lệ chẵn lẻ x12</label>
                                         <input step="1" type="text" class="form-control" value="<?=$system->data->chanle12?>"  aria-label="tieude" name="chanle12" aria-describedby="basic-addon11">
                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tỉ lệ bầu cua x1</label>
                                      
                                           
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->baucua1?>"  aria-label="tieude" name="baucua1" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tỉ lệ bầu cua x2</label>
                                      
                                           
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->baucua2?>"  aria-label="tieude" name="baucua2" aria-describedby="basic-addon11">

                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tỉ lệ bầu cua x3</label>
                                      
                                           
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->baucua3?>"  aria-label="tieude" name="baucua3" aria-describedby="basic-addon11">
                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>BOT Tài Xỉu</label>
                                        <select name="bot_ngocrong" class="form-control">
                                            <option value="0" <?=$system->data->bot_ngocrong <=0 ? 'selected' : ''?>>Bật</option>
                                            <option value="1" <?=$system->data->bot_ngocrong >=1 ? 'selected' : ''?>>Tắt</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tiền BOT Tài xỉu cược (min,max)</label>
                                       
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->bot_ngocrong_cuoc?>"  aria-label="tieude" name="bot_ngocrong_cuoc" aria-describedby="basic-addon11">
                                        
                                    </div>
                                    
                                     <div class="form-group">
                                        <label>BOT Bầu cua</label>
                                        <select name="bot_baucua" class="form-control">
                                            <option value="0" <?=$system->data->bot_baucua <=0 ? 'selected' : ''?>>Bật</option>
                                            <option value="1" <?=$system->data->bot_baucua >=1 ? 'selected' : ''?>>Tắt</option>
                                        </select>
                                    </div>
                                                                      <div class="form-group">
                                        <label>Tiền BOT bầu cua cược (min,max)</label>
                                       
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->bot_baucua_cuoc?>"  aria-label="tieude" name="bot_baucua_cuoc" aria-describedby="basic-addon11">
                                        
                                    </div>  
                                    
                                     <div class="form-group">
                                        <label>BOT Chẵn lẻ</label>
                                        <select name="bot_chanle" class="form-control">
                                            <option value="0" <?=$system->data->bot_chanle <=0 ? 'selected' : ''?>>Bật</option>
                                            <option value="1" <?=$system->data->bot_chanle >=1 ? 'selected' : ''?>>Tắt</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tiền BOT chẵn lẻ cược (min,max)</label>

                                            <input step="1" type="text" class="form-control" value="<?=$system->data->bot_chanle_cuoc?>"  aria-label="tieude" name="bot_chanle_cuoc" aria-describedby="basic-addon11">

                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Cân cửa</label>
                                        <select name="cancua" class="form-control">
                                            <option value="0" <?=$system->data->cancua <=0 ? 'selected' : ''?>>Tắt</option>
                                            <option value="1" <?=$system->data->cancua >=1 ? 'selected' : ''?>>Bật</option>
                                        </select>
                                    </div>
                                    
                                    
                                    
                                    
                                     <div class="form-group">
                                        <label>Chiết khấu nạp thẻ</label>
                                      
                                           
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->tcard?>"  aria-label="tieude" name="tcard" aria-describedby="basic-addon11">
                                        
                                    </div>
                                        <div class="form-group">
                                        <label>Chiết khấu rút vàng</label>
                                      
                                           
                                            <input step="1" type="text" class="form-control" value="<?=$system->data->ckrut?>"  aria-label="tieude" name="ckrut" aria-describedby="basic-addon11">
                                        
                                    </div>

                                  

                                    <button name="dangki"  type="submit" class="button-withdraw"></button>
                                </form>
                            </div>
                        </div>
                    </div>
<script>


  $('form').submit(function() {
         $("#splash-screen").show();
      
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200)
        {
            $('#ducnghia').html(this.responseText);

        }
                    $("#splash-screen").fadeOut();

    };
    xhttp.open($(this).attr('method'), $(this).attr('action'), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhttp.send("t=1&load=Y2U2ODFlZmJhMzliZDUwNzY2NjIxODQ4NDc1ZjhlN2E=&"+$(this).serialize());

    history.pushState("object or string representing the state of the page", "Xin Chao", $(this).attr('action'));   
    return false;
});
</script>                
           
<?PHP
include_once('../../../core/system/end.php');
?>