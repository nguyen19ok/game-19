<?PHP
include_once('../../../core/system/config.php');
$title = 'Cài đặt hệ thống';
include_once('../../../core/system/head.php');

if($admin <=4)
{
    exit();
}

if(isset($_POST['tieude']))
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
                <script src="/assets/libs/tinymce/tinymce.min.js"></script>
               <div class="sha-deposit-info">
<div class="w-deposit" style="width: 100%;">
<div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Cài đặt hệ thống</h5></div>
<div class="deposit-body">
                                <?=$msg?>
                                <form name="dangki" action="/admin/system.html" class="form pt-3" id="formlogin" method="post">
                                <div class="form-group">
                                        <label>Mô tả trang web</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->description?>"  aria-label="tieude" name="description" aria-describedby="basic-addon11">
                                        </div>
                                    </div>   
                                                                  <div class="form-group">
                                        <label>Tác giả trang web</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->author?>"  aria-label="tieude" name="author" aria-describedby="basic-addon11">
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label>Email admin (khi có yêu cầu rút tiền sẽ thông báo về)</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->emailadmin?>"  aria-label="tieude" name="emailadmin" aria-describedby="basic-addon11">
                                        </div>
                                    </div>  
                                      <div class="form-group">
                                        <label>API KEY (https://card24h.com/)</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->apikey?>"  aria-label="tieude" name="apikey" aria-describedby="basic-addon11">
                                        </div>
                                    </div>   
                                                                          <div class="form-group">
                                        <label>Link callback</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->callback?>"  aria-label="tieude" name="callback" aria-describedby="basic-addon11">
                                        </div>
                                    </div>   
                                                                                                    
                                    <div class="form-group">
                                        <label>Tiêu đề trang</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->tieude?>"  aria-label="tieude" name="tieude" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Thời gian chạy phiên (giây)</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="number" class="form-control" value="<?=$system->data->time_phien?>"  aria-label="tieude" name="time_phien" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Thời gian chờ mới phiên (giây)</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="number" class="form-control" value="<?=$system->data->time_new?>"  aria-label="tieude" name="time_new" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Url socket</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->socket?>"  aria-label="tieude" name="socket" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Keycode socket</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->keycode?>"  aria-label="tieude" name="keycode" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Đăng ký</label>
                                        <div class="input-group md-3">
                                            <select class="form-control" name="dangki">
                                                <option value="0" <?=$system->data->dangki <=0 ? 'selected' : ''?> >Cho phép đăng ký</option>
                                                <option value="1" <?=$system->data->dangki >=1 ? 'selected' : ''?>>Đóng cửa đăng ký</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Thông báo trang chủ</label>
                                        <div class="input-group mb-3">
                                           
                                           <textarea name="thongbao" id="edit_thongbao" class="ckeditor"><?=$system->data->thongbao?></textarea>
                                        </div>
                                        <script>
                                           
            tinymce.init({
                selector: "textarea#edit_thongbao",
                theme: "modern",
                height: 50,
                width : 'auto',
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        
                                        </script>
                                    </div>
                                    

                                  

                                    <button name="dangki"  type="submit" class="button-withdraw"></button>
                                </form>
                            </div>
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