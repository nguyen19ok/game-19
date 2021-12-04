<?PHP
include_once('../../../core/system/config.php');
$title = 'Cài đặt Trang';
include_once('../../../core/system/head.php');

if($admin <=4)
{
    exit();
}

if(isset($_POST['thongbao']))
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
<div class="b-c-header"><h5 style="color: rgb(255, 233, 3); padding-top: 8px;">Cài đặt trang</h5></div>
<div class="deposit-body">
                                <?=$msg?>
                                <form name="dangki" action="/admin/page.html" class="form pt-3" id="formlogin" method="post">
                                    <div class="form-group">
                                        <label>Tên Ngân Hàng</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->tenatm?>"  aria-label="tieude" name="tenatm" aria-describedby="basic-addon11">
                                        </div>
                                    </div>    
                                                                   <div class="form-group">
                                        <label>Chủ TK Ngân Hàng</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->chutkatm?>"  aria-label="tieude" name="chutkatm" aria-describedby="basic-addon11">
                                        </div>
                                    </div>  
                                                                   <div class="form-group">
                                        <label>Chi Nhánh Ngân Hàng</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->chinhanhatm?>"  aria-label="tieude" name="chinhanhatm" aria-describedby="basic-addon11">
                                        </div>
                                    </div> 
                                                                                                    <div class="form-group">
                                        <label>Số TK Ngân Hàng</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->sotkatm?>"  aria-label="tieude" name="sotkatm" aria-describedby="basic-addon11">
                                        </div>
                                    </div>  
                                                                                                                      <div class="form-group">
                                        <label>Chiết khấu nạp Ngân hàng</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->cknapatm?>"  aria-label="tieude" name="cknapatm" aria-describedby="basic-addon11">
                                        </div>
                                    </div>  
                                                                                                                                                          <div class="form-group">
                                        <label>Nội Dung CK Ngân hàng</label>
                                        <div class="input-group mb-3">
                                           
                                            <input type="text" class="form-control" value="<?=$system->data->ndatm?>"  aria-label="tieude" name="ndatm" aria-describedby="basic-addon11">
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label>Thông báo trang chủ</label>
                                        <div class="input-group mb-3">
                                           
                                           <textarea name="thongbao" id="edit_thongbao" class="ckeditor"><?=$system->data->thongbao?></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Hưỡng dẫn Ngọc rồng</label>
                                        <div class="input-group mb-3">
                                           
                                           <textarea name="huongdan_ngocrong" id="huongdan_ngocrong" class="ckeditor"><?=$system->data->huongdan_ngocrong?></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Hưỡng dẫn Bầu cua</label>
                                        <div class="input-group mb-3">
                                           
                                           <textarea name="huongdan_baucua" id="huongdan_baucua" class="ckeditor"><?=$system->data->huongdan_baucua?></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Hưỡng dẫn Chẵn Lẻ</label>
                                        <div class="input-group mb-3">
                                           
                                           <textarea name="huongdan_chanle" id="huongdan_chanle" class="ckeditor"><?=$system->data->huongdan_chanle?></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    
                               
                                    

<script>
                                           
            tinymce.init({
                selector: "textarea#edit_thongbao,textarea#huongdan_ngocrong,textarea#huongdan_baucua,textarea#huongdan_chanle,textarea#hdrutvang,textarea#hdnapvang",
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